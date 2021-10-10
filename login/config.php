<?php
     try{
         $bdd = new PDO('mysql:host=localhost;dbname=seconnecter;charset=utf8', 'root', 'root');
     } catch(Exception $e)
       {
           die('Erreur'.$e->getmessage());
       }