<?php
    include_once('appelerBD.php');

    /*--------------------------------------------------------------------------------------- */ 
    /*----------------------------------- PHASE DE GROUPE ----------------------------------- */ 
    /*--------------------------------------------------------------------------------------- */ 

    function liste_option_but(){
        for ($i=0; $i <= 10; $i++){
    ?>
        <option value=<?php echo $i; ?> ><?php echo $i; ?> </option>

    <?php 
            } // boucle for
        }   //function



    /*--------------------------------------------------------------------------------------- */ 
    /*----------------------------------- PHASE DE GROUPE ----------------------------------- */ 
    /*--------------------------------------------------------------------------------------- */ 
    
    function jouer_match(){

        $numMatch = $_POST['numMatch'];
        
        $codeNomEq1 = 'm'.$numMatch.'eq1'; //code match sous forme : m1eq1, m2eq1,m3eq1,...
        $codeNomEq2 = 'm'.$numMatch.'eq2'; //code match sous forme : m1eq2, m2eq2,m3eq2,...

        if ( isset($_POST[$codeNomEq1]) && isset($_POST[$codeNomEq2]) 
            && isset($_POST['score1']) && isset($_POST['score2']) ) {
    
            $nomEquipe1 = $_POST[$codeNomEq1];
            $nomEquipe2 = $_POST[$codeNomEq2];
            $score1 = $_POST['score1'];
            $score2 = $_POST['score2'];
            
            /*
            *    Vérifier si les 2 equipes font partie du meme groupe et trouver lequel
            *   la fonction renvoie un tableau assosciatif avec :
            *        - l'objet equipe 1 et ses caractéristiques : equipe1
            *        - l'objet equipe 2 et ses caractéristiques : equipe2
            *        - le nom du groupe  : A ou B                    
            */
            $equipes= find_groupe_and_his_name($nomEquipe1,$nomEquipe2);
            
            //cas ou elles sont ds le meme groupe
            if (isset($equipes)) {

                //variables retournées par la fonction find_groupe_and_his_name
                $objEquipe1Retour=$equipes['equipe1'];
                $objEquipe2Retour=$equipes['equipe2'];
                $nomGroupeRetourne=$equipes['nomGroupe'];

                // crée un match
                $match = new Matchs($numMatch, $objEquipe1Retour, $objEquipe2Retour, $nomGroupeRetourne );
                
                $match->setScores($score1,$score2);
                
                $gagnant = $match->gagnant();
                
                /*
                *  -------------------- TEST INFORMATIONS MATCH --------------------
                */ 

                if ( isset( $gagnant['gagnant'] ) ) {

                    echo '<br>Le gagnant est: '. $gagnant['gagnant']->getNom() ;
                    echo '<br>Nombre total de point: '. $gagnant['gagnant']->getBut() ;
                    echo '<br>Nombre total de but : '. $match->getScores()[0] . '-'. $match->getScores()[1];
                }
                else{
                    //echo '<br>Match null: ' ;
                    //echo '<br>Nombre total de but : '. $match->getScores()[0] . '-'. $match->getScores()[0];
                }

                // ==================================== FIN ====================================
                    
            }

            // déclencher demi final
            if ( $numMatch == 12 ) {
                qualifier_pour_demiFinal();

            }
        }
    }

    
    //vérifier si les 2 equipes sont ds le meme groupe et renvoyer ce dernier
    function find_groupe_and_his_name($nomEquipe1,$nomEquipe2){

            // =================== ACCES A LA BASE DE DONNÉES =============================
        
        $stockerTemporEq = null;
        $nomGroupe = null;
        $trouveEq = null;

        // -------------- afficher informations BD GROUPE A
        $codeSql = "SELECT * from classementgroupea WHERE nomEquipe IN ( :nomEquipe1 , :nomEquipe2 ) ";
        $requete = $GLOBALS['bdd']->prepare($codeSql);

        $requete->execute(array(
            ':nomEquipe1' => $nomEquipe1,
            ':nomEquipe2' => $nomEquipe2
        ));

        $i = 0;
        while($donnees = $requete->fetch()){
            $trouveEq = true;
            extract($donnees); // les clés associatifs se transforment en variables

            $stockerTemporEq[$i] = new Equipe($nomEquipe,$logo);
            $stockerTemporEq[$i]->setPoint($point);
            $stockerTemporEq[$i]->setMj($mj);
            $stockerTemporEq[$i]->setMg($mg);
            $stockerTemporEq[$i]->setMn($mn);
            $stockerTemporEq[$i]->setMp($mp);
            $stockerTemporEq[$i]->setBut($bp);
            $stockerTemporEq[$i]->setBc($bc);
            $stockerTemporEq[$i]->setDiff($diff);
            $nomGroupe= $groupe; //variable extraite depuis BD
            $i++;
        }
        
        $requete->closeCursor(); //Termine le traitement de la requete
        
        //condition validant que les 2 sont ds le meme groupe            
        if ($trouveEq) {
            
            return array(
                'equipe1' => $stockerTemporEq[0] ,
                'equipe2' => $stockerTemporEq[1],
                'nomGroupe'=> $nomGroupe);
        }

        // -------------- afficher informations BD GROUPE B
        $codeSql = "SELECT * from classementgroupeb WHERE nomEquipe IN ( :nomEquipe1 , :nomEquipe2 ) ";
        $requete = $GLOBALS['bdd']->prepare($codeSql);

        $requete->execute(array(
            ':nomEquipe1' => $nomEquipe1,
            ':nomEquipe2' => $nomEquipe2
        ));

        $i = 0;
        while($donnees = $requete->fetch()){
            $trouveEq = true;
            extract($donnees);

            $stockerTemporEq[$i] = new Equipe($nomEquipe,$logo);
            $stockerTemporEq[$i]->setPoint($point);
            $stockerTemporEq[$i]->setMj($mj);
            $stockerTemporEq[$i]->setMg($mg);
            $stockerTemporEq[$i]->setMn($mn);
            $stockerTemporEq[$i]->setMp($mp);
            $stockerTemporEq[$i]->setBut($bp);
            $stockerTemporEq[$i]->setBc($bc);
            $stockerTemporEq[$i]->setDiff($diff);
            $nomGroupe= $groupe; //variable extraite depuis BD
            $i++;
        }
        
        $requete->closeCursor(); //Termine le traitement de la requete
        
        //condition validant que les 2 sont ds le meme groupe            
        if ($trouveEq) {
            
            return array(
                'equipe1' => $stockerTemporEq[0] ,
                'equipe2' => $stockerTemporEq[1],
                'nomGroupe'=> $nomGroupe);
        }


    }


    /*--------------------------------------------------------------------------------------- */ 
    /*--------------------------------- ELIMINATION DIRECT ---------------------------------- */ 
    /*--------------------------------------------------------------------------------------- */ 

    /* Insérer les équipes qualifiées pour demi finale dans la BD */
    function qualifier_pour_demiFinal() {

        // --- placer les valeurs retours dans 2 variables
        $les_2_groupes = gererClassement();
        extract($les_2_groupes);
        
        insererDemiFinalBD(13, $groupeA[0]['nomEquipe'], $groupeB[1]['nomEquipe'] );
        insererDemiFinalBD(14, $groupeB[0]['nomEquipe'], $groupeA[1]['nomEquipe'] );
       
    }

    function jouer_demiFinal($numMatch) {
        
        $codeNomEq1 = 'm'.$numMatch.'eq1'; //code match sous forme : m1eq1, m2eq1,m3eq1,...
        $codeNomEq2 = 'm'.$numMatch.'eq2'; //code match sous forme : m1eq2, m2eq2,m3eq2,...

        if ( isset($_POST[$codeNomEq1]) && isset($_POST[$codeNomEq2]) 
            && isset($_POST['score1']) && isset($_POST['score2']) ) {
                
            $nomEquipe1 = $_POST[$codeNomEq1];
            $nomEquipe2 = $_POST[$codeNomEq2];
            $score1 = $_POST['score1'];
            $score2 = $_POST['score2'];
            
            setScoreDemiFinalBD($numMatch,$score1,$score2);
            
            // déclencher petite et grande finale
            qualifier_pour_Petite_et_Grande_Final($numMatch);

        }
    }
    
    /*======================== PETITE FINALE ===============================*/ 

    
    function qualifier_pour_Petite_et_Grande_Final($numMatch) {

        // --- Placer les valeurs retours dans 2 variables
        $les_2_equipes = resultats_demiFinal($numMatch);
        extract($les_2_equipes);
        
        insererPetiteFinalBD($numMatch, $petiteFinal );
        insererGrandeFinalBD($numMatch, $grandeFinal );
       
    }

    function jouer_petiteFinal($numMatch) {

        echo '<br>------------------------------------';
        echo '<br>Jouer Petite';
        
        $codeNomEq1 = 'm'.$numMatch.'eq1'; //code match sous forme : m1eq1, m2eq1,m3eq1,...
        $codeNomEq2 = 'm'.$numMatch.'eq2'; //code match sous forme : m1eq2, m2eq2,m3eq2,...

        if ( isset($_POST[$codeNomEq1] , $_POST[$codeNomEq2]) 
            && isset($_POST['score1']) && isset($_POST['score2']) ) {
                echo '<br>condition verifier presence 2equipes';
            $nomEquipe1 = $_POST[$codeNomEq1];
            $nomEquipe2 = $_POST[$codeNomEq2];
            $score1 = $_POST['score1'];
            $score2 = $_POST['score2'];
            
            setScorePetiteFinalBD($numMatch, $nomEquipe1, $nomEquipe2, $score1,$score2);
            echo '<br>apres setscorePetite';

        }
    }

    
    /*======================== GRANDE FINALE ===============================*/ 

    function jouer_Final($numMatch) {
        
        echo '<br>------------------------------------';
        echo '<br>Jouer Grande';
        $codeNomEq1 = 'm'.$numMatch.'eq1'; //code match sous forme : m1eq1, m2eq1,m3eq1,...
        $codeNomEq2 = 'm'.$numMatch.'eq2'; //code match sous forme : m1eq2, m2eq2,m3eq2,...

        if ( isset($_POST[$codeNomEq1]) && isset($_POST[$codeNomEq2]) 
            && isset($_POST['score1']) && isset($_POST['score2']) ) {
                echo '<br>condition verifier presence 2equipes';
            $nomEquipe1 = $_POST[$codeNomEq1];
            $nomEquipe2 = $_POST[$codeNomEq2];
            $score1 = $_POST['score1'];
            $score2 = $_POST['score2'];
            
            setScoreGrandeFinalBD($numMatch, $nomEquipe1, $nomEquipe2, $score1,$score2);
            echo '<br>apres setscoreGrande';

        }

    }
