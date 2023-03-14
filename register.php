<?php 
    session_start();
    var_dump($_POST);

    // verifier les données de $_POST 
        //// enrigistrer les données de bdd 
    if(isset($_POST["Nom"])&& isset($_POST["Prenom"])&& isset($_POST["Email"])&& isset($_POST["MDP"])){
        if($_POST["Nom"]!= '' && $_POST["Prenom"]!= '' && $_POST["Email"]!= '' && $_POST["MDP"]!= ''){
            $nom = htmlspecialchars($_POST['Nom']);
            $prenom = htmlspecialchars($_POST['Prenom']);
            $email = htmlspecialchars($_POST['Email']);
            $mdp = password_hash($_POST['MDP'], PASSWORD_DEFAULT);// encoder le mdp
            $role = 'user'; 
            $servername = "mysql:host=localhost;dbname=Evenements;charset=utf8;port=8888";
            $username = "root";
            $password = "root";
            $conn = new PDO($servername,$username,$password,[]);
            $stmt = $conn->prepare("INSERT INTO Utilisateurs (`IdUtilisateur`, `Nom`, `Prenom`, `Mail`, `MDP`, `Role`) VALUES (NULL, :Nom, :Prenom, :Mail, :MDP, :Role)");
            $stmtEmail = $conn->prepare('SELECT * FROM Utilisateurs WHERE Mail= :mail');
            $stmt->bindParam(':email',$email);
            $stmtEmail->execute();
            $userExistant=  $stmtEmail->fetch(PDO::FETCH_ASSOC);
            if($userExistant){
                $_SESSION['erreurEmailExistant'] = "un compte existe déjà";
                header('location:inscription.php');
            }
            $stmt->bindParam(':Nom', $nom);
            $stmt->bindParam(':Prenom', $prenom);
            $stmt->bindParam(':Mail', $email);
            $stmt->bindParam(':MDP', $mdp);
            $stmt->bindParam(':Role', $role);
            $stmt->execute();
        }
    }
    // encoder le mdp
    // vérifier qu'il n'y a pas déja un utilisateur avec cet email
    //faire la requête SQL
?>