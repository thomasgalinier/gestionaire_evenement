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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='bg-gray-300'>
    <main class="flex justify-center items-center h-screen">
        <?php if(isset($_SESSION['erreurEmailExistant'])):?> 
            <p><?= $_SESSION['erreurEmailExistant']?></p>
            <?php session_destroy();?>
            <?php endif ?>
            <form action="register.php" method="post" class="bg-white flex flex-col justify-center items-center rounded  gap-8 shadow w-auto py-10 px-40">
                    <h1>Inscription</h1>
                    <div> 
                        <label for="Nom">Nom</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="Nom"placeholder="Nom">
                    </div>
                    <div> 
                         <label for="Prenom">Prenom</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="Prenom"placeholder="Prenom">
                    </div>
                    <div>
                        <label for="Email">email</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" name="Email"placeholder="email" autocomplete="off">
                    </div>
                    <div>
                        <label for="MDP">mot de passe </label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password" name="MDP" placeholder="mot de passe">
                    </div>
                    <input type="submit" value="Enregistrer" class="button bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded"> 
                    <p>Deja un compte ? <a href="connexion.php" class="text-blue-700 hover:text-black">connecte-toi</a></p>

            </form>
    </main>
</body>
</html>