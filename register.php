<?php
session_start();
var_dump($_POST);

// vérifier les données de $_POST et enregistrer les données dans la base de données
if (isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Email"]) && isset($_POST["MDP"])) {
    if ($_POST["Nom"] != '' && $_POST["Prenom"] != '' && $_POST["Email"] != '' && $_POST["MDP"] != '') {
        $nom = htmlspecialchars($_POST['Nom']);
        $prenom = htmlspecialchars($_POST['Prenom']);
        $email = htmlspecialchars($_POST['Email']);
        $mdp = password_hash($_POST['MDP'], PASSWORD_DEFAULT); // encoder le mdp
        $role = 'user';
        $servername = "mysql:host=localhost;dbname=Evenements;charset=utf8;port=8888";
        $username = "root";
        $password = "root";

        // Se connecter à la base de données
        $conn = new PDO($servername, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // Vérifier si l'utilisateur existe déjà avec l'e-mail fourni
        $stmtEmail = $conn->prepare('SELECT * FROM Utilisateurs WHERE Mail= :mail');
        $stmtEmail->bindParam(':mail', $email);
        $stmtEmail->execute();
        $userExistant = $stmtEmail->fetch(PDO::FETCH_ASSOC);

        if ($userExistant) {
            $_SESSION['erreurEmailExistant'] = "un compte existe déjà";
            header('location:inscription.php');
            exit;
        }

        // Insérer un nouvel utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO Utilisateurs (`Nom`, `Prenom`, `Mail`, `MDP`, `Role`) VALUES (:Nom, :Prenom, :Mail, :MDP, :Role)");
        $stmt->bindParam(':Nom', $nom);
        $stmt->bindParam(':Prenom', $prenom);
        $stmt->bindParam(':Mail', $email);
        $stmt->bindParam(':MDP', $mdp);
        $stmt->bindParam(':Role', $role);
        $stmt->execute();

        // Rediriger l'utilisateur vers une page de confirmation ou de connexion
        header('location:connexion.php');
        exit;
    }
}
