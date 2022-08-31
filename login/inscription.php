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
          <label for="nom"> Nom</label>
          <input type="text" name="name" id="nom" placeholder="Entrer votre nom" required>  <br>
          <label for="email"> Email</label>
          <input type="email" name="email" id="email" placeholder="Entrer votre email" required> <br>
          <label for="password"> Mot de passe</label>
          <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" required> <br>
          <label for="password_retype"> Retype-Password</label>
          <input type="password" name="password_retype" id="password_retype" placeholder="Confirmer votre mot de passe" required> <br>
             <p>Se souvenir de moi ?</p>
          <button type="submit"class="button" name="inscription"> S'inscriire</button> 
          <p>Etes-vous deja membre? <a href="login.php">Se connecter</a></p>
          
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