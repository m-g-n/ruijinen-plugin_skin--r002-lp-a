<?php
/**
 * Plugin name: 類人猿 LPパターン向けスキン
 * Description: 類人猿LPパターンに合ったSnow Monkeyスキンです
 * Version: 1.8.0
 * Tested up to: 6.1.1
 * Requires at least: 6.1
 * Requires PHP: 5.6
 * Author: mgn Inc.,
 * Author URI: https://rui-jin-en.com/
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ruijinen-skin-r002-lp
 *
 * @package ruijinen-skin-r002-lp
 * @author mgn
 * @license GPL-2.0+
 */

namespace Ruijinen\Skin\R002_LP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * declaration constant.
 */
define( 'RJE_SKIN_R002_LP_A_KEY', 'RJE_SKIN_R002LP_A' );  //このプラグインのKey.
define( 'RJE_SKIN_R002_LP_A_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) . '/' );  //このプラグインのURL.
define( 'RJE_SKIN_R002_LP_A_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/' ); //このプラグインのパス.
define( 'RJE_SKIN_R002_LP_A_BASENAME', plugin_basename( __FILE__ ) ); //このプラグインのベースネーム.
define( 'RJE_SKIN_R002_LP_A_TEXTDOMAIN', 'ruijinen-skin-r002-lp-a' ); //テキストドメイン名.

/**
 * include files.
 */
require_once(RJE_SKIN_R002_LP_A_PATH . 'vendor/autoload.php'); //アップデート用composer.

//各処理用のクラスを読み込む
foreach (glob(RJE_SKIN_R002_LP_A_PATH.'App/**/*.php') as $filename) {
	require_once $filename;
}

/**
 * 初期設定.
 */
class Bootstrap {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'bootstrap' ] );
		add_action( 'init', [ $this, 'load_textdomain' ] );
	}

	/**
	 * Bootstrap.
	 */
	public function bootstrap() {
		new App\Setup\AutoUpdate(); //自動更新チェック
		new App\Setup\InPluginUpdateMessage(); //更新アラートメッセージに追加でメッセージを表示

		//アクティベートチェックを行い問題がある場合はメッセージを出し離脱する.
		$activate_check = new App\Setup\ActivateCheck();
		if ( !empty( $activate_check->messages ) ) {
			add_action('admin_notices', array( $activate_check,'make_alert_message'));
			return;
		}
		add_action( 'after_setup_theme', [ $this, 'themes_customize' ] );
		new App\Setup\Assets();
	}

	/**
	 * Load Textdomain.
	 */
	public function load_textdomain() {
		new App\Setup\TextDomain();
	}

	/**
	 * Snow Monkeyテーマのカスタマイズ.
	 */
	public function themes_customize() {
		new App\ThemesCustomize\Archives(); //投稿アーカイブ関連のカスタマイズ.
		new App\ThemesCustomize\Single(); //singleページ関連のカスタマイズ.
		new App\ThemesCustomize\EntryHeader(); //コンテンツヘッダーのカスタマイズ.
	}
}

new \Ruijinen\Skin\R002_LP\Bootstrap();
