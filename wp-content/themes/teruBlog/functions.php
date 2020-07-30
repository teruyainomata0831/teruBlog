<?php

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init()
{

	register_sidebar(array(
		'name' => 'register_sideber',
		'id' => 'sidebar',
		'description' => 'サイドバーウィジェット',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	));
	register_sidebar(array('name' => 'フッターウィジェット１'));
	register_sidebar(array('name' => 'フッターウィジェット２'));
	register_sidebar(array('name' => 'フッターウィジェット３'));

	register_post_type('profile', [
		'labels' => [
			'name' => 'プロフィール',
		],
		'public' => true,
		'has_archive' => false,
		'hierarchival' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-businessman'
	]);
	register_post_type('web', [
		'labels' => [
			'name' => 'Web制作依頼',
		],
		'public' => true,
		'has_archive' => false,
		'hierarchival' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-welcome-view-site'
	]);
	register_post_type('writing', [
		'labels' => [
			'name' => 'ライティング依頼',
		],
		'public' => true,
		'has_archive' => false,
		'hierarchival' => false,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-welcome-write-blog'
	]);
}
add_action('widgets_init', 'arphabet_widgets_init');

function register_my_menus()
{
	register_nav_menus(array(
		'main-menu' => 'Main Menu',
		'header-menu' => 'Header Menu',
		'footer-menu'  => 'Footer Menu',
	));
}
add_action('after_setup_theme', 'register_my_menus');

function get_youngest_cat( $categories ){
	global $post;
	if(count( $categories ) == 1 ){
		$youngest = $categories[0];
	}
	else{
		$count = 0;
		foreach( $categories as $category ){
			$children = get_term_children( $category -> term_id, 'category' );
			if($children){
				if ( $count < count( $children ) ){
					$count = count( $children );
					$lot_children = $children;
					foreach( $lot_children as $child ){
						if( in_category( $child, $post -> ID ) ){
							$youngest = get_category( $child );
						}
					}
				}
			}
			else{
				$youngest = $category;
			}
		}
	}
	return $youngest;
}

function get_youngest_tax( $taxes, $mytaxonomy ){
	global $post;
	if( count( $taxes ) == 1 ){
		$youngest = $taxes[ key( $taxes )];
	}
	else{
		$count = 0;
		foreach( $taxes as $tax ){
			$children = get_term_children( $tax -> term_id, $mytaxonomy );
			if($children){
				if ( $count < count($children) ){
					$count = count($children);
					$lot_children = $children;
					foreach($lot_children as $child){
						if( is_object_in_term( $post -> ID, $mytaxonomy ) ){
							$youngest = get_term($child, $mytaxonomy);
						}
					}
				}
			}
			else{
				$youngest = $tax;
			}
		}
	}
	return $youngest;
}

add_theme_support('post-thumbnails');
add_image_size('thumb100',100,100,true);

function add_my_quicktag() {
	?>
	<script type="text/javascript">
	QTags.addButton('myh2', 'myh2', '<h2 class="myh2">', '</h2>');
	QTags.addButton('myh3', 'myh3', '<h3 class="myh3">', '</h3>');
	QTags.addButton('myh4', 'myh4', '<h4 class="myh4">', '</h4>');
	QTags.addButton('waku-blue-dashed', 'waku-blue-dashed', '<ul class="waku-blue-dashed">', '</ul>');
	QTags.addButton('waku-gray-border', 'waku-gray-border', '<div class="waku-gray-border">', '</div>');
	QTags.addButton('important', 'important', '<span class="important">', '</span>');
	QTags.addButton('ymarker', 'ymarker', '<span class="ymarker">', '</span>');
	QTags.addButton('rmarker', 'rmarker', '<span class="rmarker">', '</span>');
	</script>
	<?php
}
add_action('admin_print_footer_scripts', 'add_my_quicktag');

function mytheme_breadcrumb() {
	//HOME>と表示
	$sep = '>';
	echo '<li><a href="'.get_bloginfo('url').'" >Home</a></li>';
	echo $sep;
 
	//投稿記事ページとカテゴリーページでの、カテゴリーの階層を表示
	$cats = '';
	$cat_id = '';
	if ( is_single() ) {
		$cats = get_the_category();
		if( isset($cats[0]->term_id) ) $cat_id = $cats[0]->term_id;
	}
	else if ( is_category() ) {
		$cats = get_queried_object();
		$cat_id = $cats->parent;
	}
	$cat_list = array();
	while ($cat_id != 0){
		$cat = get_category( $cat_id );
		$cat_link = get_category_link( $cat_id );
		array_unshift( $cat_list, '<a href="'.$cat_link.'">'.$cat->name.'</a>' );
		$cat_id = $cat->parent;
	}
	foreach($cat_list as $value){
		echo '<li>'.$value.'</li>';
		echo $sep;
	}
 
	//現在のページ名を表示
	if ( is_singular() ) {
		if ( is_attachment() ) {
			previous_post_link( '<li>%link</li>' );
			echo $sep;
		}
		the_title( '<li>', '</li>' );
	}
	else if( is_archive() ) the_archive_title( '<li>', '</li>' );
	else if( is_search() ) echo '<li>検索 : '.get_search_query().'</li>';
	else if( is_404() ) echo '<li>ページが見つかりません</li>';
}