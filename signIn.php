<?php 
   session_start();
    $servername = "mysql:host=localhost;dbname=Evenements;charset=utf8;port=8888";
    $username = "root";
    $password = "root";
    $conn = new PDO($servername,$username,$password,[]);
    $email =htmlspecialchars(($_POST['Email']));
    $stmt = $conn-> prepare('SELECT * FROM Utilisateurs WHERE Mail=:email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    if($utilisateur){
        $mdp = $_POST['mdp'];
        if(password_verify($mdp, $utilisateur['MDP'])){
            echo'good';
            $_SESSION['IdUtilisateur'] = $utilisateur['IdUtilisateur'];
            $_SESSION['Nom'] = $utilisateur['Nom'];
            $_SESSION['Prenom'] = $utilisateur['Prenom'];
            $_SESSION['Mail'] = $utilisateur['Mail'];
            $_SESSION['Role'] = $utilisateur['Role'];
            

            var_dump($_SESSION);
            header('location:indexUser.php');
        }else{
            header('location:index.php');
        }
        
    }else{
        header('location:connexion.php');
    }

?>
