

<div class="container-about" style='margin:35px;'>
    <div class="about-title">
            <div class="section-title">
                <h2 data-title="Phase d'élimination directe">Demi final</h2>                            
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
                    <!-- formulaire d'envoi donnees -->
            <form action='functions/stats.php' method='post' id="match-13" > 
        
            <!-- colonne affiche EqX VS EqY -->
            <td>Match 13</td>
            <td>

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

            <td class="score"> 

                <?php
                    $nomSession = 'score-demiFinal-13'; //recuperer le nom session dynamiquement 

                    if ( isset($_SESSION[$nomSession]['score1'] ) && isset( $_SESSION[$nomSession]['score2'] )) {
                        
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
                <input type="hidden" class='numMatch' name='numMatch' value="13" >
                <button class="btn-add btn-score" >Jouer</button>
            </td>

            </form>

        </tr>
        
        <tr>
                    <!-- formulaire d'envoi donnees -->
            <form action='functions/stats.php' method='post' id="match-14" > 
        
            <!-- colonne affiche EqX VS EqY -->
            <td>Match 14</td>
            <td >

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

            <td class="score"> 

                <?php
                    $nomSession = 'score-demiFinal-14'; //recuperer le nom session dynamiquement 

                    if ( isset($_SESSION[$nomSession]['score1'] ) && isset( $_SESSION[$nomSession]['score2'] )) {
                        
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
                <input type="hidden" class='numMatch' name='numMatch' value="14" >
                <button class="btn-add btn-score" >Jouer</button>
            </td>

            </form>

        </tr>
        
    </tbody>

</table>
