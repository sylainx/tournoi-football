<div class="container-group"> 

    <div class="container-about" style='margin-top:40px;'>
        <div class="about-title">
            <div class="section-title">
                <h2 data-title="Calendar of team">Groupe B</h2>
            </div>
        </div>
    </div>



	<!-- ====================== DIV SOUS FORME DE TABLEAU =================== -->

	<div class="styled-table table">
		<div class="thead">
			<div class="tr">
				<div class="td">Groupe B</div>
				<div class="td">Affiche</div>
				<div class="td">Score</div>
				<div class="td"> </div>
				
			</div>
		</div>

		<div class="tbody">
						<!-- match 1 -->
				
			<?php
				
				for ($i=7; $i < 13; $i++) { 
					// ouvrir boucle   ATTENTION, boucle commence a 1                    
			?>
				
					<form class="tr"action='functions/stats.php' method='post' id=<?php echo "match-".$i; ?> >
							
								<!-- Match X -->
						<div class="td"> Match <?php echo $i; ?> 
						
						</div>


								<!-- EaX vs EaY -->
						<div class="td">
											
								<?php
									switch ($i) {

										case 7:
											if (isset($groupeB)) {
												echo '<span> <img src='.$groupeB[0]->getLogo(). ' alt="" style="width: 40px;" /> </span> VS <span> <img src='. $groupeB[1]->getLogo() .' alt="" style="width: 40px;" > </span>'; 
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
												echo '<span> <img src='.$groupeB[2]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeB[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
												echo '<span> <img src='.$groupeB[0]->getLogo().' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeB[2]->getLogo() .' alt="" style="width: 40px;" > </span>'; 
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
												echo '<span> <img src='.$groupeB[1]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeB[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
												echo '<span> <img src='.$groupeB[0]->getLogo(). ' alt="" style="width: 40px;" > </span id="span"> VS <span> <img src='. $groupeB[3]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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
												echo '<span> <img src='.$groupeB[1]->getLogo(). ' alt="" style="width: 40px;" > </span> VS <span> <img src='. $groupeB[2]->getLogo() .' alt="" style="width: 40px;" > </span>' 
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

						</div>

								<!-- score -->
						<div class="td score">
							
							<?php
									$nomSession = 'match-'.$i.'-Grpe-B'; //recuperer le nom session dynamiquement 

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
	




</div>
        