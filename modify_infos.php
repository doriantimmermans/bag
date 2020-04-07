<?php
  // Connexion à la base de données
  require('config.php');

  if ($_POST['filename']) {
    // ouvre le fichier en mode rewrite
    $fn = 'infos/' . $_POST['filename'] . '.txt';
    $file = fopen($fn, "w+");

    //recupere le nouveau texte
    if ($_POST['txt']){
      $txt = $_POST['txt'];
      fwrite($file, $txt);
    }

    fclose($file);
  }

  header('Location: gestion');
?>
