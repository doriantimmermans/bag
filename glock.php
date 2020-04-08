<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>BàG — glock</title>
  <meta name="description" content="La Boite à Gants (BàG) est la récupérathèque de l'École de Recherche Graphique (ERG)">
  <link rel="shortcut icon" type="image/png" href="assets/favicon3.png"/>

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/tables.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script type="text/javascript" src="js/recherche.js"></script>

</head>

<body>

  <?php
    session_start();

    require('config.php');

    $reponse = $bdd->query('SELECT COUNT(*) AS total FROM users');
    $total = $reponse->fetch()['total'];
  ?>

  <header class="header">
      <div class="marquee">
        <h1 class="title">
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>&nbsp;
        </h1>
        <h1 class="title">
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>&nbsp;
        </h1>
      </div>
      <h3>
        La BàG compte actuellement <?php echo $total ?> usager.ère.s
      </h3>
  </header>

  <section class="container flex">

    <article class="item full">
      <button onclick="location.href='/'">
        <div class="rot"><span class="unicode">&#10148;</span></div>
      </button>
    </article>

    <!-- COMPTES PRINTING -->

    <article class="item two-third" >
      <h2>Comptes</h2>

      <input type="text" id="myInput" onkeyup="recherche()" placeholder="Rechercher">

      <div id="comptes" class="flex-table">

        <?php
          $reponse = $bdd->query('SELECT id, nom, prenom, glocks FROM users ORDER BY nom ASC');

          // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
          while ($user = $reponse->fetch()){?>

            <div class="line">

              <div class="info">
                <div class="big nom"><strong><?php echo $user['nom'];?></strong> <?php echo $user['prenom'];?></div>
                <div class="center-box"><?php echo $user['glocks'];?> &#8370; </div>
              </div>

            <?php
            if (isset($_SESSION['admin'])){
              ?>
              <div class="modif">

                <form class="big" method="post" action="desinscription.php">
                  <input type="hidden" value="<?php echo $user['id']; ?>" name="id" id="id">
                  <button id="desinscription_btn" class="center-box" type="button"><span class="unicode">&times</span></button>

                  <!-- boite modal de connection -->
                  <div id="desinscription" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <label>Voulez-vous vraiment désincrire <strong><?php echo $user['nom'];?> <?php echo $user['prenom'];?></strong> pour toujours? </label>
                        <button type="submit"><span class="unicode">&#10003;</span></button>
                    </div>
                  </div>

                  <script>
                    var modal = document.getElementById("desinscription");
                    var btn = document.getElementById("desinscription_btn");

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                      modal.style.display = "flex";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.display = "none";
                      }
                    }
                  </script>
                </form>

                <form method="post" action="transaction.php">
                  <input type="hidden" value="<?php echo $user['id']; ?>" name="id" id="id">
                  <input type="number" placeholder="0" name="modif">
                  <button class="center-box" type="submit"><span class="unicode">&#8645;</span></button>
                </form>

              </div>
              <?php
            }
            ?>
            </div>
            <?php
          }
          $reponse->closeCursor();
        ?>
      </div>
      <p>
        Les comptes et l'historique sont gardés publiques et transparents, afin de garder une visibilité collective sur l'économie. <br/>
        <!-- permettant ainsi d'avoir un suivis collectif du bon déroulement des permanences,
        cette possibilité de surveillance (non-hierarchisé - ce n'est pas une autorité qui surveille un.e executant) permet en fait d'augmenter l'accessibilité et la diversité de personnes pouvant executer ses transactions
        car un suivis collectif par tt le monde est en permanence possible -->
      </p>
    </article>

    <!-- INSCRIPTION PRINTING -->

    <article class="item">
      <h2>Inscription</h2>
      <?php
      if(!isset($_SESSION['admin'])){
        ?>
      <p>
        Un nom, prénom et une adresse email sont demandés pour s'inscrire.
        L'inscription se fait sur place pendant les heures d'ouvertures.
      </p>
      <?php
      }
      else{
        ?>
      <p>
        <form action="inscription.php" method="POST">
          <input type="text" name="nom" placeholder="Nom" required>
          <input type="text" name="prenom" placeholder="Prénom" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="number" name="glocks" placeholder="20&#8370;" required>
          <button type="submit"><span class="unicode">&#10003;</span></button>
        </form>
      </p>
        <?php
      }
      ?>
      <p>
        L'adresse email ne sera pas diffusée à des tiers et sert uniquement dans le cas de rare newsletters.
      </p>
    </article>

    <!-- HISTORIQUE PRINTING -->

    <article class="item two-third" >

      <h2>Historique</h2>

      <div class="scroll-table-container">
        <table class="data-table">

          <?php
          $reponse = $bdd->query('SELECT action, glocks, date, DATE_FORMAT(date, \'%d/%m/%y\') date_fr, DATE_FORMAT(date, \'%Hh%im%ss\') heure, nom, prenom
          FROM journal ORDER BY date DESC');

          // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
          while ($journal = $reponse->fetch()){?>

            <tr>
              <td class="left">
              <?php
              echo  $journal['action'] ;
              if($journal['action']=="Ajout" or $journal['action']=="Décompte"){ echo ' à '; }
              else{ echo ' de '; }
              echo '<strong>' . $journal['nom'] . ' ' . $journal['prenom'] . '</strong>';
              if($journal['action']=="Ajout" or $journal['action']=="Décompte"){ echo ' de '; }
              else{ echo ' avec '; }
              echo $journal['glocks'] . ' Glocks';
              echo ' le ' . $journal['date_fr'];
              echo ' à ' . $journal['heure'];
              ?>
              </td>
            </tr>

            <?php
          }
          $reponse->closeCursor();
          ?>
        </table>
      </div>
    </article>

    <!-- SESSION ADMIN PRINTING -->

    <article class="item">
      <h2>Admin</h2>

      <p>
        La session admin permet d'inscrire et de désinscrire des usager.ère.s,
        ainsi que de procéder aux transactions de Glocks.
      </p>

      <?php
      if(!isset($_SESSION['admin'])){
        ?>

        <button id="connection_btn"><span class="unicode">&#128274;&#xFE0E;</span></button>

        <!-- boite modal de connection -->
        <div id="connection" class="modal">

          <!-- Modal content -->
          <div class="modal-content">

            <form action="connection.php" method="POST">
              <label>Mot de passe: </label>
              <input type="password" name="mdp">
              <button type="submit"><span class="unicode">&#10162;</span></button>
            </form>

          </div>
        </div>

        <script>
          var modal = document.getElementById("connection");
          var btn = document.getElementById("connection_btn");

          // When the user clicks on the button, open the modal
          btn.onclick = function() {
            modal.style.display = "flex";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
              modal.style.display = "none";
            }
          }
        </script>

        <?php
      }
      else{?>
        <button onclick="window.location.href='deconnection.php'"><span class="unicode">&#10005;</span></button>
        <?php
      }
      ?>
      </article>

      <!-- STATISTIQUES PRINTING -->

      <?php
      if (isset($_SESSION['admin'])){?>
        <article class="item full">

          <h2>Statistiques</h2>

          <div class="scroll-table-container">
            <table id="stat" class="data-table">
              <tr>
                <th>Jours</th>
                <th>Inscr.</th>
                <th>Ventes</th>
                <th>Entrées</th>
                <th>Total</th>
              </tr>

            <?php
              // entrées sorties
              $reponse = $bdd->query(
              'SELECT
                COUNT(CASE WHEN action="Inscription" THEN 1 ELSE NULL END) as inscriptions,
                SUM(CASE WHEN action="Décompte" THEN glocks ELSE 0 END) as ventes,
                SUM(CASE WHEN action="Ajout" THEN glocks ELSE 0 END) as entrées,
                SUM(CASE WHEN action="Ajout" OR action="Décompte" THEN glocks ELSE 0 END) as Total,
                COUNT(CASE WHEN action="Décompte"THEN 1 ELSE NULL END) as ventes_trans,
                COUNT(CASE WHEN action="Ajout" THEN 1 ELSE NULL END) as entrées_trans,
                COUNT(CASE WHEN action="Ajout" OR action="Décompte" THEN 1 ELSE NULL END) as total_trans,
                date,
                DATE_FORMAT(date, \'%Y/%m/%d\') day,
                DATE_FORMAT(date, \'%d/%m/%y\') day_fr
              FROM journal
              GROUP BY day
              ORDER BY day
              DESC');

              while ($stat = $reponse->fetch()){?>
                <tr>
                  <td class="left"> <?php echo $stat['day_fr'] ?> </td>
                  <td> <?php echo $stat['inscriptions'] ?> </td>
                  <td> <?php echo $stat['ventes'] ?>&#8370; (<?php echo $stat['ventes_trans'] ?> trans.) </td>
                  <td> <?php echo $stat['entrées'] ?>&#8370; (<?php echo $stat['entrées_trans'] ?> trans.)</td>
                  <td> <?php echo $stat['Total'] ?>&#8370; (<?php echo $stat['total_trans'] ?> trans.) </td>
                </tr>
                <?php
              }
            ?>
          </table>
        </div>

        <p>
          <b>ventes:</b> glocks retirés aux usager.ère.s pour achat. <br/>
          <b>entrées:</b> glocks donnés aux usager.ère.s pour don de matériel ou service. <br/>
          <b>trans.:</b> nombre de transaction.
        </p>

        </article>

        <?php
      }
      ?>


    <article class="item right full">
      <button onclick="location.href='/'"> <span class="unicode">&#10148;</span> </button>
    </article>

  </section>

  <footer class="footer">
      <div class="marquee">
        <h1 class="title">
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>&nbsp;
        </h1>
        <h1 class="title">
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>
          Glock <span class="unicode">&#9679;</span>&nbsp;
        </h1>
      </div>
  </footer>

  </body>

  </html>
