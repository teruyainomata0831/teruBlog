<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>terublog</title>
  <link rel="shortcut icon" href="wp-content/themes/twentynineteen/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/mystyle.css">
  <?php wp_head(); ?>
</head>

<body>
  <?php get_header(); ?>
  <section id="content">
    <div id="content-wrap" class="container" style="width: 70%">
      <div id="main" class="col-md-9">
        <div class="time">
          <?php the_time('Y/m/d'); ?>
        </div>
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
        ?>
            <h1><?php the_title(); ?></h1>
            <section>
              <?php the_content(); ?>
            </section>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="error">
            <p>お探しの記事は見つかりませんでした。</p>
          </div>
        <?php
        endif;
        ?>
        <div class="button">
          <a href="#">READ MORE</a>
        </div>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </section>
  <aside>
    <div class="footerBox">
      <ul><?php dynamic_sidebar('フッターウィジェット１'); ?></ul>
      <ul><?php dynamic_sidebar('フッターウィジェット２'); ?></ul>
      <ul><?php dynamic_sidebar('フッターウィジェット３'); ?></ul>
    </div>
  </aside>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>