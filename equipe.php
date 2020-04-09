<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>BàG — equipe</title>
  <meta name="description" content="La Boite à Gants (BàG) est la récupérathèque de l'École de Recherche Graphique (ERG)">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/header.css">

  <link rel="shortcut icon" type="image/png" href="assets/favicon3.png"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

  <header class="header">
      <div class="marquee">
        <h1 class="title">
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>&nbsp;
        </h1>
        <h1 class="title">
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>&nbsp;
        </h1>
      </div>
      <h3>
        L'équipe évolue constamment <br/>
        Elle regroupe des pratiques variées et perméables entre-elles</h3>
  </header>

  <section class="container flex">

    <article class="item full">
      <button onclick="location.href='/'">
        <div class="rot"><span class="unicode">&#10148;</span></div>
      </button>
    </article>

    <article class="item half">
      <div class="cadre flex">

        <article class="item two-third">

          <h2 class="one-line-flex">
            <p>Équipe Actuelle</p>
            <div class="no-grow right"><button id="mail" onclick="location.href='mailto:contact@boiteagants.solutions'"> <span class="unicode">&#9993;</span> </button></div>
          </h2>

          <table>
            <?php
              $equipe = file("infos/equipe.txt");
              foreach($equipe as $line)  {
                $line = str_replace("|", "</td><td><i>", $line);
                echo '<tr>';
                echo '<td>' . $line . '</i></td>';
                echo '</tr>';
              }
            ?>
          </table>

        </article>

        <article class="item full">
          <h2>Encadrant.e.s</h2>
          <ul>
            <li> Ivo Provoost
            <li> Simona Denicolai
            <li> Frederic Gaillard
            <li> Marie Feyereisen
            <li> François De Jonge
          </ul>
        </article>
        <article class="item full">
        <p>
          <span class="unicode arrow"></span> L'équipe de la BàG est renouvellée chaque année.
          Depuis 2019-2020, un cour de l'ERG est entièrement dédié
          à la gestion de la BàG,
          permettant à l'équipe une meilleur organisation, disponibilité,
          et reconnaissance de leur travail au sein de l'école.
        </p>
        </article>
      </div>
    </article>

    <article class="item half">
      <h2>Contacts extérieurs</h2>
      <ul>
        <li> <a href="mailto:lemaistre@gmx.com">Albert Lemaistre</a> - ancien "Gérant" de la BàG
        <li> <a href="mailto:olivier.milis3@gmail.com">Olivier Milis</a> - fédération des récupérathèques et intervenant à la BàG
      </ul>
      <h2>Partenaires</h2>
      <ul>
        <li><a href="https://erg.be/">ERG</a><br>
        <li><a href="http://federation.recuperatheque.org/">Fédération des récupérathèques</a><br>
        <li><a href="http://gilbard.be/">Gilbard</a><br>
        <li><a href="https://rotordc.com/">ROTOR DC</a><br>
        <!-- <li><a href="https://www.ares-ac.be/fr/">Académie de Recherche et d'enseignement supérieur</a><br> -->
        <!-- <li><a href="https://www.foundationfuturegenerations.org/fr">Fondation pour les générations futures</a><br> -->
        <li><a href="http://www.stluc-bruxelles.be">Les instituts Saint-Luc</a><br>
        <li><a href="http://green-tech.be">Green Tech</a><br>
        <li><a href="https://www.cf2d.be/">CF2D</a><br>
        <li>Le SAS<br>
      </ul>
      <h2>Fondateur.trice.s</h2>
      <ul>
        <li>Marie-Marie Vergne
        <li>Benny Suarez
        <li>Arthur Halbique
        <li>Bernadette Kluyskens
        <li>Thomas Beauchamp
        <li>Benjamin Laserre
        <li>Frédéric Gaillard
        <li>William Reidiboym
        <li>Max Herrnann
        <li>Nil Marlio
        <li>Cécile Lechevallier
        <li>Nine de Bryas
        <li>Nicolas Despy
        <li>Nicolas Dau
        <li>Noah Cohen
        <li>Martin Cabrol
        <li>Antoine Kraehe
        <li>Gustave Boucard
        <li>Jeanne Pruvot
        <li>Simona Denicolai
      </ul>
    </article>

    <article class="item center full colophon">
      <p>
        Site web par <a href="mailto:dorian.timmermans@gmail.com">Dorian Timmermans</a> en 2020 <br/><br/>
        (première version du site lancé par Martin Cabrol en 2018)<br/>
        Logo (sur la page BàG) par William Reidiboym et Arthur Halbique.<br/>
        Font <a target="_blank" href="https://velvetyne.fr/fonts/sporting-grotesque/">Sporting Grotesque</a>.
      </p>
    </article>

    <article class="item right full">
      <button onclick="location.href='/'"> <span class="unicode">&#10148;</span> </button>
    </article>

  </section>

  <footer class="footer">
      <div class="marquee">
        <h1 class="title">
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>&nbsp;
        </h1>
        <h1 class="title">
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>
          Ekip <span class="unicode">&#10022;</span>&nbsp;
        </h1>
      </div>
  </footer>

</body>

</html>
