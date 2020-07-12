<?php
$post = $wp_query->post;
if (in_category('travel')) {
  include(TEMPLATEPATH . '/single-travel.php');
} elseif (in_category('skill')) {
  include(TEMPLATEPATH . '/single-skill.php');
} else {
  include(TEMPLATEPATH . '/index.php');
}
