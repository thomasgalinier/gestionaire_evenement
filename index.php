<?php include('./config/config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php  include HEADER ?>
    
    <main class="bg-gray-50 py-20">
        
        <?php
            $servername = "mysql:host=localhost;dbname=Evenements;charset=utf8;port=8888";
            $username = "root";
            $password = "root";
            $conn = new PDO($servername,$username,$password,[]);
            $sql = $conn ->prepare(("SELECT * FROM Evenement JOIN Utilisateurs ON Evenement.IdUtilisateur = Utilisateurs.IdUtilisateur"));
            $sql -> execute();
            $events = $sql -> fetchAll(PDO::FETCH_ASSOC); ?>
        <section class="events flex flex-col w-full items-center gap-20 w-full ">
        <?php foreach($events as $event) : ?>
        <div class="flex justify-center gap-20 bg-gray-800 shadow p-10 rounded text-white">
                <a href="#" class=""><img  src="<?=IMAGE.$event['ImageSrc'] ?>" alt="" class="rounded "></a>
                <div class="flex flex-col justify-around">
                    <div class="gap-8 flex">
                        <h2><?= $event['Titre'] ?></h2>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            <p><?=$event['Date']?></p>
                        </div>
                        </div>
                    <p>Organisateur : <?=$event['Nom']. ' '. $event['Prenom']?></p>
                    <p>Nombres de places: <?=$event["NbPlace"]?></p>
                    <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">s'inscrire à l'evenements</button> -->
                </div>
        </div>
        <?php endforeach ?> 
        </section>
        
    </main>
</body>
</html>






<?php 

// $sql = $conn ->prepare("SELECT * FROM Utilisateurs");
// $sql -> execute();
// $utilisateurs = $sql->fetchAll(PDO::FETCH_ASSOC);
// foreach ($utilisateurs as $utilisateur);
?>
