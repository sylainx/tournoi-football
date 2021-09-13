<?php
    
    //importation base de donnée
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ConnexionBD' . DIRECTORY_SEPARATOR . 'base.php';

    // -------------------- CLASSEMENT MATCH DE GROUPE --------------------
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

        return [
            'groupeA' => $groupeA,
            'groupeB' => $groupeB
        ];
    }
    
    // -------------------- DETERMINER QUI A GAGNÉ OU PERDU --------------------
    function resultats_demiFinal($numMatch){
        
        global $bdd;

        // selectionner les 2 scores
        $codeSql = "SELECT equipe1, equipe2, score1, score2 FROM demifinal WHERE id=".$numMatch;
        $stmtDemiFinal = $bdd->query($codeSql); //placez-les dans une variables

        //récupération des des colonnes dans une variables
        $colonnes_Demi_Final = $stmtDemiFinal->fetch();
        extract($colonnes_Demi_Final); // accéder a partir de la clé tab associatif

        $stmtDemiFinal->closeCursor();

        if ($score1 > $score2) {
            $grandefinal  = $equipe1;
            $petitefinal  = $equipe2;
        }
        else if ($score1 < $score2) {
            $grandefinal  = $equipe2;
            $petitefinal  = $equipe1;
        }
        else {
            // A REMPLIR
        }
        
        return [
            'grandeFinal' => $grandefinal,
            'petiteFinal' => $petitefinal
        ];

    }

    function resultats_petiteFinal($numMatch){
        
        global $bdd;

        // selectionner les 2 scores
        $codeSql = "SELECT equipe1, equipe2, score1, score2 FROM demifinal WHERE id=".$numMatch;
        $stmtDemiFinal = $bdd->query($codeSql); //placez-les dans une variables

        //récupération des des colonnes dans une variables
        $colonnes_Demi_Final = $stmtDemiFinal->fetch();
        extract($colonnes_Demi_Final); // accéder a partir de la clé tab associatif

        $stmtDemiFinal->closeCursor();

        if ($score1 > $score2) {
            $grandefinal  = $equipe1;
            $petitefinal  = $equipe2;
        }
        else if ($score1 < $score2) {
            $grandefinal  = $equipe2;
            $petitefinal  = $equipe1;
        }
        else {
            // A REMPLIR
        }
        
        return [
            'grandeFinal' => $grandefinal,
            'petiteFinal' => $petitefinal
        ];

    }

    function resultats_grandeeFinal($numMatch){
        
        global $bdd;

        // selectionner les 2 scores
        $codeSql = "SELECT equipe1, equipe2, score1, score2 FROM demifinal WHERE id=".$numMatch;
        $stmtDemiFinal = $bdd->query($codeSql); //placez-les dans une variables

        //récupération des des colonnes dans une variables
        $colonnes_Demi_Final = $stmtDemiFinal->fetch();
        extract($colonnes_Demi_Final); // accéder a partir de la clé tab associatif

        $stmtDemiFinal->closeCursor();

        if ($score1 > $score2) {
            $grandefinal  = $equipe1;
            $petitefinal  = $equipe2;
        }
        else if ($score1 < $score2) {
            $grandefinal  = $equipe2;
            $petitefinal  = $equipe1;
        }
        else {
            // A REMPLIR
        }
        
        return [
            'grandeFinal' => $grandefinal,
            'petiteFinal' => $petitefinal
        ];

    }
    
    // -----------------------------------------------------------------
    // ----------------------- DEMI FINAL -----------------------
    // -----------------------------------------------------------------

    // -------------- DÉFINIR UNIQUEMENT LES EQUIPES QUALIFIÉES EN DEMIFINAL --------------        
    function insererDemiFinalBD( $id, $frstGrpe, $scndGrpe ){
        
        global $bdd;

        $codeSql = "INSERT INTO demifinal( id, equipe1, equipe2) VALUES( :id, :equipe1, :equipe2 )";
    
        $stmtListeMatch = $bdd->prepare($codeSql);

        $stmtListeMatch->execute(array(
            ':id' => $id,
            ':equipe1' => $frstGrpe,
            ':equipe2' => $scndGrpe
        ));

        $stmtListeMatch->closeCursor();      

        $nomSession = 'match-demiFinal-'.$id;
        
        $_SESSION[ $nomSession ] = [
            'equipe1' => $frstGrpe, 
            'equipe2' => $scndGrpe
        ] ;

    }
    
    // -------------- SCORE DU MATCH EN DEMIFINAL --------------        
    function setScoreDemiFinalBD($id, $score1, $score2 ){
        echo '<br>------------------------------------';
        echo '<br> entré dans set score';

        global $bdd;

        $codeSql = "UPDATE demifinal SET score1 = :score1 , score2 = :score2 WHERE id= :id";
        echo '<br>id: ' . $id;
        echo '<br>score 1: ' . $score1 ;
        echo '<br>score 2: ' . $score2 ;
        $stmtListeMatch = $bdd->prepare($codeSql);

        $stmtListeMatch->execute(array(
            ':score1' => $score1,
            ':score2' => $score2,
            ':id' => $id
        ));

        $stmtListeMatch->closeCursor();             

        $nomSession = 'score-demiFinal-'.$id;
        
        $_SESSION[ $nomSession ] = [
            'score1' => $score1, 
            'score2' => $score2
        ] ;
        
    }
    
    
     
    // -----------------------------------------------------------------
    // ----------------------- PETITE FINAL -----------------------
    // -----------------------------------------------------------------

    // -------------- DÉFINIR LES EQUIPES petiteFINAL --------------        
    function insererPetiteFinalBD( $id, $equipe ){
        
        global $bdd;

        $codeSql = "INSERT INTO petitefinal( id, nomEquipe) VALUES( :id, :nomEquipe )";
    
        $stmtListeMatch = $bdd->prepare($codeSql);

        $stmtListeMatch->execute(array(
            ':id' => $id,
            ':nomEquipe' => $equipe
        ));

        $stmtListeMatch->closeCursor();             

        
        $nomSession = 'match-petiteFinal-'.$id;
        
        $_SESSION[ $nomSession ] = [
            'nomEquipe' => $equipe,
        ] ;
        
    }
    
        
    // -------------- SCORE DU MATCH EN PetiteFINAL --------------        
    function setScorePetiteFinalBD($id , $nomEquipe1, $nomEquipe2, $score1, $score2 ){
        
        global $bdd;
        
        $codeSql = "UPDATE petitefinal SET score = :score1 WHERE nomEquipe= :nomEquipe1 AND id= :id";
    
        $stmtListeMatch = $bdd->prepare($codeSql);

        $stmtListeMatch->execute(array(
            ':score1' => $score1,
            ':id' => $id,
            ':nomEquipe1'=> $nomEquipe1
        ));

        $stmtListeMatch->closeCursor();             

        $codeSql = "UPDATE petitefinal SET score = :score2 WHERE nomEquipe= :nomEquipe2 AND id= :id";
    
        $stmtListeMatch = $bdd->prepare($codeSql);

        $stmtListeMatch->execute(array(
            ':score2' => $score2,
            ':id' => $id,
            ':nomEquipe2'=> $nomEquipe2
        ));

        $stmtListeMatch->closeCursor();             
        
        $nomSession = 'score-petiteFinale-'. $id;
        //définir variable session pour statistique match
        $_SESSION[ $nomSession] = [
            'score1' => $score1, 
            'score2' => $score2
        ];
        
    }
  
     
    // -----------------------------------------------------------------
    // ----------------------- GRANDE FINAL -----------------------
    // -----------------------------------------------------------------

    function insererGrandeFinalBD( $id, $equipe ){
        
        global $bdd;

        $codeSql = "INSERT INTO grandefinal( id, nomEquipe) VALUES( :id, :nomEquipe )";
    
        $stmtListeMatch = $bdd->prepare($codeSql);

        $stmtListeMatch->execute(array(
            ':id' => $id,
            ':nomEquipe' => $equipe
        ));

        $stmtListeMatch->closeCursor();             

        $nomSession = 'match-grandeFinal-'.$id;
        
        $_SESSION[ $nomSession ] = [
            'nomEquipe' => $equipe,
        ] ;
        
    }


    // -------------- DÉFINIR LE SCORE DU MATCH EN GrandeFINAL --------------        
    function setScoreGrandeFinalBD($id, $nomEquipe1, $nomEquipe2, $score1, $score2 ){
        
        global $bdd;

        $codeSql = "UPDATE grandefinal SET score = :score1 WHERE nomEquipe= :nomEquipe1";
    
        $stmtGrandeFinale = $bdd->prepare($codeSql);

        $stmtGrandeFinale->execute(array(
            ':score1' => $score1,
            ':nomEquipe1'=> $nomEquipe1
        ));

        $stmtGrandeFinale->closeCursor();             

        
        $codeSql = "UPDATE grandefinal SET score = :score2 WHERE nomEquipe= :nomEquipe2";
    
        $stmtGrandeFinale = $bdd->prepare($codeSql);

        $stmtGrandeFinale->execute(array(
            ':score2' => $score2,
            ':nomEquipe2'=> $nomEquipe2
        ));

        $stmtGrandeFinale->closeCursor();             
        
        $nomSession = 'score-grandeFinale-'. $id;
        //définir variable session pour statistique match
        $_SESSION[ $nomSession] = [
            'score1' => $score1, 
            'score2' => $score2
        ];
        
        
    }


    // ================== FEATURES =================
    
    function delete_all_tables(){
        
        global $bdd;

        // ------------ effacer toutes les données liste des matchs ------------
        $codeSql = "DELETE FROM listematchs";
        $requete = $bdd->prepare($codeSql);
        $requete->execute();
        $requete->closeCursor();
       
        // ------------ effacer toutes les données classement Groupe A ------------
        $codeSql = "DELETE FROM classementgroupea";
        $requete = $bdd->prepare($codeSql);
        $requete->execute();
        $requete->closeCursor();
        
        // ------------ effacer toutes les données classement Groupe B ------------
        $codeSql = "DELETE FROM classementgroupeb";
        $stmt1 = $bdd->prepare($codeSql);
        $stmt1->execute();
        $stmt1->closeCursor();
        
        // ------------ effacer toutes les données demiFinal ------------
        $codeSql = "DELETE FROM demifinal";
        $stmt1 = $bdd->prepare($codeSql);
        $stmt1->execute();
        $stmt1->closeCursor();
        
        // ------------ effacer toutes les données petiteFinal ------------
        $codeSql = "DELETE FROM petitefinal";
        $stmt1 = $bdd->prepare($codeSql);
        $stmt1->execute();
        $stmt1->closeCursor();
        
        // ------------ effacer toutes les données grandeFinal ------------
        $codeSql = "DELETE FROM grandefinal";
        $stmt1 = $bdd->prepare($codeSql);
        $stmt1->execute();
        $stmt1->closeCursor();

    }