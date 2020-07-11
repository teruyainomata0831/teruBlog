<!-- Homeの内容が表示される -->
<?php get_header(); ?>
<aside>
  <div class="footerBox">
    <ul><?php dynamic_sidebar('フッターウィジェット１'); ?></ul>
    <ul><?php dynamic_sidebar('フッターウィジェット２'); ?></ul>
    <ul><?php dynamic_sidebar('フッターウィジェット３'); ?></ul>
  </div>
</aside>
<?php get_footer(); ?>