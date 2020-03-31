<?php
  // Connexion à la base de données
  require('config.php');

  if(isset($_POST['nom'])){

    //ajout nouveau membre
    $req = $bdd->prepare("INSERT INTO users (prenom, nom, email, glocks) VALUES (:param1, :param2, :param3, :param4)");

    $req->bindParam(':param2', $nom);
    $req->bindParam(':param1', $prenom);
    $req->bindParam(':param3', $email);
    $req->bindParam(':param4', $glocks);

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $glocks = htmlspecialchars($_POST['glocks']);

    $req->execute();

    //get the last inserted ID
    $id = $bdd->query("SELECT LAST_INSERT_ID()")->fetch()[0];

    $action = "Inscription";

    //update du journal
    $req = $bdd->prepare("INSERT INTO journal (id_user,	action,	glocks, date, nom, prenom) VALUES (:id_user, :action, :glocks, NOW(), :nom, :prenom)");
    $req->bindParam(':id_user', $id);
    $req->bindParam(':action', $action);
    $req->bindParam(':glocks', $_POST['glocks']);
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req -> execute();
  }

  header('Location: glock.php');
?>
