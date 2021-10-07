<?php
session_start(); //session demarrer
require_once 'config.php'; // connexion a la base de donnee

if(!empty($_POST['email']) && !empty($_POST['password']))
{
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $email = strtolower($email);

    $check = $bdd->prepare('SELECT pseudo, email, password,token FROM utilisateur WHERE email =?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 1)
    {
       if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
       {
           $password = hash('sha256', $password);

           if ($data['password'] === $password);
           {
               $_SESSION['user'] = $data['pseudo'];
               header('location:landing.php'); 
          } header('location:login.php?login_err=password');
       }else header('location:login.php?login_err=email');
    }else header('location:login.php?login_err=already');
}else header('location:login.php');




