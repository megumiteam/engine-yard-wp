<?php
/**
 * The base configurations of the WordPress.
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - こちらの情報はホスティング先から入手してください。 ** //
$database_yml = dirname(__FILE__) .'/config/database.yml';
if (file_exists($database_yml)) {
	$database_yml = file_get_contents($database_yml);
	if (preg_match_all('#(database|username|password|host):[\s]*[\'"]([^\'"]+)[\'"]#i', $database_yml, $matched, PREG_SET_ORDER)) {
		foreach ($matched as $match) {
			switch (strtolower($match[1])){
			case 'database': define('DB_NAME', $match[2]); break;
			case 'username': define('DB_USER', $match[2]); break;
			case 'password': define('DB_PASSWORD', $match[2]); break;
			case 'host':     define('DB_HOST', $match[2]); break;
			}
		}
	}
	unset($matched);
}

/** データベースのテーブルを作成する際のデータベースのキャラクターセット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3>D+0QUpl%Dc-B*Dk##k-|<_|](9?*_YrmL9qorkSwf-,oX6Wqw;JZj;IE2u|Yz-');
define('SECURE_AUTH_KEY',  '%9f*V-~;D|R#Uo3ySD-=^Ff;O>`6/R[>t%Sp?#;7THK{J0s5K9iWD!1I;@-e2@9P');
define('LOGGED_IN_KEY',    '>Tac1?)g@-xGY*xj?pB9|Q^ ]0@k_jP$+mutQ%:aeT/6szV{,iU]pKxN8c1HQ8XV');
define('NONCE_KEY',        'oa|$_m}$i-X?+MSjwFauud<SE+|^a5h81Nqil8]0L [:= UOI(y&s0{(oJ!ev1Yp');
define('AUTH_SALT',        ' &IT2G>.;fkq!~6sD_$O[+6/} KPviFU8_#f^#;i8#u.A}mDo.dE%Rcgna4-c.,r');
define('SECURE_AUTH_SALT', '`x8W(:1.o+>%$kBP3)$0G)@&yW%+|>uG7leM(sM?0A,5-WwUv;)g^z2#[u7O)g@D');
define('LOGGED_IN_SALT',   'Q6 $A9))O-GGbY)n]Cc^i<1-+%~B-!N-R??f$G_}kl{(>Vt+71N9!nm<WhW_v0*G');
define('NONCE_SALT',       'TQ9Ft3.QCu>}k<VuUHP5Y;g q-LTJ+dPDZ$U+Z(RF[uVsXurg+(3|H)fA<>|*!l#');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * ローカル言語 - このパッケージでは初期値として 'ja' (日本語 UTF-8) が設定されています。
 *
 * WordPress のローカル言語を設定します。設定した言語に対応する MO ファイルが
 * wp-content/languages にインストールされている必要があります。例えば de_DE.mo を
 * wp-content/languages にインストールし WPLANG を 'de_DE' に設定することでドイツ語がサポートされます。
 */
define('WPLANG', 'ja');

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
