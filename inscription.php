<?php
  // Connexion à la base de données
  require('config.php');

  if(isset($_POST['nom'])){

    //conversion des variables
    $nom = ucfirst(strtolower(htmlspecialchars($_POST['nom'])));
    $prenom = ucfirst(strtolower(htmlspecialchars($_POST['prenom'])));
    $email = htmlspecialchars($_POST['email']);
    $glocks = htmlspecialchars($_POST['glocks']);

    //test if already exists
    $req = $bdd->prepare("SELECT * FROM users WHERE nom=:nom AND prenom=:prenom");
    $req->bindParam(':nom', $nom);
    $req->bindParam(':prenom', $prenom);
    $req->execute();
    if ($req->rowCount() > 0) {

      echo 'Ce membre existe déjà';

    } else {
      // ajout nouveau membre
      $req = $bdd->prepare("INSERT INTO users (prenom, nom, email, glocks) VALUES (:prenom, :nom, :email, :glocks)");
      $req->bindParam(':nom', $nom);
      $req->bindParam(':prenom', $prenom);
      $req->bindParam(':email', $email);
      $req->bindParam(':glocks', $glocks);
      $req->execute();

      //get the last inserted ID
      $id = $bdd->lastInsertId();

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
  }

  header('Location: glock');
?>
