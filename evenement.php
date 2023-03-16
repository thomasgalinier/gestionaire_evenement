<?php
include('./config/config.php');
session_start()
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</head>
<body >

<?php include HEADERUSER ?>

<main class="flex flex-col">
<?php 
// Vérifier si l'ID de l'événement est présent dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de l'événement à partir de l'URL
    $event_id = $_GET['id'];
    // Interroger la base de données pour récupérer les informations de l'événement correspondant à cet ID
    $servername = "mysql:host=localhost;dbname=Evenements;charset=utf8;port=8888";
    $username = "root";
    $password = "root";
    $conn = new PDO($servername,$username,$password,[]);
    $sql = $conn->prepare("
    SELECT *, 
        (SELECT COUNT(IdUtilisateur) 
         FROM participer 
         WHERE IdEvenement = Evenement.IdEvenement) AS Nombre_Utilisateurs 
    FROM Evenement 
    JOIN Utilisateurs ON Evenement.IdUtilisateur = Utilisateurs.IdUtilisateur
    JOIN Lieu ON Evenement.IdLieu = Lieu.IdLieu
    WHERE Evenement.IdEvenement = :event_id
");
    $sql->execute(['event_id' => $event_id]);
    $event = $sql->fetch(PDO::FETCH_ASSOC); 
    $NbPlaceRestante = $event['NbPlace'] - $event['Nombre_Utilisateurs'];
    // Afficher les informations de l'événement
    if ($event) { ?>

    <div class="flex  py-20 px-10 gap-10">
        <img src="./asset/images/<?= $event['ImageSrc']?>" alt="" class="w-3/6 h-3/6">
        <div class="flex flex-col gap-8" >
            <h1 class="text-4xl font-bold text-black"><?= $event['Titre'];?></h1>
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-600 w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                <p class="text-lg text-gray-600"> <?= $event['Nom'] . ' ' . $event['Prenom'] ?></p>
            </div>
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <p class="text-lg text-gray-600"><?=$event['Date']?></p>
             </div>
            <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <p class="text-lg text-gray-600"><?= $event['Adresse'] . ' ' . $event['Cp'] . ' ' . $event['Ville'] ?></p>
            </div>
            <div class="flex text-gray-600 gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
                <p class="text-lg"><?= $event['NbPlace'] - $event['Nombre_Utilisateurs']?> place restante</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-2/3 justify-center p-10 gap-10">
        <h2 class="text-3xl font-bold">Description </h2>
        <p><?= $event['Description'] ?></p>
    </div>
    <?php }
} ?>
</main>


</body>
</html>


