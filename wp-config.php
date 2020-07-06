<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'teruBlog' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'root' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'localhost' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>Reda#~,mpsHi<C.L59a@/ 0Jk^)@m?k`{1[tb#9]y%|&k{6&X5z1pn~02sGeSUV' );
define( 'SECURE_AUTH_KEY',  '^f+8Y3oj{.mC1I#Mc1VfJ]@/`&}oBkW|/bCxsO$)bF[#!XxU{>)oFaJf]8S-.f}8' );
define( 'LOGGED_IN_KEY',    'MQS#9W@)-h^2aOy~Lq;M[)64=dDn}K>p-#L]l`q%5$H/TftcZ x#D^yYSw<zaqXX' );
define( 'NONCE_KEY',        'L:i7u=S1UuJ.FszwdAA]$mFxLE}jo>Tm*Yz,AXATjMvBWf^,,|kxf}f-4M&wgk#I' );
define( 'AUTH_SALT',        'ofo8I~N[KqFsgbUl`lUk6/Rl2S57$mz;2.A|3V=U+12FNb`*e O78Ai-lz&fD89>' );
define( 'SECURE_AUTH_SALT', '*(jTf2.HTNac( {Y.1TdO^kPrhd VuAg6yREsk.[+Pi)2oz7)wdQ/i[%b.*Ib.}1' );
define( 'LOGGED_IN_SALT',   'ro`rFPYLf7I^9NF,z0eB#Uu;-o&r.=Ww,6:nWOEGg3s!Sz-r!*bNW@iD9Ts*u}l0' );
define( 'NONCE_SALT',       'ZAI2}-ZAc7wVwJ~*9ayL~{Bm/7L3iCZ$/kt8PS@gOuJ<KAr(WVPx7&(Bj{<Sxs!Y' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
