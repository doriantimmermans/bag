<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>BàG — blog</title>
  <meta name="description" content="La Boite à Gants (BàG) est la récupérathèque de l'École de Recherche Graphique (ERG)">
  <link rel="shortcut icon" type="image/png" href="/assets/favicon3.png"/>

  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/blog.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

  <?php
    session_start();

    require('config.php');
  ?>

  <header class="header">
      <div class="marquee">
        <h1 class="title">
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>&nbsp;
        </h1>
        <h1 class="title">
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>&nbsp;
        </h1>
      </div>
      <h3>
        La BàG organise des évènements, des workshops <br/>
        et crée des liens entre les gens
      </h3>
  </header>

  <section class="container flex">

    <article class="item full">
      <div class="one-line-flex">
        <div><button onclick="location.href='/'"><div class="rot"><span class="unicode">&#10148;</span></div></button></div>
        <div class="right"><button onclick="window.open('https://www.instagram.com/boiteagants/')"> <span class="unicode">&#128247;&#xFE0E;</span> </button></div>
      </div>
    </article>

    <?php
      $count = $bdd->query("SELECT * FROM blog");
      $post_number = $count->rowCount();

      // get the page
      if(isset($_GET['page'])){
        $page = htmlspecialchars($_GET['page']);
      }
      else{
        $page = 1;
      }
      $post_per_page = 3;
      $start = ($page-1) * $post_per_page;
      $end = $start + $post_per_page;
      // echo $start . ',  ' . $end;
      $page_number = ceil($post_number / $post_per_page);
    ?>

    <hr>

    <article class="item full">
      <div class="one-line-flex same-size">
        <h3 id="page_number">Page <?php echo $page; ?></h3>
        <?php
        if($page > 1){
          $previous_page = $page - 1;
          ?>
            <div class="center">
              <button onclick="location.href='<?php echo '/blog/' . $previous_page ; ?>'">
                <span class="unicode">&#11014;&#xFE0E;</span>
              </button>
            </div>
          <?php
        }
        ?>
        <div></div>
      </div>
    </article>


    <?php
    $posts = $bdd -> prepare('SELECT *, date, DATE_FORMAT(date, \'%d/%m/%Y\') date_fr FROM blog ORDER BY date DESC LIMIT :strt, :nd;');
    $posts -> bindParam(':strt', $start, PDO::PARAM_INT);
    $posts -> bindParam(':nd', $end, PDO::PARAM_INT);
    $posts -> execute();

    while ($post = $posts->fetch()){?>

      <article class="item full">
        <div class="blog-post">
          <h2><?php echo $post['titre'];?></h2>
          <div class="content">
            <div class="image">
              <img src="<?php echo '/' . $post['img_url'] ;?>">
            </div>
            <div class="texte">
              <h4><?php echo $post['type'];?></h4>
              <p>
                <?php
                  $text = nl2br($post['contenu']);
                  echo $text;
                ?>
              </p>
            </div>
          </div>
          <p class='date'><?php echo $post['date_fr'];?></p>
        </div>
      </article>

      <?php
      }
    ?>

    <?php
    if($page < $page_number){
      $next_page = $page + 1;
      ?>
        <article class="item center full">
          <button onclick="location.href='<?php echo '/blog/' . $next_page ; ?>'">
            <span class="unicode">&#11015;</span>
          </button>
        </article>
      <?php
    }
    ?>

    <hr>

    <article class="item right full">
      <button onclick="location.href='/'"> <span class="unicode">&#10148;&#xFE0E;</span> </button>
    </article>

  </section>

  <footer class="footer">
      <div class="marquee">
        <h1 class="title">
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>&nbsp;
        </h1>
        <h1 class="title">
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>
          Blog <span class="unicode">&#10036;</span>&nbsp;
        </h1>
      </div>
  </footer>

</body>

</html>
