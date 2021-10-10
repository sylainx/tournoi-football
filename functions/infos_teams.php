<?php

    /* ========================= PERMET DE FAIRE ============================  
    
        * Qte match jouee : cliquable et renverra vers la page liste des matchs joues
        * Somme buts(moyenne)
        * Ratio buts(moyenne)
        * %tage de victoire
        * Lister tous les matchs joués
        

        * Nomme Vainqueur Edition
        * Nomme 2eme Edition
        * Nomme 3eme Edition

    /*--------------------------------------------------------------------------------------- */ 
    /*-------------------------------- DETAILS SUR LES EQUIPE--------------------------------- */ 
    /*--------------------------------------------------------------------------------------- */ 
    
    
    function detailDeTousLesMatchs() {
        
        // prends tous les matchs
        $lesMatchsJoues = infosSurMatchJoues();

       if ( count( $lesMatchsJoues ) > 0 ) {           
            
            $sommeTousScores=0;
            $grandsScore = array();

            $nbVictoire=0;
            $nbNul=0;

            // -------------------------------------------
            // Qte de matchs joués
            $qteMatchJouees = count($lesMatchsJoues) ;
            echo '<br>Qte Match joués -> '.$qteMatchJouees;
            
            
            // -------------------------------------------
                // Somme de tous les buts
                // Moyenne des matchs joués
                // %tage victoire
            foreach ($lesMatchsJoues as $scoresMatch ) {
                $sommeTousScores += $scoresMatch['score1'] + $scoresMatch['score2'];
                
                # %tage victoire et match nul
                if ( $scoresMatch['gagnant'] == 'None' ) {
                    $nbNul +=1;
                }else {
                    $nbVictoire += 1;
                }

            }
                        // matchs
            $ratioButsParMatch = $sommeTousScores / count($lesMatchsJoues) ;

            echo '<br>Somme but de tous les matchs : '. $sommeTousScores;
            echo '<br>Ratio(Moyenne) Match : '. $ratioButsParMatch;
            
            // --------------------- %TAGE MATCH VICTOIRE ET PERDU ----------------------
            
            $pourcentageVictoire = $nbVictoire / ($nbVictoire+$nbNul) * 100;
            $pourcentageNul = $nbNul / ($nbVictoire+$nbNul) * 100;
            

            return(array(
                'qteMatchJouees' => $qteMatchJouees,
                'sommeTousScores' => $sommeTousScores,
                'ratioButsParMatch' => $ratioButsParMatch,
                'pourcentageVictoire' => $pourcentageVictoire,
                'pourcentageNul' => $pourcentageNul,

            ));

       }

    }


    // donnerVainqueursEdition();

    function detailFinales()
    {
        $lesMatchsPhasesFinales = donnerVainqueursEdition();

        if ( count( $lesMatchsPhasesFinales ) > 0 ) {
            
            
            // 'vqGrdeFinale'
            // 'perdantGrdeFinale'
            // 'vqPetiteFinale'
            return $lesMatchsJoues;

        }
    }



?>