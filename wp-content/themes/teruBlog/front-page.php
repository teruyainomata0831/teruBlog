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
  <?php include('wp-content/themes/teruBlog/page.php'); ?>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>