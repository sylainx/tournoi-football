<?php
   session_start();
   require "../ConnexionBD/base.php";

     $email = "";
     $pseudo = "";     
     $errors = array();
     
   if ( isset($_POST['inscription'])) {
       

      if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
      {         
         $pseudo = htmlspecialchars($_POST['name']);
         $email = htmlspecialchars($_POST['email']);
         $password = htmlspecialchars($_POST['password']);
         $password_retype = htmlspecialchars ($_POST['password_retype']); 
            
         //verifier nom
         if(strlen($pseudo) > 100) {
            $errors['nom'] = "Nom trop long !";
         }         
               // verifier email length
         if(strlen($email) > 100) {           
            $errors['email_length'] = "email trop long !";
         }
         
               // verifier email N'EST PAS valide | Attention au point d'exclamation
         if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $errors['email_length'] = "Email n'est pas valide !";
         }
                
            // verifier password length
         if(strlen($password) < 4 OR strlen($password) > 20) {           
            $errors['password_length'] = "le mot de passe doit etre entre 4 a 20 caractères !";
         }
          
            // verifier password non identique
         if( $password !== $password_retype) {           
            $errors["password_not_same"] = "Les deux mots de passe doivent être identique !";
         }
         
         // verifier si email existe
         $check = $bdd->prepare("SELECT `password` FROM `utilisateur` WHERE `email` = :email");
         $check->bindValue(":email", $email);
         $check->execute();         
         $verify = $check->rowCount();
         
         // si l'instruction est executée, ça veut dire que l'email existe
         if( $verify ){
            $errors["email_exist"] = "Cet email existe déjà!";
         }
         else {
            
            // Cas ou l'email n'existe pas   
            
            //Recuperer adresse ip de la machine
            $ip = $_SERVER["REMOTE_ADDR"];
            
            if ( count($errors) === 0 ) {

               // $password_crypte = password_hash($password, PASSWORD_DEFAULT);
               
               $insert = $bdd->prepare(" INSERT INTO `utilisateur` (`pseudo`, `email`, `password`, `ip`) 
                     VALUES (:pseudo, :email, :password, :ip)  ");
               
               $insert->bindValue("pseudo", $pseudo);
               $insert->bindValue("email", $email);
               $insert->bindValue("password", $password); 
               $insert->bindValue("ip", $ip );
               
               $insert->execute();
               
               header('Location: login.php');

            }
         }

      }else
         $errors["unknow"] = "M kenbe'w ti pap ";
               
   } // Fin vérification  $_POST