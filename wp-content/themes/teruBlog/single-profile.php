<!-- profileが表示される -->
<?php get_header(); ?>
<section id="content">
  <div id="content-wrap" class="container" style="width: 70%">
    <div id="main" class="col-md-9">
    <?php breadcrumb(); ?>
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
      ?>
          <div class="time">
            <?php the_time('Y/m/d'); ?>
          </div>
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