<?php breadcrumb(); ?>
<?php
$post = $wp_query->post;
if (in_category('post')) {
  include(TEMPLATEPATH . '/teruBlog/category/post');
} elseif (in_category('skill')) {
  include(TEMPLATEPATH . '/teruBlog/category/skill');
} elseif (in_category('travel')) {
  include(TEMPLATEPATH . '/teruBlog/category/travel');
} else {
  include(TEMPLATEPATH . '/index.php');
}
