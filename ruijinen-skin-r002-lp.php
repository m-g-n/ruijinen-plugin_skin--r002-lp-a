<?php
/**
 * Plugin name: 類人猿 LPパターン向けスキン
 * Description: 類人猿LPパターンに合ったSnow Monkeyスキンです
 * Version: 0.0.0.8
 * Tested up to: 5.8
 * Requires at least: 5.8
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

//TODO: 各ファイルの翻訳を作る

namespace Ruijinen\Skin\R002_LP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * declaration constant.
 */
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
		add_action( 'after_setup_theme', [ $this, 'themes_customize' ] );
	}

	/**
	 * Bootstrap.
	 */
	public function bootstrap() {
		//クラスオブジェクト作成
		new App\Setup\ActivatePlugin();
		new App\Setup\AutoUpdate();
		new App\Setup\TextDomain();
		new App\Setup\Assets();
		// new App\Setup\AdminMenu();
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