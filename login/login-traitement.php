<?php
session_start(); //session demarrer

require "../ConnexionBD/base.php";

$email = "";
$pseudo = "";     
$errors = array();

if ( isset( $_POST['connexion'] ) ) {
    
    if( isset($_POST['email']) &&  isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        // $email = strtolower($email);
         
            // verifier email length
        if(strlen($email) > 100) {
            $errors['email_length'] = "email trop long !";
        }
        
            // verifier email N'EST PAS valide | Attention au point d'exclamation
        if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {

            $errors['email_length'] = "Email n'est pas valide !";

        }

        // verifier si email existe
        $checkEmailExist = $bdd->prepare("SELECT `pseudo` FROM `utilisateur` WHERE `email` = :email");
        $checkEmailExist->bindValue(":email", $email);
        $checkEmailExist->execute();         
        
        $verify = $checkEmailExist->rowCount();

        // condition ou l'email n'existe
        if( $verify == 0 ) {
            $errors["email_not_exist"] = "Utilisateur introuvable!";
        }
        else{      //Cas ou l'email existe bel et bien

           
            // verifier password length
            if(strlen($password) < 4 OR strlen($password) > 20) {
                $errors['password_length'] = "Le mot de passe doit etre entre 4 a 20 caractères !";
            }
            else {      // cas ou pwd est valide

                if ( count($errors) === 0 ) {
                   
                    $selectPWD = $bdd->prepare("SELECT `pseudo`, `password` FROM `utilisateur` WHERE `email` = :email");
                    $selectPWD->bindValue(":email", $email);
                    $selectPWD->execute();         
                    
                    $pwd_fetch = $selectPWD->fetch();
                    
                    if( $password === $pwd_fetch['password'] ){
                            
                        $_SESSION['pseudo'] = $pwd_fetch['pseudo'] ;
                        header('Location: ../dashboard.php');
                    }  

                }
            }        
        }
    }else    
        $errors["unknow"] = "bYEN TESTE ti pap ";

}


