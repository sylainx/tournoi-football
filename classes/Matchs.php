<?php

    require_once ('../ConnexionBD/base.php');

    // -------------------------- classe Match -----------------------

    class Matchs
    {
        private $numeroMatch;
        private $nomGroupe;
        private $equipe1,$equipe2;
        private $scores = [];
        
        // --------- constructeurs --------------
        public function __construct( $numeroMatch, Equipe $equipe1, Equipe $equipe2, $nomGroupe){
            $this->numeroMatch = $numeroMatch;
            $this->equipe1=$equipe1;
            $this->equipe2=$equipe2;
            $this->nomGroupe=$nomGroupe;
        }

        // --------------- Getters ------------
        public function getNumeroMatch(){
            return $this->numeroMatch;
        }
        public function getEquipe1(){
            return $this->equipe1;
        }

        public function getEquipe2(){
            return $this->equipe2;
        }

        public function getScores(){
            return $this->scores;
        }
        
        public function getNomGroupe(){
            return $this->nomGroupe;
        }

        // ------------------- setters -------------------
        public function setScores( $score1, $score2){
            
            // definir tableau score du match
            $this->scores = [$score1,$score2];

            // -----------------------statistique            
                            // equipe 1
            $this->equipe1->setMj($this->equipe1->getMj() + 1);
            //définir nbre de buts pour les deux équipes
            $this->equipe1->setBut($this->equipe1->getBut() + $score1);
            $this->equipe1->setBc($this->equipe1->getBc() + $score2);
            //calcul la différence de but et l'ajoute sur ce qui était déjà présent
            $this->equipe1->setDiff( $this->equipe1->getDiff() + ($score1-$score2) );

                            // equipe 2
            $this->equipe2->setMj($this->equipe2->getMj() + 1);
            $this->equipe2->setBut($this->equipe2->getBut() + $score2);
            $this->equipe2->setBc($this->equipe2->getBc() + $score1);
            //calcul la différence de but et l'ajoute sur ce qui était déjà présent
            $this->equipe2->setDiff( $this->equipe2->getDiff() + ($score2-$score1) );

            // ----------------- fin stats-----------------
        
            // variable session score en cours
            $nomSession = "match-$this->numeroMatch-Grpe-$this->nomGroupe";

            $_SESSION[$nomSession] = [
                'numeroMatch' => $this->numeroMatch,
                'equipes' => [$this->equipe1,$this->equipe2],
                'scores' => [$this->scores[0], $this->scores[1] ]
            ];

        }


        // ------------------------- METHODES CLASSES ------------------------------

        public function gagnant(){

            if ($this->scores[0] > $this->scores[1]) {
                
                //---- repartir les points
                $this->equipe1->setPoint( $this->equipe1->getPoint() + 3);
                $this->equipe2->setPoint( $this->equipe2->getPoint() + 0);
                            
                // --------match gagnés et perdus
                $this->equipe1->setMg($this->equipe1->getMg() + 1);
                $this->equipe2->setMp($this->equipe2->getMp() + 1);
                
                ////$this->insererDonnees();
                $this->insererMatchBD($this->equipe1->getNom());

                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'gagnant' => $this->equipe1 
                );

            } else if($this->scores[0] === $this->scores[1]) {
                
                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 1);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 1);
                
                // match null
                $this->equipe1->setMn($this->equipe1->getMn() + 1);
                $this->equipe2->setMn($this->equipe2->getMn() + 1);
                
                $this->insererMatchBD();

                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'gagnant' => null
                );

            }else{
                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 0);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 3);
                                            
                // --------match gagnés et perdus
                $this->equipe1->setMp($this->equipe1->getMp() + 1);
                $this->equipe2->setMg($this->equipe2->getMg() + 1);

                //$this->insererDonnees();
                $this->insererMatchBD($this->equipe2->getNom());

                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'gagnant' => $this->equipe2 
                );
            }

            
            
        }
        
        // -------------- STOCKER DONNÉES DANS TABLE LISTE DES MATCHS --------------        
        private function insererMatchBD( $gagnant=null){
            
            global $bdd;
            
            echo '<br> Inserer <br>';

            if ( is_null($gagnant) ) {
                $gagnant = 'None';
            }
            
            // -----------------------------------------------------------------
            // ----------------------- LISTE DES MATCHS -----------------------
            // -----------------------------------------------------------------

            $codeSql = "INSERT INTO listematchs(numeroMatch, equipe1, equipe2, score1, score2, gagnant)
                VALUES( :numeroMatch, :equipe1, :equipe2, :score1, :score2, :gagnant )";
        
            echo '<br>Preparer liste match<br>';
            $stmtListeMatch = $bdd->prepare($codeSql);

            echo '<br>Executer requete match<br>';
            
            $stmtListeMatch->execute(array(
                ':numeroMatch'=>$this->numeroMatch,
                ':equipe1'=>$this->equipe1->getNom(),
                ':equipe2'=>$this->equipe2->getNom(),
                ':score1'=>$this->scores[0],
                ':score2'=>$this->scores[1],
                ':gagnant'=>$gagnant
            ));

            $stmtListeMatch->closeCursor();             

            // -----------------------------------------------------------------
            // -------------------------- CLASSEMENTS --------------------------
            // -----------------------------------------------------------------
            
            echo '<br>sql classsement<br>';
            
            if ( $this->nomGroupe == 'A' ) {
                $sql = "UPDATE classementgroupea SET
                    groupe = :groupe, logo= :logo, mj = :mj, mg = :mg, mn = :mn, mp = :mp, bp = :bp, bc = :bc, point = :point, diff = :diff
                    WHERE nomEquipe = :nomEquipe";
                echo '<br>Table classementgroupe a<br><br>';
                    
            }else {
                $sql = "UPDATE classementgroupeb SET
                    groupe = :groupe, logo= :logo, mj = :mj, mg = :mg, mn = :mn, mp = :mp, bp = :bp, bc = :bc, point = :point, diff = :diff
                    WHERE nomEquipe = :nomEquipe";
                echo '<br>Table classementgroupe b<br>';
            }

            echo '<br>preparer classsement<br>';            
            $stmtClassement = $bdd->prepare($sql);

            $listeEquipe [] = $this->equipe1;
            $listeEquipe [] = $this->equipe2;

            echo '<br><br><bclassement</b><br><br>';

            foreach ($listeEquipe as $oneTeam) {
                $stmtClassement->execute(array(
                    ':nomEquipe' => $oneTeam->getNom(),
                    ':groupe' => $this-> nomGroupe,
                    ':logo' => $oneTeam->getLogo(),
                    ':mj' => $oneTeam->getMj(),
                    ':mg' => $oneTeam->getMg(),
                    ':mn' => $oneTeam->getMn(),
                    ':mp' => $oneTeam->getMp(),
                    ':bp' => $oneTeam->getBut(),
                    ':bc' => $oneTeam->getBc(),
                    ':point' => $oneTeam->getPoint(),
                    ':diff' => $oneTeam->getDiff(),
                ));
                $stmtClassement->closeCursor();
                    
            }
   
        }


    }

?>
