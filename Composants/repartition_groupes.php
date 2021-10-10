
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
                        if (isset($groupeA[$i], $groupeA[$i]) ) {
                            
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
