
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <h1>Championnat de Foot</h1> <br>
    

    <!----------- LISTE DES GROUPES ----------->
    
    <h2 style="text-align: center">Liste d'equipe</h2>
    <table >
        
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
                <td>Brésil</td>
                <td>France</td>
                <td>Espagne</td>
                <td>Portugal</td>
            </tr>
            <tr>
                <td>Argentine</td>
                <td>Italie</td>
                <td>Allemagne</td>
                <td>Haïti</td>
            </tr>
        </tbody>

    </table>


        <!--------------- code PhP --------------->
        
    <?php
            // echo "hello";
        $equipes = array("Bresil","Argentine","France","Italie","Espagne","Allemagne","Portugal","Haïti");

        $groupeA = [];
        $groupeB = [];

        $valeurRandom;

        for ($i=0; $i < 8; $i+=2) { 

            $valeurRandom = rand($i,$i+1); #cacluler aléatoirement
            
            //si on ne précise pas de valeur in [] php les remplacent
            $groupeA[]=$equipes[$valeurRandom];

            if($i == $valeurRandom){
                $groupeB[]=$equipes[$valeurRandom+1];
            }
            else{
                $groupeB[]=$equipes[$valeurRandom-1];
            }
            
        }

  
        // foreach ($groupeA as $a){
        //     echo '<br>Groupe A: '.$a.'<br>';
        // }

        // foreach ($groupeB as $b){
        //     echo '<br>Groupe B: '.$b.'<br>';
        // }

    ?>

<!--------------- fin code PhP --------------->


    <!----------- LISTE DES GROUPES ----------->

    <h2 style="text-align: center">Classements</h2>
    <table >
        
        <thead>
            <tr>
                <th></th>
                <th>GROUPE A</th>
                <th>GROUPE B</th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <td>1e TDS</td>
                <td><?php echo $groupeA[0] ?> </td>
                <td><?php echo $groupeB[0] ?> </td>
            </tr>
            
            <tr>
                <td>2e TDS</td>
                <td><?php echo $groupeA[1] ?> </td>
                <td><?php echo $groupeB[1] ?> </td>
            </tr>
            
            <tr>
                <td>3e TDS</td>
                <td><?php echo $groupeA[2] ?> </td>
                <td><?php echo $groupeB[2] ?> </td>
            </tr>
            
            <tr>
                <td>4e TDS</td>
                <td><?php echo $groupeA[3] ?> </td>
                <td><?php echo $groupeB[3] ?> </td>

            </tr>
            
        </tbody>

    </table>

    <!-------------------------------------------->
    <!-------------------------------------------->
    <!----------- affiche groupe A ----------->
    <!-------------------------------------------->
    <!-------------------------------------------->

    <h2 style="text-align: center">Groupe A</h2>
    <table >
        
        <thead>
            <tr>
                <th>GROUPE A</th>
                <th>Affiche</th>
                <th>Score</th>
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
            </tr>

            <tr>
                <td>Match 3</td>
                <td><?php echo $groupeA[0]. ' VS '. $groupeA[2] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 4</td>
                <td><?php echo $groupeA[1]. ' VS '. $groupeA[3] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 5</td>
                <td><?php echo $groupeA[0]. ' VS '. $groupeA[3] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 6</td>
                <td><?php echo $groupeA[1]. ' VS '. $groupeA[2] ?> </td>
                <td>0 - 0</td>
            </tr>
            
        </tbody>

    </table>

    <!-------------------------------------------->
    <!-------------------------------------------->
    <!----------- affiche groupe B ----------->
    <!-------------------------------------------->
    <!-------------------------------------------->

    <h2 style="text-align: center">Groupe B</h2>
    <table >
        
        <thead>
            <tr>
                <th>GROUPE B</th>
                <th>Affiche</th>
                <th>Score</th>
            </tr>

        </thead>

        <tbody>
            <tr>
                <td>Match 1</td>
                <td><?php echo $groupeB[0]. ' VS '. $groupeB[1] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 2</td>
                <td><?php echo $groupeB[2]. ' VS '. $groupeB[3] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 3</td>
                <td><?php echo $groupeB[0]. ' VS '. $groupeB[2] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 4</td>
                <td><?php echo $groupeB[1]. ' VS '. $groupeB[3] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 5</td>
                <td><?php echo $groupeB[0]. ' VS '. $groupeB[3] ?> </td>
                <td>0 - 0</td>
            </tr>

            <tr>
                <td>Match 6</td>
                <td><?php echo $groupeB[1]. ' VS '. $groupeB[2] ?> </td>
                <td>0 - 0</td>
            </tr>
            
        </tbody>

    </table>

    <!-------------------------------------------->
    <!-------------------------------------------->
    <!----------- CLASSEMENT GROUPE A ----------->
    <!-------------------------------------------->
    <!-------------------------------------------->

    <h2 style="text-align: center">Classement Groupe A</h2>
    <table >
        
        <thead>
            <h3>GROUPE A</h3>
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

        <tbody>
            <tr>
                <td>1er Groupe</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>2e Groupe</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>3e Groupe</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>4e Groupe</td>
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
    
    <h2 style="text-align: center">Classement Groupe B</h2>
    <table >
        
        <thead>
            <h3>GROUPE B</h3>
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
        
        <tbody>
            <tr>
                <td>1er Groupe</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>2e Groupe</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>3e Groupe</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>4e Groupe</td>
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
        <!----------- demi final  ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->
    
        <h2 style="text-align: center">Demi final</h2>
    <table >
        
        <thead>
            <tr>
                <th>Demi-final</th>
                <th>Affiche</th>
                <th>Score</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Math 13</td>
                <td>1eA VS 2eB</td> 
                <td>0 - 0</td>               
            </tr>
            
            <tr>
                <td>Math 13</td>
                <td>1eB VS 2eA</td>  
                <td>0 - 0</td>              
            </tr>
            
        </tbody>

    </table>

    
        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- 3eme place ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->
    
        <h2 style="text-align: center">3eme Place</h2>
    <table >
        
        <thead>
            <tr>
                <th>Troisieme-place</th>
                <th>Affiche</th>
                <th>Score</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Math 14</td>
                <td>P13 VS P14</td>               
                <td>0 - 0</td>
            </tr>
            
        </tbody>

    </table>

    
        <!-------------------------------------------->
        <!-------------------------------------------->
        <!----------- Grande finale ----------->
        <!-------------------------------------------->
        <!-------------------------------------------->
    
        <h2 style="text-align: center">Grande finale</h2>
    <table >
        
        <thead>
            <tr>
                <th>Grande finale</th>
                <th>Affiche</th>
                <th>Score</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Math 16</td>
                <td>V13 VS V14</td>
                <td>0 - 0</td>           
            </tr>
            
        </tbody>

    </table>
    
    
</body>
</html>