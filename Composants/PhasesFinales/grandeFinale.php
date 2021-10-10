
<div class="container-about">
    <div class="about-title">
    <div class="section-title">
                <h2 data-title="Phase d'élimination directe">Grande finale</h2>                            
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
                <!-- formulaire d'envoi donnees -->
        <form action='functions/stats.php' method='post' id="match-16" > 
        
            <!-- colonne affiche EqX VS EqY -->
            <td>Match 16</td>

            <td >
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

            <td class="score"> 

                <?php
                    $nomSession = 'score-grandeFinale-16'; //recuperer le nom session dynamiquement 

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
                <input type="hidden" class='numMatch' name='numMatch' value="16" >
                <button class="btn-add btn-score" >Jouer</button>
            </td>
            
        </form>
    </tr>
        
    </tbody>

</table>
