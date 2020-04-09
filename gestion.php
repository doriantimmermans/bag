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

    <article class="item half" id="modify_info">
      <h2>Modifier les Infos</h2>

      <?php
        $infos = ["horraires" => "Horraires",
                  "equipe" => "Équipe",
                  "encadrantes" => "Encadrant.e.s",
                  "partenariats" => "Partenariats"];
      ?>

      <form action="gestion.php" method="GET">
        <label>Selectionner les infos à modifier</label>
        <select name="info_name">
          <?php
            foreach ($infos as $info_name => $info_text) {
              ?>
              <option <?php if(isset($_GET['info_name']) && $_GET['info_name']==$info_name) echo 'selected' ?> value="<?php echo $info_name; ?>" >
                <?php echo $info_text; ?>
              </option>
            <?php
            }
            ?>
        </select>
        <button type="submit"><span class="unicode">&#8594;</span></button>
      </form>

      <?php
      if(isset($_GET['info_name'])){
        ?>
        <form action="modify_infos.php" method="POST">
          <input type="hidden" name="filename" value="<?php echo $_GET['info_name']; ?>">
          <textarea rows="5" cols="50" name="txt"><?php include('infos/' . $_GET['info_name'] . '.txt'); ?></textarea>
          <button type="submit"><span class="unicode">&#8634;</span></button>
        </form>
        <?php
        }
      ?>

      <p>
        <b>Note:</b> le caractère " | " est nécéssaire pour de créer une tabulation ou des liens dans la mise en page du site. <br/>
        Il faut le laisser entre les jours | horraires, les noms | rôles et les partenariats | sites web, dans les boites de textes ci-dessus.
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

    <article class="item half" id="modify_blog">
      <h2>Modifier un post sur le Blog</h2>

      <?php
        //on récupère le post selectionné à modifier
        if(isset($_GET['post_id'])){
          $tomodreq = $bdd -> prepare('SELECT *, id, DATE_FORMAT(date, \'%d/%m/%Y\') date_fr FROM blog WHERE id=:id');
          $tomodreq -> bindParam(':id', $_GET['post_id'], PDO::PARAM_INT);
          $tomodreq -> execute();
          $tomod = $tomodreq->fetch();
        }
      ?>

      <form action="gestion.php" method="GET">
        <label>Selectionner le post à modifier</label>
        <select name="post_id">
        <?php
          //on récupère tt les posts
          //et on montre leurs titres dans un select
          $posts = $bdd -> query('SELECT *, date FROM blog ORDER BY date DESC');
          while ($post = $posts->fetch()){
        ?>
          <option <?php if(isset($_GET['post_id']) && $post['id']==$tomod['id']) echo 'selected' ?> value=<?php echo $post['id']; ?> >
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
        if(isset($_GET['post_id'])){
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
      var href = window.location.href;

      // scroll to modify info section if selected
      var info = document.getElementById('modify_info');
      if(href.includes("info_name")){
        info.scrollIntoView();
      }

      // scroll to modify blog section if selected
      var blog = document.getElementById('modify_blog');
      if(href.includes("post_id")){
        blog.scrollIntoView();
      }
    </script>

    <article class="item full right">
      <button onclick="location.href='/'">
        <div><span class="unicode">&#127968;</span></div>
      </button>
    </article>

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
