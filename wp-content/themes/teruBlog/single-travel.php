<!-- travelの投稿が表示される -->
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
      <div class="stepback">
        <?php if (get_previous_post()) : ?>
          <?php previous_post_link('%link', '&laquo; 前の記事へ', true); ?>
        <?php endif; ?>

        <?php if (get_next_post()) : ?>
          <?php next_post_link('%link', '次の記事へ &raquo;', true); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>