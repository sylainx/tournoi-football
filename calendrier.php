<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href= "style.css"/>
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
                
                <table class="styled-table">
                    
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


                    <!--------------- code PhP --------------->
                    
                <?php
                        // liste d'equipes
                    $equipes = array("Bresil","Argentine","France","Italie","Espagne","Allemagne","Portugal","Haïti");

                    $groupeA = [];
                    $groupeB = [];

                    $choixEquipeAleatoire;

                    for ($i=0; $i < 8; $i+=2) { 

                        $choixEquipeAleatoire = rand($i,$i+1); #cacluler aléatoirement
                        
                        //si on ne précise pas de valeur in [] php les remplacent
                        $groupeA[]=$equipes[$choixEquipeAleatoire];

                        if($i == $choixEquipeAleatoire){
                            $groupeB[]=$equipes[$choixEquipeAleatoire+1];
                        }
                        else{
                            $groupeB[]=$equipes[$choixEquipeAleatoire-1];
                        }
                        
                    }

            

                    // class Match{
                        
                    // }


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

                <table class="styled-table">>
                    
                    <thead>
                        <tr>
                            <th></th>
                            <th>GROUPE A</th>
                            <th>GROUPE B</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php //ouverture de la boucle pour parcourir tableau
                            for($i=0; $i < 4; $i++){
                        ?> <!-- fermer code php -->

                        <tr>
                            <td><?php echo ($i+1) ?>e TDS</td>
                            <td><?php echo $groupeA[$i] ?> </td>
                            <td><?php echo $groupeB[$i] ?> </td>
                        </tr>

                        <?php // pour fermer parenthese tableau
                            }
                        ?>
                    </tbody>

                </table>
            
                <!-------------------------------------------->
                <!-------------------------------------------->
                <!----------- affiche groupe A ----------->
                <!-------------------------------------------->
                <!-------------------------------------------->

                <div class="container-about">
                        <div class="about-title">
                                <div class="section-title">
                                    <h2 data-title="Calendar of team">Groupe A</h2>
                                    
                                </div>
                        </div>
                </div>
                <table class="styled-table">>
                    
                    <thead>
                        <tr>
                            <th>GROUPE A</th>
                            <th>Affiche</th>
                            <th>Score</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>Match 1</td>
                            <td><?php echo $groupeA[0]. ' VS '. $groupeA[1] ?> </td>
                            <td>0 - 0</td>
                            
                        </tr>

                        <tr>
                            <td>Match 2</td>
                            <td><?php echo $groupeA[2]. ' VS '. $groupeA[3] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 3</td>
                            <td><?php echo $groupeA[0]. ' VS '. $groupeA[2] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 4</td>
                            <td><?php echo $groupeA[1]. ' VS '. $groupeA[3] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 5</td>
                            <td><?php echo $groupeA[0]. ' VS '. $groupeA[3] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 6</td>
                            <td><?php echo $groupeA[1]. ' VS '. $groupeA[2] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>
                        
                    </tbody>

                </table>

                <!-------------------------------------------->
                <!-------------------------------------------->
                <!----------- affiche groupe B ----------->
                <!-------------------------------------------->
                <!-------------------------------------------->

                <div class="container-about">
                        <div class="about-title">
                                <div class="section-title">
                                    <h2 data-title="Calendar of team">Groupe B</h2>
                                    
                                </div>
                        </div>
                </div>
                <table class="styled-table">
                    
                    <thead>
                        <tr>
                            <th>GROUPE B</th>
                            <th>Affiche</th>
                            <th>Score</th>
                            <th></th>
                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td>Match 1</td>
                            <td><?php echo $groupeB[0]. ' VS '. $groupeB[1] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 2</td>
                            <td><?php echo $groupeB[2]. ' VS '. $groupeB[3] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 3</td>
                            <td><?php echo $groupeB[0]. ' VS '. $groupeB[2] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 4</td>
                            <td><?php echo $groupeB[1]. ' VS '. $groupeB[3] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 5</td>
                            <td><?php echo $groupeB[0]. ' VS '. $groupeB[3] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>

                        <tr>
                            <td>Match 6</td>
                            <td><?php echo $groupeB[1]. ' VS '. $groupeB[2] ?> </td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
                        </tr>
                        
                    </tbody>

                </table>

                <!-------------------------------------------->
                <!-------------------------------------------->
                <!----------- CLASSEMENT GROUPE A ----------->
                <!-------------------------------------------->
                <!-------------------------------------------->
            <div class="group row">
                
                <table class="styled-table" >
                    <thead>
                        <h3>GROUPE A</h3>
                        <tr>
                            <th></th>
                            <th>Team</th>
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
                    
                        <tr class=" group-row active" onclick="currentRow(0)" >
                            <td>1er</td>
                            <td><img src="Icons/brazil.png" alt="team 1" style="width: 50px;"></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                
                        <tr class=" group-row " onclick="currentRow(1)">
                            <td>2e </td>
                            <td><img src="Icons/France.png " style="width:40px;" alt="team 2"></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class=" group-row " onclick="currentRow(2)">
                            <td>3e </td>
                            <td><img src="Icons/spain.svg" alt="team 3" style="width: 35px;" ></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class=" group-row " onclick="currentRow(3)">
                            <td>4e </td>
                            <td><img src="Icons/portugal.svg" alt="team 4" style="width: 35px;"></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                    </tbody>

                </table>


                <!-------------------------------------------->
                <!-------------------------------------------->
                <!----------- CLASSEMENT GROUPE B ----------->
                <!-------------------------------------------->
                <!-------------------------------------------->
                
                
                <table class="styled-table" >
                    
                    <thead>
                    <h3>GROUPE B</h3>
                    <tr>
                            <th></th>
                            <th>Team</th>
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
                    <tr class=" group-row active" onclick="currentRow(4)" >
                            <td>1er </td>
                            <td><img src="Icons/argentina.svg" alt="team 1" style="width: 40px;"></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class=" group-row " onclick="currentRow(5)">
                            <td>2e </td>
                            <td><img src="Icons/italia.png" alt="team 2" style="width: 35px;"></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class=" group-row " onclick="currentRow(6)">
                            <td>3e </td>
                            <td><img src="Icons/germany.png" alt="team 3" style="width: 40px;" ></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr class=" group-row " onclick="currentRow(7)">
                            <td>4e </td>
                            <td><img src="Icons/haiti.png" alt="team 4" style="width: 40px;" ></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        
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
                <table class="styled-table">
                    
                    <thead>
                        <tr>
                            <th>Demi-final</th>
                            <th>Affiche</th>
                            <th>Score</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Math 13</td>
                            <td>1eA VS 2eB</td> 
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>               
                        </tr>
                        
                        <tr>
                            <td>Math 13</td>
                            <td>1eB VS 2eA</td>  
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>              
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
                            <td>Math 14</td>
                            <td>P13 VS P14</td>               
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>
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
                <table class="styled-table">
                    
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
                            <td>Math 16</td>
                            <td>V13 VS V14</td>
                            <td>0 - 0</td>
                            <td> <button type="button" class="btn-add btn-score" name="">add</button></td>           
                        </tr>
                        
                    </tbody>

                </table>
    </div>
    <script src="js/app.js"></script>
    <script src="js/focusRow.js"></script>
</body>
  <?php require 'footer.php';?> 
</html>
