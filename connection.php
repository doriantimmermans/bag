
<?php

  // Changer le mot de passe
  // $myfile = fopen(".password", "w") or die("Unable to open file!");
  // fwrite($myfile, password_hash("carapils", PASSWORD_DEFAULT));
  // fclose($myfile);

  //  Récupération du mot de passe
  $mdp = file_get_contents('.password');

  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = password_verify($_POST['mdp'], $mdp);

  if ($isPasswordCorrect) {
      session_start();
      $_SESSION['admin'] = true;
      echo 'Vous êtes connecté !';
  }
  else {
      echo 'Mauvais identifiant ou mot de passe';
  }

  header("Location: glock");

?>
