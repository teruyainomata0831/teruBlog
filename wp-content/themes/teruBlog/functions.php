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
	QTags.addButton('check', 'check', '<div class="sgb-heading__inner sgb-heading--type1 with-icon" style="background-color:transparent;/* border-color:transparent; */font-size:1.2em;"><i class="fa fa-check" style="color:#5ba9f7"></i>', '</div>');
	QTags.addButton('ymarker', 'ymarker', '<span class="ymarker">', '</span>');
	QTags.addButton('rmarker', 'rmarker', '<span class="rmarker">', '</span>');
	</script>
	<?php
}
add_action('admin_print_footer_scripts', 'add_my_quicktag');