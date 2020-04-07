<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>BàG — gestion</title>
  <meta name="description" content="La Boite à Gants (BàG) est la récupérathèque de l'École de Recherche Graphique (ERG)">
  <link rel="shortcut icon" type="image/png" href="/assets/favicon3.png"/>

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/header.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

  <?php
    session_start();
    require('config.php');
  ?>

  <header class="header admin">
      <div class="marquee">
        <h1 class="title">
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>&nbsp;
        </h1>
        <h1 class="title">
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>&nbsp;
        </h1>
      </div>
      <h3>
        Page d'administration
      </h3>
  </header>

  <section class="container flex">

    <article class="item half">
      <h2>Horraires</h2>
      <form action="modify_infos.php" method="POST">
        <input type="hidden" name="filename" value="horraires">
        <textarea rows="5" cols="50" name="txt"><?php include('infos/horraires.txt'); ?></textarea>
        <button type="submit"><span class="unicode">&#10003;</span></button>
      </form>
    </article>

    <article class="item half">
      <h2>Équipe</h2>
      <form action="modify_infos.php" method="POST">
        <input type="hidden" name="filename" value="equipe">
        <textarea rows="5" cols="50" name="txt"><?php include('infos/equipe.txt'); ?></textarea>
        <button type="submit"><span class="unicode">&#10003;</span></button>
      </form>
    </article>

    <hr/>

  </section>

  <footer class="footer admin">
      <div class="marquee">
        <h1 class="title">
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>&nbsp;
        </h1>
        <h1 class="title">
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>
          Gestion <span class="unicode">&#x25C6;</span>&nbsp;
        </h1>
      </div>
  </footer>

</body>

</html>
