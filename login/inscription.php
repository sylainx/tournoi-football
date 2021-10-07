<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
           if(isset($_GET['reg_err']))
           {
               $err = htmlspecialchars($_GET['reg_err']);
               switch ($err)
               {
                  case 'success' 
                  ?>
                  <div class="alert alert-success"> 
                    <strong>SUCCCES</strong>inscription réussie!
                </div>
                <?php
                break;

                case 'password':
                ?>
      
                  <div class="alert alert-danger"> <strong>ERREUR</strong>mot de passe invalide!
                </div>
                <?php
                break;

                case 'email':
                    ?>
                  <div class="alert alert-danger"> <strong>ERREUR</strong>email non valide!
                </div>
                <?php
                break;

                case 'email_length':
                    ?>
                  <div class="alert alert-danger"> <strong>ERREUR</strong>email trop long!
                </div>
                <?php
                break;
                case 'pseudo_length':
                    ?>
                  <div class="alert alert-danger"> <strong>ERREUR</strong>votre nom est trop long!
                </div>
                <?php
                break;
                case 'already':
                    ?>
                  <div class="alert alert-danger"> <strong>ERREUR</strong>cette email existe deja!
                </div>
                <?php
                break;
               }
           }
    ?>
    <div class="container"> 
       <form action="connection.php"method="POST">
           <h2>inscription</h2>
           <label>Name</label>
 <input type="text" name="pseudo" placeholder="enter your name" required="required"><br>
 <label>Email</label>
 <input type="email" name="email" placeholder="enter your email" required="required"><br>
 <label>Password</label>
 <input type="password" name="password" placeholder="enter your password" required="required"><br>
 <label>Retype-Password</label>
 <input type="password" name="password_retype" placeholder="retype your password" required="required"><br>


     <button type="submit"class="button"><a href="#"></a> INSCRIPTION</button> 
     <p>Member?<a href="login.php">login</a></p>
       </form>
       </div>
</body>
</html>