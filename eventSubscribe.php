<?php
include('./config/config.php');
session_start();
$id_evenement = $_GET['id_evenement'];
$id_utilisateur = $_SESSION['IdUtilisateur'];

// Vérifier si l'utilisateur est déjà inscrit à l'événement
$servername = "mysql:host=localhost;dbname=Evenements;charset=utf8;port=8888";
$username = "root";
$password = "root";
$conn = new PDO($servername,$username,$password,[]);
$sql = $conn->prepare("SELECT * FROM Participer WHERE IdEvenement = :id_evenement AND IdUtilisateur = :id_utilisateur");
$sql->execute(['id_evenement' => $id_evenement, 'id_utilisateur' => $id_utilisateur]);
$result = $sql->fetch(PDO::FETCH_ASSOC);
if ($result) {
  // L'utilisateur est déjà inscrit, donc on le supprime de la table "Participer"
  $sql = $conn->prepare("DELETE FROM Participer WHERE IdEvenement = :id_evenement AND IdUtilisateur = :id_utilisateur");
  $sql->execute(['id_evenement' => $id_evenement, 'id_utilisateur' => $id_utilisateur]);
  echo "Votre inscription à cet événement a été annulée.";
} else {
  // L'utilisateur n'est pas encore inscrit, donc on l'inscrit en ajoutant une nouvelle entrée dans la table "Participer"
  $sql = $conn->prepare("INSERT INTO Participer (IdEvenement, IdUtilisateur) VALUES (:id_evenement, :id_utilisateur)");
  $sql->execute(['id_evenement' => $id_evenement, 'id_utilisateur' => $id_utilisateur]);
  echo "Inscription réussie !";
}
header('location:indexUser.php');
?>
