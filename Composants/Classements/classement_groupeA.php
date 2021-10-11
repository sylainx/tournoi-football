 
            <div class="container-about">
                <div class="about-title">
                    <div class="section-title">
                        <h2 data-title="Classement of team">Classement Groupe A</h2>
                    </div>
                </div>
            </div>

            <table class="styled-table" >
                
                <thead>
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
                
                    <!----------------- corps de la Table ----------------->
                <tbody>

                    <?php
                            /*============= Variable pour le nom de chaque colonne =============*/
                        $ligneCase= array('nomEquipe', 'mj', 'mg', 'mn', 'mp', 'bp', 'bc', 'diff', 'point');

                        /*
                            * Boucle for qui va afficher à chaque tour, une équipe dans le groupe, en total 4
                            * C'est-à-sire, équipes 1 a 4
                            * A chaque tour, on affiche 9 colonnes à travers une autre boucle imbriquée
                            * colonnes: nomEquipe, mj, mg, etc...
                        */
                        
                        for ($i=0; $i < 4 ; $i++) {
                                
                                // debut d'une ligne TR
                            echo '<tr class=" group-row" onclick="currentRow('.$i.')" > ';
                                        
                                    // Boucle pour afficher les colonnes
                                    // Chaque tour correspond à une colonne différente(mj, mg,nomEq, etc.)

                                for ($j=0; $j < 9; $j++) {
                    ?>            
                                    <td> 

                                        <?php
                                                //  Le classement est afficher en fonction de la disponibilité de la SESSION

                                            if (isset($_SESSION['classement-Grpe-A'], $_COOKIE['tirageGroupeA'], $_COOKIE['tirageGroupeA'] ) ) {
                                                
                                                echo $_SESSION['classement-Grpe-A'][$i][ $ligneCase[$j] ] ;
                                            
                                            } else if( isset( $_COOKIE['tirageGroupeA'], $_COOKIE['tirageGroupeA'] ) AND $ligneCase[$j] == 'nomEquipe') {

                                                echo ($i+1) .'TDS';

                                            }else {
                                                echo 0;
                                            }
                                        ?> 
                                    </td>
                        
                    <?php
                                }

                                // Terminer la ligne TR 
                            echo '</tr>';

                        }
                    ?>
                    
                </tbody>
                
            </table>
