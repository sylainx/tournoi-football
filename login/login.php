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
           if(isset($_GET['login_err']))
           {
             $err =  htmlspecialchars($_GET['login_err']);

             switch($err)
             {
                 case 'password':
                    ?>
                    <div class="alert alert danger text-center">
                        <strong>Erreur</strong>mot de passe incorect
                    </div>
                    <?php
                    break;

                    case 'email':
                        ?>
                        <div class="alert alert danger text-center">
                        <strong>Erreur</strong>EMAIL inccorect
                    </div>
                    <?php
                    break;

                    case 'already'
                    ?>
                    <div class="alert alert danger text-center">
                  <strong>Erreur</strong>compte inexistant signin please
                
                <?php
                break;
             }
           }
        ?>
        <div class="container">
       <form action="connection.php"method="POST">
           <h2>Connection</h2>
           <label>Email</label>
 <input type="text" name="email" placeholder="enter your email" required="required"><br>
 <label>Password</label>
 <input type="password" name="password" placeholder="enter your password" required="required"><br>
     <button type="submit"class="button"> <a href="#"></a> CONNEXION</button>
       </form>
       <p>not member yet?<a href="inscription.php">s'inscrire</a></p>
       </div>
</body>
</html> 