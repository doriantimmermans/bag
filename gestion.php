<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>BàG — gestion</title>
  <meta name="description" content="La Boite à Gants (BàG) est la récupérathèque de l'École de Recherche Graphique (ERG)">
  <link rel="shortcut icon" type="image/png" href="/assets/favicon3.png"/>

  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/gestion.css">

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

    <article class="item full">
      <button onclick="location.href='/'">
        <div><span class="unicode">&#127968;</span></div>
      </button>
    </article>

    <article class="item half">
      <h2>Horraires</h2>
      <form action="modify_infos.php" method="POST">
        <input type="hidden" name="filename" value="horraires">
        <textarea rows="5" cols="50" name="txt"><?php include('infos/horraires.txt'); ?></textarea>
        <button type="submit"><span class="unicode">&#8634;</span></button>
      </form>
    </article>

    <article class="item half">
      <h2>Équipe</h2>
      <form action="modify_infos.php" method="POST">
        <input type="hidden" name="filename" value="equipe">
        <textarea rows="5" cols="50" name="txt"><?php include('infos/equipe.txt'); ?></textarea>
        <button type="submit"><span class="unicode">&#8634;</span></button>
      </form>
    </article>

    <article class="item full">
      <p>
        <b>Note:</b> le caractère " | " est nécéssaire pour de créer une tabulation dans la mise en page du site. <br/>
        Il faut le laisser entre les jours | horraires et les noms | rôles dans les boites de textes ci-dessus.
      </p>
    </article>

    <hr/>

    <article class="item half">
      <h2>Publier un post sur le Blog</h2>
      <form action="blog_post.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" placeholder="Titre" required>
        <input type="file" name="image" required>
        <select name="type" required>
          <option value="Communication">Communication (news et update)</option>
          <option value="Évènement">Évènement (à venir)</option>
          <option value="Workshop">Workshop (pub où compte rendu)</option>
          <option value="Appel">Appel (à projet, participation, aide, etc)</option>
        </select>
        <textarea rows="10" cols="50" name="contenu" placeholder="Texte" required></textarea>
        <button type="submit" name="submit" ><span class="unicode">&#10548;</span></button>
      </form>
      <p>
        <b>Note:</b> chaque post est constitué d'un titre, une catégorie, un text de contenu et d'une image. <br/>
        <b>Attention:</b> ne pas uploader d'image trop grande afin de préserver l'espace de stockage sur le serveur.
      </p>
    </article>

    <article class="item half" id="modify">
      <h2>Modifier un post sur le Blog</h2>

      <?php
        //on récupère le post selectionné à modifier
        if(isset($_GET['mod_id'])){
          $tomodreq = $bdd -> prepare('SELECT *, id, DATE_FORMAT(date, \'%d/%m/%Y\') date_fr FROM blog WHERE id=:id');
          $tomodreq -> bindParam(':id', $_GET['mod_id'], PDO::PARAM_INT);
          $tomodreq -> execute();
          $tomod = $tomodreq->fetch();
        }
      ?>

      <form action="gestion.php" method="GET">
        <label>Selectionner le post à modifier</label>
        <select name="mod_id">
        <?php
          //on récupère tt les posts
          //et on montre leurs titres dans un select
          $posts = $bdd -> query('SELECT *, date FROM blog ORDER BY date DESC');
          while ($post = $posts->fetch()){
        ?>
          <option <?php if(isset($_GET['mod_id']) && $post['id']==$tomod['id']) echo 'selected' ?> value=<?php echo $post['id']; ?> >
             <?php echo $post['titre']?>
          </option>
          <?php
          }
        ?>
        </select>
        <button type="submit"><span class="unicode">&#8594;</span></button>
      </form>

      <?php
        //on affiche les input du post à modifier
        if(isset($_GET['mod_id'])){
          ?>

          <form action="blog_post.php" method="POST" enctype="multipart/form-data">
            <label>Modifier le post</label>
            <input type="hidden" name="id" value="<?php echo $tomod['id'];?>">
            <input type="hidden" name="img_url" value="<?php echo $tomod['img_url'];?>">
            <input type="text" name="titre" placeholder="Titre" value="<?php echo $tomod['titre'];?>" required>
            <input type="file" name="image">
            <select name="type" required>
              <option <?php if($tomod['type']=="Communication") echo 'selected' ?> value="Communication">Communication (news et update)</option>
              <option <?php if($tomod['type']=="Évènement") echo 'selected' ?> value="Évènement">Évènement (à venir)</option>
              <option <?php if($tomod['type']=="Workshop") echo 'selected' ?> value="Workshop">Workshop (pub où compte rendu)</option>
              <option <?php if($tomod['type']=="Appel") echo 'selected' ?> value="Appel">Appel (à projet, participation, aide, etc)</option>
            </select>
            <textarea rows="10" cols="50" name="contenu" required><?php echo $tomod['contenu'];?></textarea>
            <div class="one-line-flex">
              <div><button type="submit" name="modify"><span class="unicode">&#8634;</span></button></div>
              <div class="right"><button type="submit" name="delete"><span class="unicode">&#x1F5D1;</span></button></div>
            </div>
          </form>

          <p>
            <b>Note:</b> ne pas ré-importer de nouvelle image si vous ne désirez pas la modifier.
          </p>
          <?php
          }
      ?>
    </article>

    <script>
      // scroll to modify section if selected
      var href = window.location.href;
      var modify = document.getElementById('modify');
      if(href.includes("mod_id")){
        modify.scrollIntoView();
      }
    </script>

    <!-- <article class="item full right">
      <button onclick="location.href='/'">
        <div><span class="unicode">&#127968;</span></div>
      </button>
    </article> -->

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
