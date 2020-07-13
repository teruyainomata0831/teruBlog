<!-- sidebar -->
<div id="sidebar" class="col-md-3">
  <div class="user">
    <img>
    <h4 class="user_name">猪股輝哉</h4>
    <hr>
    <p class="Introduction">1999年11月17日 奈良県出身 2019年10月TECH::EXPERT受講→Web制作会社 現在2社目</p>
    <div class="user_contact">
      <a class="user_contact" href="/teruBlog/profile/profile-details/">プロフィール詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="/teruBlog/web/web_request/">Web制作依頼の詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="/teruBlog/writing/writing_request/">ライティング依頼の詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="/teruBlog/contact">お問い合わせ<i class="fa fa-angle-right"></i></a>
    </div>
  </div>
  <div class="search">
    <div class="searchBox">
      <?php get_search_form(); ?>
    </div>
  </div>
  <?php if (is_active_sidebar('sidebar')) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar('sidebar'); ?>
    </div>
  <?php endif; ?>
</div>