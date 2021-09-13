<?php
    session_start();
   
    // redirectin
    header('Location: ../index.php');

   //importation des classes        
   require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Equipe.php';    
   require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ConnexionBD' . DIRECTORY_SEPARATOR . 'base.php';
   require_once('../functions/appelerBD.php');
   

    //variables pour définir les cookies
    $expiration = time() + 60 * 15;
    $path = '/';
    $tirageGroupeA = 'tirageGroupeA';
    $tirageGroupeB = 'tirageGroupeB';
   
    
    // <!--------------- tirage equipe --------------->
    if (isset($_POST['lancer-tirage'])) {            
        Tirage();    //appel de la fonction
    }
        

    function Tirage()
    {
        global $bdd;
        
                // chaque equipe                    
        $eqBRA = new Equipe('Bresil','images/bra.png');
        $eqARG = new Equipe('Argentine','images/arg.png');
        $eqFRA = new Equipe('France','images/fra.png');
        $eqITA = new Equipe('Italie','images/ita.png');
        $eqESP = new Equipe('Espagne','images/esp.png');
        $eqGER = new Equipe('Allemagne','images/ger.png');
        $eqPOR = new Equipe('Portugal','images/por.png');
        $eqHTI = new Equipe('Haiti','images/hti.png');

        // tableau contenant l'ensemble des équipes du championnat
        $equipes = array( $eqBRA, $eqARG, $eqFRA, $eqITA, $eqESP, $eqGER, $eqPOR, $eqHTI );

        $groupeA = [];
        $groupeB = [];

        $valeurRandom=null; #variable contenant le tirage aléatoire
        
        //bloucle pour faire le tirage
        for ($i=0; $i < 8; $i+=2) { 

            $valeurRandom = rand($i,$i+1); # cacluler une valeur aléatoirement pour chaque tete de série
            
            $groupeA[]=$equipes[$valeurRandom];
            
            if($i == $valeurRandom){

                $groupeB[]=$equipes[$valeurRandom+1];

            }
            else{
                $groupeB[]=$equipes[$valeurRandom-1];
               
            }
            
        }

        // ------------- STCOKER LES INFORMATIONS EN SESSION            
        setcookie($GLOBALS['tirageGroupeA'], serialize($groupeA), $GLOBALS['expiration'], $GLOBALS['path'], false, true);
        setcookie($GLOBALS['tirageGroupeB'], serialize($groupeB), $GLOBALS['expiration'], $GLOBALS['path'], false, true);

        
        
        // ==================================================================================================
        // ============================== ACCES A LA BASE DE DONNÉES ========================================
        // ==================================================================================================
        

        /*---------------------- RÉINITIOALISER LES TABLES DANS LA BD ----------------------*/ 
        delete_all_tables();
        /*---------------------- ----------------------*/ 

        
        // ------------ inserer données dans les tables classements
        
        foreach ($groupeA as $oneTeam) {

            $codeSql = "INSERT INTO classementgroupea(nomEquipe,groupe,logo,mj,mg,mn,mp,bp,bc,point,diff)
                VALUES( :nomEquipe, :groupe, :logo, :mj, :mg, :mn, :mp, :bp, :bc, :point, :diff)";

            $grpe = 'A';
            
            $requete = $bdd->prepare($codeSql);
        
            $requete->execute(array(
                ':nomEquipe' => $oneTeam->getNom(),
                ':groupe'=> $grpe,
                ':logo' => $oneTeam->getLogo(),
                ':mj'=> $oneTeam->getMj(),
                ':mg'=> $oneTeam->getMg(),
                ':mn'=> $oneTeam->getMn(),
                ':mp'=> $oneTeam->getMp(),
                ':bp'=> $oneTeam->getBut(),
                ':bc'=> $oneTeam->getBc(),
                ':point'=> $oneTeam->getPoint(),
                ':diff'=> $oneTeam->getDiff()
            ));
        }
        $requete->closeCursor(); 
        

        foreach ($groupeB as $oneTeam) {

            $codeSql = "INSERT INTO classementgroupeb(nomEquipe,groupe,logo,mj,mg,mn,mp,bp,bc,point,diff)
                VALUES( :nomEquipe, :groupe, :logo, :mj, :mg, :mn, :mp, :bp, :bc, :point, :diff)";

            $grpe = 'B';
            
            $requete = $bdd->prepare($codeSql);
        
            $requete->execute(array(
                ':nomEquipe' => $oneTeam->getNom(),
                ':groupe'=> $grpe,
                ':logo' => $oneTeam->getLogo(),
                ':mj'=> $oneTeam->getMj(),
                ':mg'=> $oneTeam->getMg(),
                ':mn'=> $oneTeam->getMn(),
                ':mp'=> $oneTeam->getMp(),
                ':bp'=> $oneTeam->getBut(),
                ':bc'=> $oneTeam->getBc(),
                ':point'=> $oneTeam->getPoint(),
                ':diff'=> $oneTeam->getDiff()
            ));
        }
        $requete->closeCursor(); 

        // =================== FIN =============================
        
        //détruire la session courante s'il y en a
        if (isset($_SESSION) ) {
            session_destroy();
            
        }
        
    } 

    exit();