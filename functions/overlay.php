 
    <!--================================= Cart overlay--=================================-->
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
                        <form action="functions/stats.php" method="post">

                            <div class="container-matchInfo row">
                                <!--icon first team-->
                                <div class="icon-team1">
                                    <img src=<?php echo $groupeA[0]->getLogo() ?> style="width: 100px;" alt="">
                                </div>
                                <!--Match versus infos(score,etc...)-->
                                <div class="info-versus">
                                    <div class="score-info row">
                                        <span class="team-name1"> <?php echo $groupeA[0]->getNom() ?> </span>
                                            <span class="score-content row">
                                                <div class="score1">

                                                    <select name='score1'>
                                                        <?php liste_option_but(); ?>
                                                    </select>    
                                                </div>

                                                <div class="score2">
                                                    <select name='score2'>
                                                        <?php liste_option_but(); ?>
                                                    </select>   
                                                </div>
                                            </span>
                                        <span class="team-name2"><?php echo $groupeA[0]->getNom() ?></span>
                                    </div>

                                    <div class="meta-info row">
                                    <div> 
                                        <h5>Top Passer</h5>
                                        <p id="passer">CA: Mario Gauthier</p>
                                        </div>
                                    <div> 
                                        <h5>Submit score</h5>
                                        <label for="click">
                                            <button type="submit" class="btn-score" onclick="" >Valider</button>
                                        </label>
                                        
                                        </div>
                                    
                                    <div> 
                                        <h5>Top Scorer</h5>
                                        <p id="scorer">CA: Mario Gauthier</p>
                                        </div>
                                    </div>

                                </div>
                                <!--icon second team-->
                                <div class="icon-team2">
                                    <img src="Icons/brazil.png" style="width: 100px;" alt="">
                                </div>

                            </div>
                            
                            <?php
                                echo '<pre>';
                                print_r($_POST);
                                echo '</pre>';
                            ?>

                        </form>
                    <!--</div>-->

                    <!-- end score cart item--> 
                </div>
            </div>
        </div>
    <!---------------------------------end of cart overlay--------------------------------->
 