<?php
/**
 * @package ruijinen-skin-r002-lp
 * @author mgn
 * @license GPL-2.0+
 */

//TODO:必要の可否を再検討

namespace Ruijinen\Skin\R002_LP\App\Control;

class SMCustomizeItems {

	/**
	 * Propaties.
	 */
	private $customize_value;
	private $theme_mod_header;

	/**
	 * Constructor.
	 */
	public function __construct() {
		// todo: 将来は外部json読み込みにしたい
		$this->theme_mod_header = array(
			// 'header_layout'                    => 'default',
			// 'vertical_global_nav'              => 'default',
			'header-position-lg' => 'sticky-overlay',
			'header-position' => 'sticky-overlay',
			// 'display_header_content_on_mobile' => 'default',
			// 'header_alignfull'                 => 'default',
			// 'header-text-color'                => 'default',
		);
		add_action( 'after_setup_theme', array( $this, 'set_recommend_customizer_items' ) );
	}

	/**
	 * Check the Option value of Recommend Snow Monkey customize items.
	 */
	public function set_recommend_customizer_items() {
		// $skin_option = get_option( 'rje_skin_r002_lp_sm_customize' );
		// if ( 1 === $skin_option['set-recommend-customizer-items'] ) {
		// 	// 各フックの処理
		// }
		$this->set_header();
	}

	/**
	 * ヘッダーのテンプレートを設定する.
	 */
	public function set_header() {
		foreach ($this->theme_mod_header as $key => $value) {

			// // PC用ヘッダー位置をカスタマイズ.
			// add_filter(
			// 	'theme_mod_'.$key,
			// 	function( $value ) {
			// 		$set_value = $this->theme_mod_header[$key];
			// 		if ( NULL !== $set_value ) {
			// 			$value = $set_value;
			// 		}
			// 		return $value;
			// 	}
			// );
		}
	}

	/**
	 * todo:write a comment.
	 */
	public function set_header_position () {
		add_filter(
			'theme_mod_header-position-lg',
			function( $value ) {
				$set_value = $this->theme_mod_header[$key];
				if ( 'default' !== $set_value ) {
					$value = $set_value;
				}
				return $value;
			}
		);
	}
}
