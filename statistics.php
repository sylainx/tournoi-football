<?php
    require_once('functions/infoTeam.php');
    
  $stats = detailDeTousLesMatchs();
  

?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "css/style.css"/>
    <link rel="stylesheet" href= "css/card-infos.css"/>
    <title>Stat|team</title>
</head>
<body>

    <?php require 'header.php';?> 
    
     <!--stat section start--> 
     <section class="locations-section sec-padding" id="Locations">
          <div class="container-cards">

          <!--  -->
          <div class="">
                  <div class="section-title" style="text-align:center;">
                      <h2 data-title="Stats Team">Some Statistics</h2>
                  </div>
              </div>
            <!--  -->

          <div class="container-statistic">

          <section class="content-infos-competions">

                <div class="card-infos-competition" id='box1'>
                    <div class="container-box bx">
                        <h4><b>Qte Match</b></h4>
                        <p>
                          
                          <?php 
                            if( count($stats) > 0 ) { 
                              echo $stats['qteMatchJouees'];
                            } else echo 0; 
                          ?>
                          
                      </p>
                    </div>
                </div> 

                <div class="card-infos-competition" id='box2'>
                    <div class="container-box">
                        <h4><b>Total buts</b></h4>
                        <p>
                          <?php 
                            if( count($stats) > 0 ) { 
                              echo $stats['sommeTousScores'];
                            } else echo 0; 
                          ?>
                          
                        </p>
                    </div>
                </div> 
                <div class="card-infos-competition" id='box3'>
                    <div class="container-box">
                        <h4><b>Ratio/match</b></h4>
                        <p> 
                        <?php 
                          if( count($stats) > 0 ) { 
                            echo number_format($stats['ratioButsParMatch'],2,'.','.');
                          } else echo 0; 
                        ?>
                        
                        </p>
                           
                    </div>
                </div> 
                <div class="card-infos-competition" id='box4'>
                    <div class="container-box">
                        <h4><b>Victory</b></h4>
                        <p>
                        <?php 
                          if( count($stats) > 0 ) { 
                            echo number_format($stats['pourcentageVictoire'],2,'.','.');
                          } else echo 0; 
                        ?>                        
                          <span>%</span>
                        </p>
                    </div>
                </div> 
        </section>

          </div>
            
              <div class="card-items">
                <div class="cards">
                  <div class="card card1">
                    <div class="container-img">
                      <img src="Icons/france.png" style ="width:60%;" alt="France">
                    </div>
                    <div class="details row">
                      <h3>France</h3>
                      <button onclick="togglePopup('popup-1')" class="first-button show-btn">more</button>
                        
                    </div>
                  </div>
                  <div class="card card2">
                    <div class="container-img">
                      <img src="Icons/italia.png" style ="width:45%; " alt="italia">
                    </div>
                    <div class="details row">
                      <h3>Italy</h3>
                      <button onclick="togglePopup('popup-2')" class="first-button show-btn">more</button>

                    </div>
                  </div>
                  <div class="card card3">
                    <div class="container-img">
                      <img src="Icons/spain.svg" style ="width:55%; " alt="spain">
                    </div>
                    <div class="details row">
                      <h3>Espagne</h3>
                      <button onclick="togglePopup('popup-3')" class="first-button show-btn">more</button>

                    </div>
                  </div>
                  <div class="card card4">
                    <div class="container-img">
                      <img src="Icons/brazil.png" style ="width:55%; " alt="brazil">
                    </div>
                    <div class="details row">
                      <h3><b>Brazil</b></h3>
                      <button onclick="togglePopup('popup-4')" class="first-button show-btn">more</button>

                    </div>
                  </div>
                  <div class="card card5">
                    <div class="container-img">
                      <img src="Icons/portugal.svg" style ="width:55%;" alt="Portugal">
                    </div>
                    <div class="details row">
                      <h3><b>Portugal</b></h3>
                      <button onclick="togglePopup('popup-5')" class="first-button show-btn">more</button>

                    </div>
                  </div>
                  <div class="card card6">
                    <div class="container-img">
                      <img src="Icons/haiti.png" style ="width:70%;" alt="haiti">
                    </div>
                    <div class="details row">
                      <h3><b>Haiti</b></h3>
                      <button onclick="togglePopup('popup-6')" class="first-button show-btn">more</button>

                    </div>
                  </div>
                  <div class="card card7">
                    <div class="container-img">
                      <img src="Icons/argentina.svg" style ="width:50%; " alt="Argentina">
                    </div>
                    <div class="details row">
                      <h3><b>Argentina</b></h3>
                      <button onclick="togglePopup('popup-7')" class="first-button show-btn">more</button>

                    </div>
                  </div>
                  <div class="card card8">
                    <div class="container-img">
                      <img src="Icons/germany.png" style ="width:55%; " alt="Germany">
                    </div>
                    <div class="details row">
                      <h3><b>Allemagne</b></h3>
                      <button onclick="togglePopup('popup-8')" class="first-button show-btn">more</button>

                    </div>
                  </div>

                </div><!--contient l'ensemble des card-->
              </div>

          </div>
          <?php require 'stat-card.php';?>
        </section>
        <!--Stat section end--> 
        <script src="js/test.js"></script>
</body>
<?php require 'footer.php';?> 
</html>