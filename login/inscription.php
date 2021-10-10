<?php
  require_once('./inscription-traitement.php');
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Inscription</title>
</head>
<body>

    <div class="container"> 
       <form action="inscription.php" method="POST">
        
        <h2>Formulaire d'inscripition</h2>
          <label for="nom"> Name</label>
          <input type="text" name="name" id="nom" placeholder="Enter your name" required>  <br>
          <label for="email"> Email</label>
          <input type="email" name="email" id="email" placeholder="Enter your email" required> <br>
          <label for="password"> Password</label>
          <input type="password" name="password" id="password" placeholder="Enter your password" required> <br>
          <label for="password_retype"> Retype-Password</label>
          <input type="password" name="password_retype" id="password_retype" placeholder="Retype your password" required> <br>

          <button type="submit"class="button" name="inscription"> INSCRIPTION</button> 
          <p>Are you a member? <a href="login.php">Login</a></p>
          
          <?php if ( count($errors) > 0 ) {
                  echo '<label style="background: red; color: white; padding: 0.3rem; border-radius: 5px; width: 70%; margin: 0 auto">';                  
                    foreach($errors as $err){ echo $err; break;}
                  echo '</label>';
                }                
          ?>
       </form>
      </div>

</body>
</html>