<?php
    session_start();

    // variables contenant les erreurs formulaires
    $_SESSION['errors'] = $errors= array();

    // redirectin vers la page d un dossier plus haut
    header('Location: ../dashboard.php');    


    require('../classes/Equipe.php');
    require('../classes/Matchs.php');
    require_once dirname(__DIR__) .'../'. DIRECTORY_SEPARATOR . 'ConnexionBD' . DIRECTORY_SEPARATOR . 'base.php';
    include('functions.php');

    
    // VARIABLES POUR CONSERVER GROUPE
    if (isset( $_COOKIE['tirageGroupeA'] ) ) {
        $groupeA = unserialize($_COOKIE['tirageGroupeA']);

    }else {
         $groupeA = [];
    }

    if (isset( $_COOKIE['tirageGroupeB'] ) ) {
        $groupeB = unserialize($_COOKIE['tirageGroupeB']);
    
    }else {
        $groupeB = [];        
    }

        
    //-------------------- GESTION MATCH --------------------

    if ( isset( $_POST['numMatch'] ) ) {

        $numMatch = $_POST['numMatch'];

        if ($numMatch > 0 AND $numMatch <= 12 ) {
            jouer_match(); //call functions.php
        }
        elseif ($numMatch == 13 OR $numMatch == 14) {
            jouer_demiFinal($numMatch); //call functions.php
        }
        elseif ($numMatch == 15 ) {
            jouer_petiteFinal($numMatch); //call functions.php
        }
        elseif ($numMatch == 16 ) {
            jouer_Final($numMatch); //call functions.php
        }
    }



    // redirection
    exit();

?>
