<!-- sidebar -->
<div id="sidebar" class="col-md-3">
  <div class="user">
    <img src="/wp-admin/images/inomata.jpeg" alt="猪股輝哉の画像">
    <h4 class="user_name">猪股輝哉</h4>
    <hr>
    <p class="Introduction">1999年11月17日 奈良県出身 2019年10月TECH::EXPERT受講→Web制作会社 現在2社目</p>
    <div class="user_contact">
      <a class="user_contact" href="#">プロフィール詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="#">コンサルタント依頼の詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="#">Web制作依頼の詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="#">ライティング依頼の詳細<i class="fa fa-angle-right"></i></a><br>
      <a class="user_contact" href="/teruBlog/contact">お問い合わせ<i class="fa fa-angle-right"></i></a>
    </div>
  </div>
  <div class="search">
    <div class="searchBox">
      <input type="text" name="s" id="s" placeholder="Search for..." class="form-control">
      <i class="fas fa-search"></i>
    </div>
  </div>
  <?php if (is_active_sidebar('sidebar')) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar('sidebar'); ?>
    </div>
  <?php endif; ?>
</div>