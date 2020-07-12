<?php
$post = $wp_query->post;
if (in_category('post')) {
  include(TEMPLATEPATH . '/single-post.php');
} elseif (in_category('skill')) {
  include(TEMPLATEPATH . '/single-skill.php');
} elseif (in_category('travel')) {
  include(TEMPLATEPATH . '/single-travel.php');
} else {
  include(TEMPLATEPATH . '/index.php');
}
