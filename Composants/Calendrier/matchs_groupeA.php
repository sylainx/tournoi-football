<div class="container-group">
    
    <div class="container-about" style='margin-top:40px;'>
        <div class="about-title">
            <div class="section-title">
                <h2 data-title="Calendar of team">Groupe A</h2>                    
            </div>
        </div>
    </div>



	<!-- ====================== DIV SOUS FORME DE TABLEAU =================== -->

	<div class="styled-table table">
		<div class="thead">
			<div class="tr">
				<div class="td">Groupe A</div>
				<div class="td">Affiche</div>
				<div class="td">Score</div>
				<div class="td"> </div>
				
			</div>
		</div>

		<div class="tbody">
						<!-- match 1 -->
				
			<?php
				
				for ($i=1; $i < 7; $i++) { 
					// ouvrir boucle   ATTENTION, boucle commence a 1                    
			?>
				
					<form class="tr" action='functions/stats.php' method='post' id=<?php echo "match-".$i; ?> >
							
								<!-- Match X -->
						<div class="td"> Match <?php echo $i; ?> 
						
						</div>


								<!-- EaX vs EaY -->
						<div class="td">
											
								<?php
									switch ($i) {

										case 1:
											if (isset($groupeA)) {
												echo '<span> <img src='.$groupeA[0]->getLogo(). ' alt="" style="width: 40px;" /> </span> VS <span> <img src='. $groupeA[1]->getLogo() .' alt="" style="width: 40px;" > </span>'; 
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
												echo '<span> <img src='.$groupeA[2]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
												echo '<span> <img src='.$groupeA[0]->getLogo().' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[2]->getLogo() .' alt="" style="width: 40px;" > </span>'; 
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
												echo '<span> <img src='.$groupeA[1]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
												echo '<span> <img src='.$groupeA[0]->getLogo(). ' alt="" style="width: 40px;" > </span id="span"> VS <span> <img src='. $groupeA[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
												echo '<span> <img src='.$groupeA[1]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[2]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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

						</div>

								<!-- score -->
						<div class="td score">
							
							<?php
									$nomSession = 'match-'.$i.'-Grpe-A'; //recuperer le nom session dynamiquement 

									if ( isset($_SESSION[$nomSession]['scores'][0]) && isset($_SESSION[$nomSession]['scores'][1])) {
										
							?>
									<input type="number" disabled class='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][0] ?>  >
									-
									<input type="number" disabled class='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][1] ?>  >
										
							<?php
								}else {

                            ?>
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

						</div> 
							
						<div class="td action jouer">
							<input 
								type="hidden"
								form= <?php echo 'match-'.$i; ?>
								class='numMatch' 
								name='numMatch' 
								value=<?php echo  $i; ?> 
							>
							<button class="btn-add btn-score" >Jouer</button>
							
						</div>
					</form>

			<?php
				}
			?>

		</div>
	</div> <!--=================== Fin affiche groupe --=================== -->
	






    <!-- <table class="styled-table" >

        <thead>
            <tr>
                <th>GROUPE A</th>
                <th>Affiche</th>
                <th id=''>Score</th>
                <th></th>
            </tr>

        </thead>

        <tbody>
            
            <!-- match 1 -->
            
            <!-- <?php
                
            //     for ($i=1; $i < 7; $i++) { 
            // ?>
            
            <tr>
                
                    <td>Match <?php /*echo $i; ?> </td> 
                     -->
                    <!-- colonne affiche EqX VS EqY -->

                    <td >
                                <!-- formulaire d'envoi donnees -->

                        <form action='dashboard.php' method='post' id=<?php echo "match-".$i; ?> > 
                
                            <?php
                                switch ($i) {

                                    case 1:
                                        if (isset($groupeA)) {
                                            echo '<span> <img src='.$groupeA[0]->getLogo(). ' alt="" style="width: 40px;" /> </span> VS <span> <img src='. $groupeA[1]->getLogo() .' alt="" style="width: 40px;" > </span>'; 
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
                                            echo '<span> <img src='.$groupeA[2]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
                                            echo '<span> <img src='.$groupeA[0]->getLogo().' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[2]->getLogo() .' alt="" style="width: 40px;" > </span>'; 
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
                                            echo '<span> <img src='.$groupeA[1]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
                                            echo '<span> <img src='.$groupeA[0]->getLogo(). ' alt="" style="width: 40px;" > </span id="span"> VS <span> <img src='. $groupeA[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
                                            echo '<span> <img src='.$groupeA[1]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeA[2]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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

                        </form>

                    </td>

                    <td class="score"> 

                        <?php
                            $nomSession = 'match-'.$i.'-Grpe-A'; //recuperer le nom session dynamiquement 

                            if ( isset($_SESSION[$nomSession]['scores'][0]) && isset($_SESSION[$nomSession]['scores'][1])) {
                                
                        ?>
                            <input type="number" disabled class='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][0] ?>  >
                            -
                            <input type="number" disabled class='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['scores'][1] ?>  >
                                
                        <?php
                            }
                        ?>
                
                    </td>
                    
                    <td class="jouer">
                        <input 
                            type="hidden"
                            form= <?php echo 'match-'.$i; ?>
                            class='numMatch' 
                            name='numMatch' 
                            value=<?php echo  $i; ?> >
                        <button class="btn-add btn-score" >Jouer</button>
                    </td>


            </tr>

            <?php
                } // fermer boucle for */
            ?>
        
        </tbody>
    </table> -->


</div>
