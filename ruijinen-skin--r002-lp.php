<?php
/**
 * Plugin name: 類人猿 LPパターン向けスキン
 * Description: 類人猿LPパターンに合ったSnow Monkeyスキンです
 * Version: 0.0.0.1
 * Tested up to: 5.8
 * Requires at least: 5.8
 * Requires PHP: 5.6
 * Author: mgn Inc.,
 * Author URI: https://rui-jin-en.com/
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ruijinen-skin--r002-lp
 * 
 * @package ruijinen-skin--r002-lp
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
define( 'RJE_SKIN_R002_LP_URL', untrailingslashit( plugins_url( '', __FILE__ ) ) . '/' );  //このプラグインのURL.
define( 'RJE_SKIN_R002_LP_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/' ); //このプラグインのパス.
define( 'RJE_SKIN_R002_LP_BASENAME', plugin_basename( __FILE__ ) ); //このプラグインのベースネーム.
define( 'RJE_SKIN_R002_LP_TEXTDOMAIN', 'ruijinen-skin--r002-lp' ); //テキストドメイン名.

/**
 * Include Files.
 */
require_once(RJE_SKIN_R002_LP_PATH . 'App/Setup/ActivatePlugin.php'); //プラグインのアクティベート処理.
require_once(RJE_SKIN_R002_LP_PATH . 'App/Setup/AutoUpdate.php'); //プラグインの更新確認.
require_once(RJE_SKIN_R002_LP_PATH . '/App/Setup/TextDomain.php'); //テキストドメイン.
require_once(RJE_SKIN_R002_LP_PATH . '/vendor/autoload.php'); //アップデート用composer.

/**
 * 初期設定.
 */
class Bootstrap {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, '_bootstrap' ] );
		// add_action( 'snow_monkey_design_skin_choices', [ $this, '_add_choice_skin' ] );
		// add_action( 'after_setup_theme', [ $this, '_add_choice_skin' ] );
	}

	/**
	 * Bootstrap.
	 */
	public function _bootstrap() {
		new App\Setup\ActivatePlugin();
		// new App\Setup\AutoUpdate();
		new App\Setup\TextDomain();
	}

	public function hoge() {
		//オプションページの設定
		//カスタマイザーの設定
		//必要なJSの読み込み
		//必要なCSSの読み込み 
	}







}

new \Ruijinen\Skin\R002_LP\Bootstrap();



