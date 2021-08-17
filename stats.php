<?php
    session_start();
    // redirectin
    // header('Location: index.php');    
    // exit();
    
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'championnatFoot' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Equipe.php';
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'championnatFoot' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Matchs.php';


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



    // définir le classement
    $classementGrpeA = array( $groupeA , $groupeB );
    $temp=20;
    
    
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier foot</title>
</head>
<body>

    <?php

        if ( isset( $_POST['numMatch'] ) ) {
            $numMatch = $_POST['numMatch'];

            jouer_match();

        }
        

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
                
                echo 'numero match: '.$numMatch . '<br>';
                echo 'nom equipe: '.$nomEquipe1 . '<br>';
                echo 'nom equipe: '.$nomEquipe2 . '<br>';
                echo 'score 1: '.$score1 . '<br>';
                echo 'score 2: '.$score2 . '<br><br>';
                

                // version PhP 7 et +
                // [$equipe1, $equipe2]= verifier_groupe_and_equipe($nomEquipe1,$nomEquipe2);
                $equipes= find_groupe_and_his_name($nomEquipe1,$nomEquipe2);
                
                if (isset($equipes)) {

                    echo '--------------------<br>';
                    echo 'Création match.............<br>';
                    echo '--------------------<br>';
                    // crée un match
                    $match = new Matchs($numMatch,$equipes['equipe1'],$equipes['equipe2'],$equipes['nomGroupe']);
                    
                    echo 'setScores<br>';
                    $match->setScores($score1,$score2);
                    
                    $gagnant = $match->gagnant();

                    if ( isset( $gagnant['gagnant'] ) ) {

                        echo '<br>Le gagnant est: '. $gagnant['gagnant']->getNom() ;
                        // echo '<br>Nombre total de point: '. $match->getScores()[0] . '-'. $match->getScores()[0];
                        echo '<br>Nombre total de but : '. $match->getScores()[0] . '-'. $match->getScores()[1];
                    }
                    else{
                        echo '<br>Match null: ' ;
                        echo '<br>Nombre total de but : '. $match->getScores()[0] . '-'. $match->getScores()[0];
                    }
                }
            }
        }

        
        //vérifier si les 2 equipes sont ds le meme groupe et renvoyer ce dernier
        function find_groupe_and_his_name($equipe1,$equipe2){
            $trouveEq1=false;
            $trouveEq2=false;
            $stockerTemporEq1 = null;
            $stockerTemporEq2 = null;
            $nomGroupe = null;
            
            echo 'intérieur func find_groupe <br>';
            
            //rechercher dans groupe A
            foreach ($GLOBALS['groupeA'] as $eq) {
                
                //verifier equipe 1
                if ( strcasecmp($equipe1, $eq->getNom() ) == 0 ) {
                    $trouveEq1=true;
                    echo '<br>trouve equipe 1';
                    $stockerTemporEq1 = $eq;
                }
                //verifier equipe 2
                if ( strcasecmp($equipe2, $eq->getNom() ) == 0 ) {
                    $trouveEq2 =true;
                    echo '<br>trouve equipe 2';
                    $stockerTemporEq2 = $eq;
                }

            }


            //condition validant que les 2 sont ds le meme groupe
            if ($trouveEq1 &&  $trouveEq2) {
                echo '<br><br> meme groupe[A]<br>';
                $nomGroupe='A';
                return array(
                    'equipe1' => $stockerTemporEq1 ,
                    'equipe2' => $stockerTemporEq2,
                    'nomGroupe'=> $nomGroupe);
            }
            
            //rechercher dans groupe B
            foreach ($GLOBALS['groupeB'] as $eq) {
                //verifier equipe 1
                if ( strcasecmp($equipe1, $eq->getNom() ) == 0 ) {
                    $trouveEq1=true;
                    echo '<br>trouve equipe 1';
                    $stockerTemporEq1 = $eq;
                }
                //verifier equipe 2
                if ( strcasecmp($equipe2, $eq->getNom() ) == 0 ) {
                    $trouveEq2 =true;
                    echo '<br>trouve equipe 2';
                    $stockerTemporEq2 = $eq;
                }

            }
            
            //condition validant que les 2 sont ds le meme groupe
            if ( $trouveEq1 &&  $trouveEq2) {
                $nomGroupe='B';
                echo '<br><br> meme groupe'.$nomGroupe.'<br>';
                return array(
                    'equipe1' => $stockerTemporEq1 ,
                    'equipe2' => $stockerTemporEq2,
                    'nomGroupe'=> $nomGroupe);
            }

        }
    


        // redirection
        // exit();

    ?>

</body>
</html>