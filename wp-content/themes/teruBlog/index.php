<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>teruBlog</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/mystyle.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <div class="header_in">
      <div class="headerLeft">
        <div class="headertxt">
          <a>teruBlog</a>
        </div>
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">Dropdown<span class="caret"></span></a></li>
        </ul>
      </div>
      <ul class="headerRight">
        <li><a href="https://www.instagram.com/teruyainomata/"><i class="fab fa-instagram">Instagram</i></a></li>
        <li><a href="https://twitter.com/okuman1117"><i class="fab fa-twitter-square">twitter</i></a></li>
      </ul>
      <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
          <!-- ここに中身を入れる -->

        </div>
      </div>
    </div>
  </header>
  <footer>
    <p> Copyright - teruya inomata, 2020 All Rights Reserved.</p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>