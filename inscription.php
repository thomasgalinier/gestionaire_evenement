<?php 
    include './config/config.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?=CSS?>inscription.css">
</head>
<body>
    <main>
        <?php if(isset($_SESSION['erreurEmailExistant'])):?> 
            <p><?= $_SESSION['erreurEmailExistant']?></p>
            <?php session_destroy();?>
            <?php endif ?>
            <form action="register.php" method="post">
                <div>
                    <h1>Inscription</h1>
                    <label for="Nom">Nom</label>
                    <input type="text" name="Nom"placeholder="Nom">
                    <label for="Prenom">Prenom</label>
                    <input type="text" name="Prenom"placeholder="Prenom">
                    <label for="Email">email</label>
                    <input type="email" name="Email"placeholder="email" autocomplete="off">
                    <label for="MDP">mot de passe </label>
                    <input type="password" name="MDP" placeholder="mot de passe">
                    <input type="submit" value="Enregistrer" class="button">
                </div>  
            </form>
    </main>
</body>
</html>