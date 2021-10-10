
<div class="container-about">
    <div class="about-title">
    <div class="section-title">
                <h2 data-title="Phase d'élimination directe">3eme place</h2>                            
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
                    <!-- formulaire d'envoi donnees -->
            <form action='functions/stats.php' method='post' id="match-15" > 
            
                <!-- colonne affiche EqX VS EqY -->
                <td>Match 15</td>
                <td >
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

                <td class="score"> 

                    <?php
                        $nomSession = 'score-petiteFinale-15'; //recuperer le nom session dynamiquement 

                        if ( isset($_SESSION[$nomSession]['score1'] ) && isset($_SESSION[$nomSession]['score2'] )) {
                            
                    ?>
                        <input type="number" disabled class='score1' name='score1' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score1'] ?>  >
                        -
                        <input type="number" disabled class='score2' name='score2' style="width: 2.425rem" value=<?php echo $_SESSION[$nomSession]['score2'] ?>  >
                            
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

                <td class="jouer">
                    <input type="hidden" class='numMatch' name='numMatch' value="15" >
                    <button class="btn-add btn-score" >Jouer</button>
                </td>
                
            </form>

        </tr>

    </tbody>

</table>
