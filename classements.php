<?php
    session_start();

    //DETRUIRE les session s'il n'y a plus de cookies
    if ( ! isset( $_COOKIE['tirageGroupeA'], $_COOKIE['tirageGroupeB'] ) ) {
        session_destroy();
    }    

    //importation des scirpts
    require ('classes/Equipe.php');
    include('functions/appelerBD.php');    
    include('functions/functions.php');    
    
    //variables pour définir les cookies
    $expiration = time() + 60 * 15;
    $path = '/';
    $tirageGroupeA = 'tirageGroupeA';
    $tirageGroupeB = 'tirageGroupeB';

    // ====================== INCLURE ET APPEL FONCTION GESTION ClASSEMENT ======================   
    
    gererClassement();

        // VARIABLES POUR AFFICHER EQUIPE DE CHAQUE GROUPE
        if (isset( $_COOKIE['tirageGroupeA'] ) ) {
            $groupeA = unserialize($_COOKIE['tirageGroupeA']);
        }

        if (isset( $_COOKIE['tirageGroupeB'] ) ) {
            $groupeB = unserialize($_COOKIE['tirageGroupeB']);
        }

    
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href= "css/style.css"/>
    <title>Classements</title>
</head>
<body>
     
  <?php require 'header.php';?> 


    <!---->
    <div class="container-calendar">  
        

        <section class="group row">
                
                <!-------------------------------------------->
                <!-------------------------------------------->
                <!----------- CLASSEMENT GROUPE A ----------->
                <!-------------------------------------------->
                <!-------------------------------------------->

                <div class="container-classement">
                <?php
                        include('Composants/Classements/classement_groupeA.php');
                ?>
                
                </div>
                    
                    <!-------------------------------------------->
                    <!-------------------------------------------->
                    <!----------- CLASSEMENT GROUPE B ----------->
                    <!-------------------------------------------->
                    <!-------------------------------------------->

                <div class="container-classement">  

                    <?php
                        include('Composants/Classements/classement_groupeB.php');
                ?>

                </div>

            </section>
            

    </div>

    <script src="js/app.js"></script>
    <script src="js/score.js"></script>
    <script src="js/focusRow.js"></script>
    <?php require 'footer.php';?> 

</body>
</html>
