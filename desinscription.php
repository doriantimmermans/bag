$user<?php
  // Connexion à la base de données
  require('config.php');

  if (isset($_POST['id'])) {

    //on recup l'etudiant.e.s
    $req = $bdd->prepare('SELECT id, nom, prenom, glocks FROM users WHERE id=:id');
    $req->bindParam(':id', $_POST['id']);
    $req -> execute();
    $user = $req -> fetch();

    //on lae delete
    $req = $bdd -> prepare('DELETE FROM users WHERE id = :id');
    $req -> execute(array('id' => $_POST['id']));

    //update du journal
    $req = $bdd->prepare("INSERT INTO journal (id_user,	action,	glocks, date, nom, prenom) VALUES (:id_user, :action, :glocks, NOW(), :nom, :prenom)");
    $req->bindParam(':id_user', $_POST['id']);
    $req->bindParam(':action', $action);
    $req->bindParam(':glocks', $user['glocks']);
    $req->bindParam(':nom', $user['nom']);
    $req->bindParam(':prenom', $user['prenom']);

    $action = "Désinscription";

    $req -> execute();
  }

  header('Location:glock');
?>
