<!-- ヘッダー -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社長blog</title>
  <link rel="shortcut icon" href="wp-content/themes/teruBlog/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/mystyle.css">
  <script data-ad-client="ca-pub-5469864644774359" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <div class="header_in">
      <div class="headerLeft">
        <div class="headertxt">
          <a href="/">社長blog</a>
        </div>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/category/post">Post</a>
          </li>
          <li class="skill"><a href="/category/skill">Skill</a>
            <div id="dropdown">
              <?php
              wp_nav_menu(array(
                'theme_location' => 'header-menu'
              ));
              ?>
            </div>
          </li>
          <li><a href="/category/travel">Travel</a></li>
          <li><a href="/contact">Contact</a></li>
        </ul>
      </div>
      <ul class="headerRight">
        <li><a href="https://www.instagram.com/teruyainomata/"><i class="fab fa-instagram"> Instagram</i></a></li>
        <li><a href="https://twitter.com/okuman1117"><i class="fab fa-twitter-square"> twitter</i></a></li>
      </ul>
      <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
          <a href="/"><i class="fas fa-home"></i>Home</a><br>
          <a href="/category/post"><i class="fas fa-blog"></i>Post</a><br>
          <a href="/category/skill"><i class="fas fa-code"></i>Skill</a><br>
          <a href="/category/travel"><i class="fas fa-globe-europe"></i>Travel</a><br>
          <a href="/contact"><i class="fas fa-mail-bulk"></i>Contact</a>
        </div>
      </div>
    </div>
  </header>