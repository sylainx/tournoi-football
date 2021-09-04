<?php

    //importation base de donnée
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ConnexionBD' . DIRECTORY_SEPARATOR . 'base.php';

    // -------------------- CLASSEMENT --------------------
    function gererClassement() {
        global $bdd;

        // =============== SESSION CLASSEMENT GROUPE A ===============
    
        $sqlGrpe = "SELECT * FROM classementGroupeA ORDER BY point DESC, bp DESC";
        
        $stmtGrpeA = $bdd->prepare($sqlGrpe);
        $stmtGrpeA->execute();
        
        $i = 0; 
        $groupeA=[];

        while ($donnees = $stmtGrpeA->fetch() ) {
            
            extract($donnees);

            $groupeA[$i] = 
            [
                'nomEquipe' => $nomEquipe,
                'logo'  => $logo,
                'mj'  => $mj,
                'mg'  => $mg,
                'mn'  => $mn,
                'mp'  => $mp,
                'bp'  => $bp,
                'bc'  => $bc,
                'point'  => $point,
                'diff'  => $diff,
            ];

            $i++;
        }

        $stmtGrpeA->closeCursor();
    
        // =============== SESSION CLASSEMENT GROUPE B ===============
    
        $sqlGrpeB = "SELECT * FROM classementGroupeB ORDER BY point DESC, bp DESC";
        
        $stmtGrpeB = $bdd->prepare($sqlGrpeB);
        $stmtGrpeB->execute();
        
        $i = 0; 
        $groupeB = [];

        while ($donnees = $stmtGrpeB->fetch() ) {
            
            extract($donnees);

            $groupeB[$i] = 
            [
                'nomEquipe' => $nomEquipe,
                'logo'  => $logo,
                'mj'  => $mj,
                'mg'  => $mg,
                'mn'  => $mn,
                'mp'  => $mp,
                'bp'  => $bp,
                'bc'  => $bc,
                'point'  => $point,
                'diff'  => $diff,
            ];

            $i++;
        }

        $stmtGrpeB->closeCursor();
    
        
        //définir variable session pour statistique match
        $_SESSION['classement-Grpe-A'] = $groupeA;
        $_SESSION['classement-Grpe-B'] = $groupeB;


    }
    
