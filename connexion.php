<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <main class="flex justify-center items-center h-screen">
        <form action="signIn.php" method="post" class="bg-white flex flex-col w-auto py-20 px-20 justify-center items-center rounded  gap-8 shadow">
            <h1>Connexion</h1>
            <div class="flex flex-col gap-1">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="" placeholder="name@mail.com" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" autofill="off" >
            </div>
            <div class="flex flex-col gap-1">
                <label for="mdp">mot de passe</label>
                <input type="password" name="mdp" id="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <input type="submit" value="Connexion " class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </form>
    </main>
</body>
</html>