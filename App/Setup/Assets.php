<?php
/**
 * @package ruijinen-skin-r002-lp
 * @author mgn
 * @license GPL-2.0+
 */

namespace Ruijinen\Skin\R002_LP\App\Setup;

class Assets {
	/**
	 * Properties
	 */
	public $sm_style_handles; //Snow Monkey のメインスタイルのハンドルを格納.

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'get_sm_style_handles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'wp_enqueue_scripts' ], 11, 1); //HACK:Snow MonkeyのCSSより前に読み込まれるときがあるため優先度を下げて読み込ませる
	}

	/**
	 * get Snow Monkey Style Hadles.
	 */
	public function get_sm_style_handles () {
		//Snow Monkeyテーマからメインスタイルのハンドルを取得
		if ( method_exists('\Framework\Helper', 'get_main_style_handle') ) {
			$this->sm_style_handles = \Framework\Helper::get_main_style_handle();
		} else {
			$this->sm_style_handles = [];
		}
	}

	/**
	 * Enqueue front assets
	 */
	public function wp_enqueue_scripts() {
		wp_enqueue_style(
			RJE_SKIN_R002_LP_A_KEY,
			RJE_SKIN_R002_LP_A_URL . '/dist/css/style.css',
			$this->sm_style_handles,
			filemtime( RJE_SKIN_R002_LP_A_PATH . '/dist/css/style.css' )
		);
	}
}
