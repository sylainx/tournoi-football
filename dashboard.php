<?php
    session_start();
    
    //DETRUIRE les session s'il n'y a plus de cookies
    if ( ! isset( $_COOKIE['tirageGroupeA'], $_COOKIE['tirageGroupeB'] ) ) {
        session_destroy();
    }    

    //importation des scirpts
    require ('classes/Equipe.php');  
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

            if ( !($groupeA || $groupeB)  and $_SESSION ) {
                /*-- Réinitialiser tables et sessions --*/ 
                   delete_all_tables();
           }
           
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
    <title>Accueil</title>
    
	<style>
		.table{
			display:table;
			border-collapse: collapse;
			min-width: 400px;
			box-shadow: 0 0 20px rgba(0,0,0,0.15);
			margin: 2rem auto;
    		font-size: 0.9rem;
            border-radius:20px;
		}

		.thead
		{
			display:table-header-group;
			font-weight:bold;
			background-color:grey;
			background-color: #009879;
			color: #ffffff;
			text-align: center;
            border-radius: 20px;
		}

		.tbody
		{
			display:table-row-group;
		}
		.tr
		{
			border-bottom: 1px solid #dddddd;
			display:table-row;
		}

		.td
		{
			padding: 12px 15px;
			display:table-cell;
		} 
		
		.tr.editing .td INPUT
		{
			width:100px;
		}

	</style>



</head>
<body>
     
  <?php require 'header.php';?> 
 
  
         <!---->
    <div class="container-calendar">   
       <!---->
        
        
        <section class="team-list">
            <!----------- LISTE DES GROUPES ----------->
            
            <table class="styled-table" >
                
                <thead>
                    <tr>
                        <th>Lot #1 (Tete de série)</th>
                        <th>Lot #2 (Tete de série)</th>
                        <th>Lot #3 (Tete de série)</th>
                        <th>Lot #3 (Tete de série)</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><img src="Icons/brazil.png" alt="team 1" style="width: 45px;"></td>
                        <td><img src="Icons/France.png" alt="team 3" style="width: 40px;"></td>
                        <td><img src="Icons/spain.svg" alt="team 5" style="width: 35px;" ></td>
                        <td><img src="Icons/portugal.svg" alt="team 7" style="width: 35px;"></td>
                    </tr>
                    <tr>
                        <td><img src="Icons/argentina.svg" alt="team 2" style="width: 45px;"></td>
                        <td><img src="Icons/italia.png" alt="team 4" style="width: 35px;"></td>
                        <td><img src="Icons/germany.png" alt="team 6" style="width: 45px;" ></td>
                        <td><img src="Icons/haiti.png" alt="team 8" style="width: 40px;" ></td>
                    </tr>
                </tbody>

            </table>

            <!---------------- TIRAGE BUTTON ---------------->

            <div class="btn-tirage">
                <form action="functions/tirage.php" method="post">
                    <button type="submit"  class="cart-btn banner-btn" name="lancer-tirage" value="tirage">Tirage</button>
                    
                </form>
            </div>

            <div class="wave wave1"></div>
            <div class="wave wave2"></div>
            <div class="wave wave3"></div>
            <div class="wave wave4"></div>

        </section>

        

        <!----------- LISTE DES GROUPES ----------->
        <?php include('Composants/repartition_groupes.php'); ?>


    <section class="team-group"> 
        
        <!-------------------------------------------->
        <!----------- affiche groupe A --------------->
        <!-------------------------------------------->
        <?php include('Composants/Calendrier/matchs_groupeA.php'); ?>

        <!-------------------------------------------->
        <!----------- affiche groupe b --------------->
        <!-------------------------------------------->
        <?php include('Composants/Calendrier/matchs_groupeB.php'); ?>

    </section>


        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- demi final  ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->
        
        <?php include('Composants/PhasesFinales/demiFinal.php'); ?>
           
        
        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- 3eme place ----------->
        <!-------------------------------------------->
        
        <?php include('Composants/PhasesFinales/petiteFinale.php'); ?>
        
        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- Grande finale ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->
        
        <?php include('Composants/PhasesFinales/grandeFinale.php'); ?>


   </div>

   <?php require 'footer.php';?> 

    <script src="js/app.js"></script>
    <script src="js/score.js"></script>
    <script src="js/focusRow.js"></script>
    
</body>
</html>
