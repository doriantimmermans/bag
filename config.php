
<?php
  // Affichage d'erreur
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Connexion à la base de données
  try
  {$bdd = new PDO('mysql:host=localhost;dbname=bag;charset=utf8', 'root', '');}
  // {$bdd = new PDO('mysql:host=localhost;dbname=bag;charset=utf8', 'erg', '423txFQ3');}
  catch(Exception $e)
  {die('Erreur : '.$e->getMessage());}
?>
