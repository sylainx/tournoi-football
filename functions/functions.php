<?php

    // redirectin
    // header('Location: index.php');    

    function Tirage()
    {

                // chaque equipe                    
        $eqBRA = new Equipe('Bresil','images/BRA.png');
        $eqARG = new Equipe('Argentine','images/ARG.png');
        $eqFRA = new Equipe('France','images/FRA.png');
        $eqITA = new Equipe('Italie','images/ITA.png');
        $eqESP = new Equipe('Espagne','images/ESP.png');
        $eqGER = new Equipe('Allemagne','images/GER.png');
        $eqPOR = new Equipe('Portugal','images/POR.png');
        $eqHTI = new Equipe('Haiti','images/HTI.png');

        // tableau contenant l'ensemble des équipes du championnat
        $equipes = array(
            $eqBRA,
            $eqARG,
            $eqFRA,
            $eqITA,
            $eqESP,
            $eqGER,
            $eqPOR,
            $eqHTI
        );


        $groupeA = [];
        $groupeB = [];

        $valeurRandom=null; #variable contenant le tirage aléatoire

        #   bloucle pour faire le tirage
        for ($i=0; $i < 8; $i+=2) { 

            $valeurRandom = rand($i,$i+1); # cacluler une valeur aléatoirement pour chaque tete de série
            
            //si on ne précise pas de valeur in [] php les remplacent
            $groupeA[]=$equipes[$valeurRandom];

            if($i == $valeurRandom){
                $groupeB[]=$equipes[$valeurRandom+1];
            }
            else{
                $groupeB[]=$equipes[$valeurRandom-1];
            }
            
        }

        // ------------- STCOKER LES INFORMATIONS EN SESSION            
        setcookie('tirageGroupeA', serialize($groupeA), $GLOBALS['expiration'], $GLOBALS['path'], false, true);
        setcookie('tirageGroupeB', serialize($groupeB), $GLOBALS['expiration'], $GLOBALS['path'], false, true);
        
        return array($groupeA, $groupeB);
    } 

    // exit();