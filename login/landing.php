<?php 
      session_start();
        if(!isset($_SESSION['user']))
         header('location:login.php');
    ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <h1>bonjour ! <?php echo$_SESSION['user']; ?></h1>
       <a href="deconnexion.php" class="">DECONNEXION</a>
</body>
</html>