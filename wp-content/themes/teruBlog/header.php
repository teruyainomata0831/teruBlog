<!-- ヘッダー -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>terublog</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/mystyle.css">
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
          <li><a href="/teruBlog">Home</a></li>
          <li><a href="/teruBlog/category/post">Post</a></li>
          <ul class="menu">
            <li><a href="/teruBlog/category/skill">Skill</a>
              <ul class="menu__second-level">
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">Javascript</a></li>
                <li><a href="#">WordPress</a></li>
              </ul>
            </li>
            <li><a href="/teruBlog/category/travel">Travel</a></li>
            <li><a href="/teruBlog/contact">Contact</a></li>
            <!-- <li><a href="">Dropdown<span class="caret"></span></a></li> -->
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
          <a href="/teruBlog"><i class="fas fa-home"></i>Home</a><br>
          <a href="/teruBlog/category/post"><i class="fas fa-blog"></i>Post</a><br>
          <a href="/teruBlog/category/skill"><i class="fas fa-code"></i>Skill</a><br>
          <a href="/teruBlog/category/travel"><i class="fas fa-globe-europe"></i>Travel</a><br>
          <a href="/teruBlog/contact"><i class="fas fa-mail-bulk"></i>Contact</a>
        </div>
      </div>
    </div>
  </header>