<?php
  // Connexion à la base de données
  require('config.php');

  if(isset($_POST["submit"])){

    // --- AJOUT D'UN POST

    // ajout dans la db
    $req = $bdd->prepare("INSERT INTO blog (titre, type, contenu, date) VALUES (:titre, :type, :contenu, NOW())");

    $req->bindParam(':titre', $titre);
    $req->bindParam(':type', $type);
    $req->bindParam(':contenu', $contenu);

    $titre = htmlspecialchars($_POST['titre']);
    $type = htmlspecialchars($_POST['type']);
    $contenu = htmlspecialchars($_POST['contenu']);

    $req->execute();

    // get the last inserted ID
    $id = $bdd -> lastInsertId();

    // upload de l'image
    upload_image($id, $bdd);

  }

  if(isset($_POST["modify"])){

    // --- UPDATE D'UN POST

    // update dans la db
    $req = $bdd->prepare("UPDATE blog SET titre=:titre, type=:type, contenu=:contenu WHERE id=:id");

    $req->bindParam(':id', $_POST['id']);

    $req->bindParam(':titre', $titre);
    $req->bindParam(':type', $type);
    $req->bindParam(':contenu', $contenu);

    $titre = htmlspecialchars($_POST['titre']);
    $type = htmlspecialchars($_POST['type']);
    $contenu = htmlspecialchars($_POST['contenu']);

    $req->execute();

    // update de l'image
    if(isset($_FILES["image"])){
      // delete l'ancienne image
      unlink($_POST['img_url']);
      // up la nouvelle
      upload_image($_POST['id'], $bdd);
    }
  }

  else if(isset($_POST["delete"])){

    // --- DELETE D'UN POST

    // delete dans la db
    $req = $bdd->prepare("DELETE FROM blog WHERE id=:id");
    $req->bindParam(':id', $_POST['id']);
    $req->execute();

    // delete l'image
    unlink($_POST['img_url']);
  }


  // redirection
  header('Location: blog');


  // --- Details de l'upload de l'image

  function upload_image($id, $bdd){

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));

    $target_dir = "img/";
    $target_file = $target_dir . $id . '.' . $imageFileType;

    echo "New file name is " . $target_file . '<br/>';

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . '<br/>';
        $uploadOk = 1;
    } else {
        echo "File is not an image." . '<br/>';
        $uploadOk = 0;
    }

    // Check if image file is a jpg
    $acceptedFileType = ['jpg','jpeg','png','gif'];
    if(!in_array($imageFileType, $acceptedFileType)) {
        echo "Sorry, only " . $acceptedFileType . '<br/>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded." . '<br/>';
    // if everything is ok, try to upload file
    }
    else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded." . '<br/>';

          //update l'url de l'image dans l'objet de la db
          $req = $bdd -> prepare("UPDATE blog SET img_url=:img_url WHERE id=:id");
          $req -> bindParam(':img_url', $target_file);
          $req -> bindParam(':id', $id);
          $req -> execute();
          echo "img_url renamed! <br/>";

      } else {
          echo "Sorry, there was an error uploading your file." . '<br/>';
      }
    }
  }
?>
