<?php
  
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

        // ------ setters
        public function setScores( $score1, $score2){
            // definir tableau score du match
            $this->scores = [$score1,$score2];

            //définir nbre de buts pour les deux équipes
            $this->equipe1->setBut($this->equipe1->getBut() + $score1);
            $this->equipe2->setBut($this->equipe2->getBut() + $score2);

            //définir variable session pour statistique match
            $nomSession = "match-$this->numeroMatch-Grpe-$this->nomGroupe";

            $_SESSION[$nomSession] = [
                'numeroMatch' => $this->numeroMatch,
                'equipes' => [$this->equipe1,$this->equipe2],
                'scores' => [$score1,$score2]
            ];

        }

        // ----------- METHODES CLASSES 
        public function gagnant(){
            if ($this->scores[0] > $this->scores[1]) {

                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 3);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 0);
                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'gagnant' => $this->equipe1 
                );

            } else if($this->scores[0] === $this->scores[1]) {
                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 1);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 1);
                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'gagnant' => null
                );

            }else{
                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 0);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 3);

                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'gagnant' => $this->equipe2 
                );
            }
            
        }
        
        public function perdant(){
            if ($this->scores[0] < $this->scores[1]) {

                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 0);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 3);
                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'perdant' => $this->equipe1 
                );

            } else if($this->scores[0] === $this->scores[1]) {
                //---- repartir les points
                $this->equipe1->setPoint($this->equipe1->getPoint() + 1);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 1);
                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'perdant' => $this->null
                );
            }else{
                //---- repartir les points                
                $this->equipe1->setPoint($this->equipe1->getPoint() + 3);
                $this->equipe2->setPoint($this->equipe2->getPoint() + 0);
                return array(
                    'equipe1' => $this->equipe1,
                    'equipe2' => $this->equipe2,
                    'perdant' => $this->equipe2 
                );
            }
            
        }
        

    }

?>
