<?php
  // Connexion à la base de données
  require('config.php');

  if (isset($_POST['modif']) && !empty($_POST['modif']) && $_POST['modif']!=0) {


    //changement du nb de glock
    $req = $bdd -> prepare('UPDATE users SET glocks=glocks+:modif WHERE id = :id');
    $req->bindParam(':modif', $modif, PDO::PARAM_INT);
    $req->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $modif = htmlspecialchars($_POST['modif']);
    $req -> execute();

    //on recup l'etudiant.e.s
    $req = $bdd->prepare('SELECT id, nom, prenom, glocks FROM users WHERE id=:id');
    $req->bindParam(':id', $_POST['id']);
    $req -> execute();
    $user = $req -> fetch();

    //update du journal
    $req = $bdd->prepare("INSERT INTO journal (id_user,	action,	glocks, date, nom, prenom) VALUES (:id_user, :action, :glocks, NOW(), :nom, :prenom)");
    $req->bindParam(':id_user', $_POST['id']);
    $req->bindParam(':action', $action);
    $req->bindParam(':glocks', $modif);
    $req->bindParam(':nom', $user['nom']);
    $req->bindParam(':prenom', $user['prenom']);
    if($modif>0){
      $action="Ajout";
    }else{
      $action="Décompte";
    }
    $req -> execute();
  }

  header('Location:glock');
?>
