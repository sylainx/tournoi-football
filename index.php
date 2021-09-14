<?php
    session_start();

    //DETRUIRE les session s'il n'y a plus de cookies
    if ( ! isset( $_COOKIE['tirageGroupeA'], $_COOKIE['tirageGroupeB'] ) ) {
        session_destroy();
    }    

    //importation des scirpts
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'championnatFoot' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Equipe.php';
    include('functions/appelerBD.php');    
    include('functions/functions.php');    
    
    //variables pour définir les cookies
    $expiration = time() + 60 * 15;
    $path = '/';
    $tirageGroupeA = 'tirageGroupeA';
    $tirageGroupeB = 'tirageGroupeB';

    
    /* ========================================================================================*/
    // ====================== INCLURE ET APPEL FONCTION GESTION ClASSEMENT ======================
    /* ========================================================================================*/    
    
    gererClassement();

    
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
    <title>Document</title>
</head>
<body>
     
  <?php require 'header.php';?> 
  
  <!-- Cart overlay-->
    <div class="cart-overlay" id="tt">
        <div class="cart">
            <span class="close-cart">
                <i class="fas fa-window-close"></i>
            </span>
            <div class="cart-content">
                <!--score cart item--> 
                
                <!-- <div class="container-faceToFace">-->
                    <div class="title">
                        <h2>LATEST VERSUS</h2>
                    </div>
                    <div class="sub-title">
                        <h4>TOURNOI SOCCER</h4>
                    </div>
                    <div class="container-matchInfo row">
                        <!--icon first team-->
                        <div class="icon-team1">
                            <img src="Icons/brazil.png" style="width: 100px;" alt="">
                        </div>
                        <!--Match versus infos(score,etc...)-->
                        <div class="info-versus">
                            <div class="score-info row">
                                <span class="team-name1">TEST</span>
                                    <span class="score-content row">
                                        <div class="score1"><input type="number"></div>
                                        <div class="score2"><input type="number"></div>
                                    </span>
                                <span class="team-name2">TEST</span>
                            </div>

                            <div class="meta-info row">
                            <div> 
                                <h5>Top Passer</h5>
                                <p id="passer">CA:mario Gauthier</p>
                                </div>
                            <div> 
                                <h5>Submit score</h5>
                                <button class="btn-score">SUBMIT</button>
                                </div>
                            
                            <div> 
                                <h5>Top Scorer</h5>
                                <p id="scorer">CA:mario Gauthier</p>
                                </div>
                            </div>

                        </div>
                        <!--icon second team-->
                        <div class="icon-team2">
                            <img src="Icons/brazil.png" style="width: 100px;" alt="">
                        </div>
                    </div>
                <!--</div>-->

                <!-- end score cart item--> 
            </div>
        </div>
    </div>
         <!--end of cart overlay-->
    
         <!---->
    <div class="container-calendar">   
       <!---->
        <div class="container-about">
            <div class="about-title">
                    <div class="section-title">
                        <h2 data-title="Calendar of team">Liste d'equipe</h2>
                        
                    </div>
            </div>
        </div>
    

        <!----------- LISTE DES GROUPES ----------->
        
        <table class="styled-table" >
            
            <thead>
                <tr>
                    <th>Lot #1 (e tete de série)</th>
                    <th>Lot #2 (e tete de série)</th>
                    <th>Lot #3 (e tete de série)</th>
                    <th>Lot #3 (e tete de série)</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><img src="Icons/brazil.png" alt="team 1" style="width: 55px;"></td>
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

        <form action="tirage/tirage.php" method="post">
            <button type="submit" class="cart-btn banner-btn" name="lancer-tirage" value="tirage">Tirage</button>
        </form>

        
        <!--------------- tirage equipe --------------->
        <?php
            
            // VARIABLES POUR AFFICHER EQUIPE DE CHAQUE GROUPE
            if (isset( $_COOKIE['tirageGroupeA'] ) ) {
                $groupeA = unserialize($_COOKIE['tirageGroupeA']);
            }

            if (isset( $_COOKIE['tirageGroupeB'] ) ) {
                $groupeB = unserialize($_COOKIE['tirageGroupeB']);
            }

        ?>


        
    <!--------------- fin code PhP --------------->



        <!----------- LISTE DES GROUPES ----------->

        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Classement of team">Classement</h2>
                </div>
            </div>
        </div>

        <table class="styled-table" >
            
            <thead>
                <tr>
                    <th></th>
                    <th>GROUPE A</th>
                    <th>GROUPE B</th>
                </tr>

            </thead>

            <tbody>

                <?php
                    for ($i=0; $i < 4; $i++) {                     
                ?>
                <tr>
                    <td> <?php echo ($i+1) ?>e TDS</td>
                    <?php
                        if (isset($groupeA[$i])) {
                            
                    ?>
                        <td><?php echo $groupeA[$i]->getNom() ?> </td>
                        <td><?php echo $groupeB[$i]->getNom() ?> </td>

                </tr>

                <?php
                        }else{
                ?>

                    <td><?= 'Equipe '. ($i+1); ?> </td>
                    <td><?= 'Equipe '. ($i+1); ?> </td>
                <?php
                    }
                }
                ?>
                            
            </tbody>

        </table>



        <!-------------------------------------------->
        <!----------- affiche groupe A --------------->
        <!-------------------------------------------->

        
        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Calendar of team">Groupe A</h2>                    
                </div>
            </div>
        </div>

        <table class="styled-table" >        
            <thead>
                <tr>
                    <th>GROUPE A</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>

            </thead>

            <tbody>
                <!-- match 1 -->
                
                <?php
                    
                    for ($i=1; $i < 7; $i++) { // ouvrir boucle   ATTENTION, boucle commence a 1
                        
                ?>
                
                <tr>
                    <form action='functions/stats.php' method='post'> <!-- formulaire d'envoi donnees -->
                
                    <td>Match <?php echo $i; ?> </td> 
                    
                    <!-- colonne affiche EqX VS EqY -->

                    <td id=<?php echo "match-".$i; ?> >

                        <?php
                            switch ($i) {

                                case 1:
                                    if (isset($groupeA)) {
                                        echo '<span>'.$groupeA[0]->getNom(). '</span> VS <span>'. $groupeA[1]->getNom() .'</span>' 
                                    ?>
                                        <input type="hidden" id='m1eq1' name='m1eq1' value=<?php echo $groupeA[0]->getNom()?>  >
                                        <input type="hidden" id='m1eq2' name='m1eq2' value=<?php echo $groupeA[1]->getNom()?>  >
                                    <?php
                                        }else {
                                            echo '1TDS VS 2TDS';
                                        }
                                break;
                                
                                case 2:
                                    if (isset($groupeA)) {
                                        echo '<span>'.$groupeA[2]->getNom(). '</span> VS <span>'. $groupeA[3]->getNom() .'</span>' 
                                    ?>
                                        <input type="hidden" id='m2eq1' name='m2eq1' value=<?php echo $groupeA[2]->getNom()?>  >
                                        <input type="hidden" id='m2eq2' name='m2eq2' value=<?php echo $groupeA[3]->getNom()?>  >
                                    <?php
                                        }else {
                                            echo '3TDS VS 4TDS';
                                        }
                                break;                
                                
                                case 3:
                                    if (isset($groupeA)) {
                                        echo '<span>'.$groupeA[0]->getNom(). '</span> VS <span>'. $groupeA[2]->getNom() .'</span>' 
                                    ?>
                                        <input type="hidden" id='m3eq1' name='m3eq1' value=<?php echo $groupeA[0]->getNom()?>  >
                                        <input type="hidden" id='m3eq2' name='m3eq2' value=<?php echo $groupeA[2]->getNom()?>  >
                                    <?php
                                        }else {
                                            echo '1TDS VS 3TDS';
                                        }
                                break;
                                
                                case 4:
                                    if (isset($groupeA)) {
                                        echo '<span>'.$groupeA[1]->getNom(). '</span> VS <span>'. $groupeA[3]->getNom() .'</span>' 
                                    ?>
                                        <input type="hidden" id='m4eq1' name='m4eq1' value=<?php echo $groupeA[1]->getNom()?>  >
                                        <input type="hidden" id='m4eq2' name='m4eq2' value=<?php echo $groupeA[3]->getNom()?>  >
                                    <?php
                                        }else {
                                            echo '2TDS VS 4TDS';
                                        }
                                break;
                                
                                case 5:
                                    if (isset($groupeA)) {
                                        echo '<span>'.$groupeA[0]->getNom(). '</span> VS <span>'. $groupeA[3]->getNom() .'</span>' 
                                    ?>
                                        <input type="hidden" id='m5eq1' name='m5eq1' value=<?php echo $groupeA[0]->getNom()?>  >
                                        <input type="hidden" id='m5eq2' name='m5eq2' value=<?php echo $groupeA[3]->getNom()?>  >
                                    <?php
                                        }else {
                                            echo '1TDS VS 4TDS';
                                        }
                                break;
                                
                                case 6:
                                    if (isset($groupeA)) {
                                        echo '<span>'.$groupeA[1]->getNom(). '</span> VS <span>'. $groupeA[2]->getNom() .'</span>' 
                                    ?>
                                        <input type="hidden" id='m6eq1' name='m6eq1' value=<?php echo $groupeA[1]->getNom()?>  >
                                        <input type="hidden" id='m6eq2' name='m6eq2' value=<?php echo $groupeA[2]->getNom()?>  >
                                    <?php
                                        }else {
                                            echo '2TDS VS 3TDS';
                                        }
                                break;
                            }
                        ?>

                    </td>

                    <td id="score"> 

                        <?php
                            $nomSession = 'match-'.$i.'-Grpe-A'; //recuperer le nom session dynamiquement 

                            if ( isset($_SESSION[$nomSession]['scores'][0]) && isset($_SESSION[$nomSession]['scores'][1])) {
                                
                        ?>
                            <input type="number" disabled id='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][0] ?>  >
                            -
                            <input type="number" disabled id='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][1] ?>  >
                                
                        <?php
                            }else{
                        ?>
                            <!-- CHANGER SCORE A CHAQUE REDIRECTION -->
                            
                            <select name='score1'>
                                <?php liste_option_but(); ?>
                            </select>                        
                            - 
                            <select name='score2'>
                                <?php liste_option_but(); ?>
                            </select>                        
                        
                            <?php
                            }
                        ?>

                    </td>

                        <td id="jouer">
                            <input type="hidden" id='numMatch' name='numMatch' value=<?php echo  $i; ?> >
                            <button class="btn-add btn-score" >Jouer</button>
                        </td>

                    </form>

                </tr>

                <?php
                    } // fermer boucle for
                ?>
            

            </tbody>
        </table>


        <!-------------------------------------------->
        <!----------- affiche groupe b --------------->
        <!-------------------------------------------->
        
        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Calendar of team">Groupe B</h2>
                </div>
            </div>
        </div>

        <table class="styled-table" >        
            <thead>
                <tr>
                    <th>GROUPE B</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>

            </thead>

            <tbody>

                <!-- match  -->
                
                <?php
                    
                    for($i = 7; $i < 13; $i++) { // ouvrir boucle   ATTENTION, boucle commence a 1
                        
                ?>
                
                <tr>
                    <form action='functions/stats.php' method='post'> <!-- formulaire d'envoi donnees -->
                    
                        <td>Match <?php echo $i; ?> </td> 
                        
                        <!-- colonne affiche EqX VS EqY -->

                        <td id=<?php echo "match-".$i; ?> >

                            <?php
                                switch ($i) {

                                    case 7:
                                        if (isset($groupeB)) {
                                            echo '<span>'.$groupeB[0]->getNom(). '</span> VS <span>'. $groupeB[1]->getNom() .'</span>' 
                                        ?>
                                            <input type="hidden" id='m7eq1' name='m7eq1' value=<?php echo $groupeB[0]->getNom()?>  >
                                            <input type="hidden" id='m7eq2' name='m7eq2' value=<?php echo $groupeB[1]->getNom()?>  >
                                        <?php
                                            }else {
                                                echo '1TDS VS 2TDS';
                                            }
                                    break;
                                    
                                    case 8:
                                        if (isset($groupeB)) {
                                            echo '<span>'.$groupeB[2]->getNom(). '</span> VS <span>'. $groupeB[3]->getNom() .'</span>' 
                                        ?>
                                            <input type="hidden" id='m8eq1' name='m8eq1' value=<?php echo $groupeB[2]->getNom()?>  >
                                            <input type="hidden" id='m8eq2' name='m8eq2' value=<?php echo $groupeB[3]->getNom()?>  >
                                        <?php
                                            }else {
                                                echo '3TDS VS 4TDS';
                                            }
                                    break;                
                                    
                                    case 9:
                                        if (isset($groupeB)) {
                                            echo '<span>'.$groupeB[0]->getNom(). '</span> VS <span>'. $groupeB[2]->getNom() .'</span>' 
                                        ?>
                                            <input type="hidden" id='m9eq1' name='m9eq1' value=<?php echo $groupeB[0]->getNom()?>  >
                                            <input type="hidden" id='m9eq2' name='m9eq2' value=<?php echo $groupeB[2]->getNom()?>  >
                                        <?php
                                            }else {
                                                echo '1TDS VS 3TDS';
                                            }
                                    break;
                                    
                                    case 10:
                                        if (isset($groupeB)) {
                                            echo '<span>'.$groupeB[1]->getNom(). '</span> VS <span>'. $groupeB[3]->getNom() .'</span>' 
                                        ?>
                                            <input type="hidden" id='m10eq1' name='m10eq1' value=<?php echo $groupeB[1]->getNom()?>  >
                                            <input type="hidden" id='m10eq2' name='m10eq2' value=<?php echo $groupeB[3]->getNom()?>  >
                                        <?php
                                            }else {
                                                echo '2TDS VS 4TDS';
                                            }
                                    break;
                                    
                                    case 11:
                                        if (isset($groupeB)) {
                                            echo '<span>'.$groupeB[0]->getNom(). '</span> VS <span>'. $groupeB[3]->getNom() .'</span>' 
                                        ?>
                                            <input type="hidden" id='m11eq1' name='m11eq1' value=<?php echo $groupeB[0]->getNom()?>  >
                                            <input type="hidden" id='m11eq2' name='m11eq2' value=<?php echo $groupeB[3]->getNom()?>  >
                                        <?php
                                            }else {
                                                echo '1TDS VS 4TDS';
                                            }
                                    break;
                                    
                                    case 12:
                                        if (isset($groupeB)) {
                                            echo '<span>'.$groupeB[1]->getNom(). '</span> VS <span>'. $groupeB[2]->getNom() .'</span>' 
                                        ?>
                                            <input type="hidden" id='m12eq1' name='m12eq1' value=<?php echo $groupeB[1]->getNom()?>  >
                                            <input type="hidden" id='m12eq2' name='m12eq2' value=<?php echo $groupeB[2]->getNom()?>  >
                                        <?php
                                            }else {
                                                echo '2TDS VS 3TDS';
                                            }
                                    break;
                                }
                            ?>

                        </td>

                        <td id="score"> 
        
                            <?php
                                $nomSession = 'match-'.$i.'-Grpe-B'; //recuperer le nom session dynamiquement 

                                if ( isset($_SESSION[$nomSession]['scores'][0]) && isset($_SESSION[$nomSession]['scores'][1])) {
                                    
                            ?>
                                <input type="number" disabled id='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][0] ?>  >
                                -
                                <input type="number" disabled id='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][1] ?>  >
                                    
                            <?php
                                }else{
                            ?>
                                <!-- CHANGER SCORE A CHAQUE REDIRECTION -->
                                
                                <select name='score1'>
                                    <?php liste_option_but(); ?>
                                </select>                        
                                - 
                                <select name='score2'>
                                    <?php liste_option_but(); ?>
                                </select>                        
                            
                                <?php
                                }
                            ?>

                        </td>

                        <td id="jouer">
                            <input type="hidden" id='numMatch' name='numMatch' value=<?php echo  $i; ?> >
                            <button class="btn-add btn-score">Jouer</button>
                        </td>

                    </form>

                </tr>

                <?php
                    } // fermer boucle for
                ?>
            

            </tbody>
        </table>


        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- CLASSEMENT GROUPE A ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->

        <div class="group row">

        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Classement of team">Classement Groupe A</h2>
                </div>
            </div>
        </div>

        <table class="styled-table" >
            
            <thead>
                <h3>GROUPE A</h3>
                <tr>
                    <th></th>
                    <th>MJ</th>
                    <th>MG</th>
                    <th>MN</th>
                    <th>MP</th>
                    <th>BP</th>
                    <th>BC</th>
                    <th>+/-</th>
                    <th>Pt</th>
                </tr>
                
            </thead>
            
            <tbody>

                <?php
                
                    $ligneCase= array('nomEquipe', 'mj', 'mg', 'mn', 'mp', 'bp', 'bc', 'diff', 'point');

                    for ($i=0; $i < 4 ; $i++) {

                        echo '<tr class=" group-row" onclick="currentRow('.$i.')" > ';

                            for ($j=0; $j < 9; $j++) {
                ?>            
                                <td> 
                                    <?php
                                        if (isset($_SESSION['classement-Grpe-A'])) {
                                            
                                            echo $_SESSION['classement-Grpe-A'][$i][ $ligneCase[$j] ] ;
                                        
                                        } else if($ligneCase[$j] == 'nomEquipe') {

                                            echo ($i+1) .'TDS';

                                        }else {
                                            echo 0;
                                        }
                                    ?> 
                                </td>
                    
                <?php
                            }
                        echo '</tr>';
                    }
                ?>
                
            </tbody>
            
        </table>

            
            <!-------------------------------------------->
            <!-------------------------------------------->
            <!----------- CLASSEMENT GROUPE B ----------->
            <!-------------------------------------------->
            <!-------------------------------------------->

            
        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Classement of team">Classement Groupe B</h2>
                </div>
            </div>
        </div>


        <table class="styled-table" >
            
            <thead>
                <h3>GROUPE B</h3>
                <tr>
                    <th></th>
                    <th>MJ</th>
                    <th>MG</th>
                    <th>MN</th>
                    <th>MP</th>
                    <th>BP</th>
                    <th>BC</th>
                    <th>+/-</th>
                    <th>Pt</th>
                </tr>
                
            </thead>
            
            <tbody>

                <?php
                
                    $ligneCase= array('nomEquipe', 'mj', 'mg', 'mn', 'mp', 'bp', 'bc', 'diff', 'point');

                    for ($i=0; $i < 4 ; $i++) {
                        echo '<tr>';

                            for ($j=0; $j < 9; $j++) {
                ?>            
                                <td> 
                                    <?php
                                        if (isset($_SESSION['classement-Grpe-B'])) {
                                            
                                            echo $_SESSION['classement-Grpe-B'][$i][ $ligneCase[$j] ] ;
                                        
                                        } else if($ligneCase[$j] == 'nomEquipe') {

                                            echo ($i+1) .'TDS';

                                        }else {
                                            echo 0;
                                        }
                                    ?> 
                                </td>
                    
                <?php
                            }
                        echo '</tr>';
                    }
                ?>
                
            </tbody>
            
        </table>

        </div>

        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- demi final  ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->

        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Demi final"></h2>                    
                </div>
            </div>
        </div>

        <table class="styled-table" >
            
            <thead>
                <tr>
                    <th>Demi-final</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                    <!-- match demi final -->
                
                <tr>
                    <form action='functions/stats.php' method='post'> <!-- formulaire d'envoi donnees -->
                
                    <!-- colonne affiche EqX VS EqY -->
                    <td>Match 13</td>
                    <td id="match-13" >

                        <?php
                            $nomSession ='match-demiFinal-13';
                            if (isset($_SESSION[$nomSession])) {
                                echo '<span>'.$_SESSION[ $nomSession ]['equipe1']. '</span> VS <span>'. $_SESSION[ $nomSession ]['equipe2'] .'</span>' 
                            ?>
                                <input type="hidden" id='m13eq1' name='m13eq1' value=<?php echo $_SESSION[ $nomSession ]['equipe1'] ?>  >
                                <input type="hidden" id='m13eq2' name='m13eq2' value=<?php echo $_SESSION[ $nomSession ]['equipe2'] ?>  >
                            
                        <?php
                            }else {
                                echo '1eA VS 2e B';
                            }
                            
                        ?>

                    </td>

                    <td id="score"> 

                        <?php
                            $nomSession = 'score-demiFinal-13'; //recuperer le nom session dynamiquement 

                            if ( isset($_SESSION[$nomSession]['score1'] ) && isset( $_SESSION[$nomSession]['score2'] )) {
                                
                        ?>
                            <input type="number" disabled id='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score1'] ?>  >
                            -
                            <input type="number" disabled id='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score2'] ?>  >
                                
                        <?php
                            }else{
                        ?>
                            <!-- CHANGER SCORE A CHAQUE REDIRECTION -->
                            
                            <select name='score1'>
                                <?php liste_option_but(); ?>
                            </select>                        
                            - 
                            <select name='score2'>
                                <?php liste_option_but(); ?>
                            </select>                        
                        
                            <?php
                            }
                        ?>

                    </td>

                    <td id="jouer">
                        <input type="hidden" id='numMatch' name='numMatch' value="13" >
                        <button >Jouer</button>
                    </td>

                    </form>

                </tr>
                
                <tr>
                    <form action='functions/stats.php' method='post'> <!-- formulaire d'envoi donnees -->
                
                    <!-- colonne affiche EqX VS EqY -->
                    <td>Match 14</td>
                    <td id="match-14" >

                        <?php
                            $nomSession ='match-demiFinal-14';
                            if (isset($_SESSION[$nomSession])) {
                                echo '<span>'.$_SESSION[ $nomSession ]['equipe1']. '</span> VS <span>'. $_SESSION[ $nomSession ]['equipe2'] .'</span>' 
                            ?>
                                <input type="hidden" id='m14eq1' name='m14eq1' value=<?php echo $_SESSION[ $nomSession ]['equipe1'] ?>  >
                                <input type="hidden" id='m14eq2' name='m14eq2' value=<?php echo $_SESSION[ $nomSession ]['equipe2'] ?>  >
                            
                        <?php
                            }else {
                                echo '1eA VS 2e B';
                            }
                            
                        ?>

                    </td>

                    <td id="score"> 

                        <?php
                            $nomSession = 'score-demiFinal-14'; //recuperer le nom session dynamiquement 

                            if ( isset($_SESSION[$nomSession]['score1'] ) && isset( $_SESSION[$nomSession]['score2'] )) {
                                
                        ?>
                            <input type="number" disabled id='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score1'] ?>  >
                            -
                            <input type="number" disabled id='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score2'] ?>  >
                                
                        <?php
                            }else{
                        ?>
                            <!-- CHANGER SCORE A CHAQUE REDIRECTION -->
                            
                            <select name='score1'>
                                <?php liste_option_but(); ?>
                            </select>                        
                            - 
                            <select name='score2'>
                                <?php liste_option_but(); ?>
                            </select>                        
                        
                            <?php
                            }
                        ?>

                    </td>

                    <td id="jouer">
                        <input type="hidden" id='numMatch' name='numMatch' value="14" >
                        <button >Jouer</button>
                    </td>

                    </form>

                </tr>
                
            </tbody>

        </table>

    
        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- 3eme place ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->
    
        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="3eme Place"></h2>                    
                </div>
            </div>
        </div>
            
        <table class="styled-table" >
            
            <thead>
                <tr>
                    <th>Troisieme-place</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                                
                <tr>
                    <form action='functions/stats.php' method='post'> <!-- formulaire d'envoi donnees -->
                    
                        <!-- colonne affiche EqX VS EqY -->
                        <td>Match 15</td>
                        <td id="match-15" >
                            <?php
                                $nomSession1 = 'match-petiteFinal-13';
                                $nomSession2 = 'match-petiteFinal-14';
                                if (isset( $_SESSION[$nomSession1]['nomEquipe'], $_SESSION[$nomSession2]['nomEquipe'] )) {
                                    echo '<span>'.$_SESSION[$nomSession1]['nomEquipe']. '</span> VS <span>'. $_SESSION[$nomSession2]['nomEquipe'] .'</span>' 
                            ?>
                                <input type="hidden" id='m15eq1' name='m15eq1' value=<?php echo $_SESSION[$nomSession1]['nomEquipe'] ?>  >
                                <input type="hidden" id='m15eq2' name='m15eq2' value=<?php echo $_SESSION[$nomSession2]['nomEquipe'] ?>  >
                                
                            <?php
                                }else {
                                    echo 'P13 VS P14';
                                }
                                
                            ?>

                        </td>

                        <td id="score"> 

                            <?php
                                $nomSession = 'score-petiteFinale-15'; //recuperer le nom session dynamiquement 

                                if ( isset($_SESSION[$nomSession]['score1'] ) && isset($_SESSION[$nomSession]['score2'] )) {
                                    
                            ?>
                                <input type="number" disabled id='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score1'] ?>  >
                                -
                                <input type="number" disabled id='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score2'] ?>  >
                                    
                            <?php
                                }else{
                            ?>
                                <!-- CHANGER SCORE A CHAQUE REDIRECTION -->
                                
                                <select name='score1'>
                                    <?php liste_option_but(); ?>
                                </select>                        
                                - 
                                <select name='score2'>
                                    <?php liste_option_but(); ?>
                                </select>                        
                            
                                <?php
                                }
                            ?>

                        </td>

                        <td id="jouer">
                            <input type="hidden" id='numMatch' name='numMatch' value="15" >
                            <button class="btn-add btn-score" >Jouer</button>
                        </td>
                        
                    </form>

                </tr>

            </tbody>

        </table>

        
            <!-------------------------------------------->
            <!-------------------------------------------->
            <!----------- Grande finale ----------->
            <!-------------------------------------------->
            <!-------------------------------------------->


        <div class="container-about">
            <div class="about-title">
                <div class="section-title">
                    <h2 data-title="Final">Grande final</h2>                    
                </div>
            </div>
        </div>
            
        <table class="styled-table" >
            
            <thead>
                <tr>
                    <th>Grande finale</th>
                    <th>Affiche</th>
                    <th>Score</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            <tr>
                <form action='functions/stats.php' method='post'> <!-- formulaire d'envoi donnees -->
                
                    <!-- colonne affiche EqX VS EqY -->
                    <td>Match 16</td>

                    <td id="match-16" >
                        <?php
                            $nomSession1 = 'match-grandeFinal-13';
                            $nomSession2 = 'match-grandeFinal-14';
                            if (isset( $_SESSION[$nomSession1]['nomEquipe'], $_SESSION[$nomSession2]['nomEquipe'] )) {
                                echo '<span>'.$_SESSION[$nomSession1]['nomEquipe']. '</span> VS <span>'. $_SESSION[$nomSession2]['nomEquipe'] .'</span>' 
                        ?>
                            <input type="hidden" id='m16eq1' name='m16eq1' value=<?php echo $_SESSION[$nomSession1]['nomEquipe'] ?>  >
                            <input type="hidden" id='m16eq2' name='m16eq2' value=<?php echo $_SESSION[$nomSession2]['nomEquipe'] ?>  >
                            
                        <?php
                            }else {
                                echo 'V13 VS V14';
                            }
                            
                        ?>

                    </td>

                    <td id="score"> 

                        <?php
                            $nomSession = 'score-grandeFinale-16'; //recuperer le nom session dynamiquement 

                            if ( isset($_SESSION[$nomSession]['score1'] ) && isset($_SESSION[$nomSession]['score2'] )) {
                                
                        ?>
                            <input type="number" disabled id='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score1'] ?>  >
                            -
                            <input type="number" disabled id='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score2'] ?>  >
                                
                        <?php
                            }else{
                        ?>
                            <!-- CHANGER SCORE A CHAQUE REDIRECTION -->
                            
                            <select name='score1'>
                                <?php liste_option_but(); ?>
                            </select>                        
                            - 
                            <select name='score2'>
                                <?php liste_option_but(); ?>
                            </select>                        
                        
                            <?php
                            }
                        ?>

                    </td>

                    <td id="jouer">
                        <input type="hidden" id='numMatch' name='numMatch' value="16" >
                        <button class="btn-add btn-score" >Jouer</button>
                    </td>
                    
                </form>
            </tr>
                
            </tbody>

        </table>
   
   </div>

    <script src="js/app.js"></script>
    <script src="js/focusRow.js"></script>
</body>
  <?php require 'footer.php';?> 
</html>
