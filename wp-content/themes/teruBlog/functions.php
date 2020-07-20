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

////////////////////////////////////
// 記事ページにカスタムフィールド追加
////////////////////////////////////
add_action('admin_menu', 'add_custom_fields');
function add_custom_fields() {
add_meta_box( 'seo_setting', 'SEO対策', 'seo_custom_fields', 'post', 'normal', 'high');
add_meta_box( 'seo_setting', 'SEO対策', 'seo_custom_fields', 'page', 'normal', 'high');
}

function seo_custom_fields() {
global $post;
$keywords = get_post_meta($post->ID,'keywords',true);
$description = get_post_meta($post->ID,'description',true);
$noindex = get_post_meta($post->ID,'noindex',true);
 if( $noindex == 1 ) {
 $noindex_check = "checked";
 } else {
 $noindex_check = "/";
 }
$nofollow = get_post_meta($post->ID,'nofollow',true);
 if( $nofollow == 1 ) {
 $nofollow_check = "checked";
 } else {
 $nofollow_check = "/";
 }

echo '<div style="margin:20px 0;">
 <span style="float:left;width:160px;margin-right:20px;">キーワード（コンマ区切り）</span>
 <input type="text" name="keywords" value="'.esc_html($keywords).'" size="60" />
 <div style="clear:both;"></div>
 </div>';

echo '<div style="margin:20px 0;">
 <span style="float:left;width:160px;margin-right:20px;">ページの説明（最大120文字ほど）※何も入力しない場合、先頭の120文字が自動で使われます。</span>
 <textarea name="description" id="description" cols="60" rows="4" />'.esc_html($description).'</textarea>
 <div style="clear:both;"></div>
 </div>';

echo '<div style="margin:20px 0;">
 <span style="float:left;width:160px;margin-right:20px;">NOINDEX（検索結果への表示をブロックします）</span>
 <input type="checkbox" name="noindex" value="1" ' . $noindex_check . '>
 <div style="clear:both;"></div>
 </div>';

echo '<div style="margin:20px 0;">
 <span style="float:left;width:160px;margin-right:20px;">NOFOLLOW（リンクを除外します）ほとんどの場合、チェックを入れる必要はありません。</span>
 <input type="checkbox" name="nofollow" value="1" ' . $nofollow_check . '>
 <div style="clear:both;"></div>
 </div>';
}

////////////////////////////////////
// カスタムフィールドの値を保存
////////////////////////////////////
function save_custom_fields( $post_id ) {
if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
if(isset($_POST['action']) && $_POST['action'] == 'inline-save') return $post_id;
if(!empty($_POST['keywords']))
update_post_meta($post_id, 'keywords', $_POST['keywords'] );
else delete_post_meta($post_id, 'keywords');
if(!empty($_POST['description']))
update_post_meta($post_id, 'description', $_POST['description'] );
else delete_post_meta($post_id, 'description');
if(!empty($_POST['noindex']))
update_post_meta($post_id, 'noindex', $_POST['noindex'] );
else delete_post_meta($post_id, 'noindex');
if(!empty($_POST['nofollow']))
update_post_meta($post_id, 'nofollow', $_POST['nofollow'] );
else delete_post_meta($post_id, 'nofollow');
}
function transition_post_status_4536($new_status, $old_status, $post) {
 if (($old_status == 'auto-draft'
 || $old_status == 'draft'
 || $old_status == 'pending'
 || $old_status == 'future')
 && $new_status == 'publish') {
 return $post;
 } else {
 add_action('save_post', 'save_custom_fields');
 }
}
add_action('transition_post_status', 'transition_post_status_4536', 10, 3);

////////////////////////////////////
// ディスクリプション
////////////////////////////////////

//カスタムフィールドで設定したディスクリプション
function custom_description() {
 $description = get_post_meta(get_the_ID(), 'description', true);
 $description = strip_tags(str_replace(array("\r\n", "\r", "\n"), '', $description));//改行削除
 return mb_strimwidth($description, 0, 240, "...", "utf-8");//多すぎても意味がないので先頭の120文字を取得
}

//先頭の120文字をディスクリプションとして自動で取得
function auto_description() {
 $post_content = get_post(get_the_ID())->post_content;
 $post_content = esc_html(strip_tags(str_replace(array("\r\n", "\r", "\n"), '', $post_content)));
 return mb_strimwidth($post_content, 0, 240, "...", "utf-8");
}

//条件によって読み込むディスクリプションを変更
function description_switch() {
 if ( custom_description() ) {
 $description = custom_description();
 } else {
 $description = auto_description();
 }
 return $description;
}

//ディスクリプション設定
function description() {
if ( is_singular() ) { // 記事ページ
 $get_description = description_switch();
} elseif (is_category()) { // カテゴリーページ
 if (term_description()) { //カテゴリーの説明を入力している場合
 $get_description = term_description();
 } else { //カテゴリーの説明がない場合
 $get_description = single_cat_title('', false)."の記事一覧";
 }
} elseif (is_tag()) { // タグページ
 if (term_description()) { //タグの説明を入力している場合
 $get_description = term_description();
 } else { //タグの説明がない場合
 $get_description = single_tag_title('', false)."の記事一覧";
 }
} else { // その他ページ
 $get_description = get_bloginfo('description');
}
 return $get_description;
}

////////////////////////////////////
// 設定の反映
////////////////////////////////////
function custom_seo_meta() {
// カスタムフィールドの設定値の読み込み
$custom = get_post_custom();
if(!empty( $custom['keywords'][0])) {
 $keywords = $custom['keywords'][0];
}
if(!empty( $custom['noindex'][0])) {
 $noindex = $custom['noindex'][0];
}
if(!empty( $custom['nofollow'][0])) {
 $nofollow = $custom['nofollow'][0];
}

//noindexとnofollow設定
if ( $noindex && $nofollow ) { // 両方チェックしている場合
 echo '<meta name="robots" content="noindex,nofollow">';
} elseif ( $noindex && !$nofollow) { // noindexだけチェックしている場合
 echo '<meta name="robots" content="noindex,follow">';
} elseif ( $nofollow && !$noindex ) { // nofollowだけチェックしている場合
 echo '<meta name="robots" content="nofollow">';
}

//キーワードとディスクリプション設定
if ( is_singular() ) { // 記事ページ
 if (!empty($keywords)) echo '<meta name="keywords" content="'.$keywords.'">';
}
echo '<meta name="description" content="'.description().'">';

}