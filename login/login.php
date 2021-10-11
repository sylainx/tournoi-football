<?php require_once 'login-traitement.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
    <style>
      .erreur-message{
        margin: 15px 8px 8px 8px;
        padding: 7px 20px;
        background: red;
        color: white;
        border-radius: 5px;
        width: 200px;
      }
    </style>
</head>
<body>
    
    <div class="container">
       <form action="login.php"method="POST">
          
          <h2>Connection</h2>

          <label>Email</label>
          <input type="text" name="email" placeholder="enter your email" required="required"><br>

          <label>Password</label>
          <input type="password" name="password" placeholder="enter your password" required="required"><br>
          <p>forget your password?</p>
          
          <button type="submit" name="connexion" class="button">CONNEXION</button>
          
          <?php if ( count($errors) > 0 ) {
                  echo '<label class="erreur-message" > ';
                    foreach($errors as $err){ echo $err; break;}
                  echo '</label>';
                }                
          ?>

        </form>

       <p>Not member yet? <a href="inscription.php">s'inscrire</a></p>

       </div>
</body>
</html> 