<?php
/**
 * @package ruijinen-skin-r002-lp
 * @author mgn
 * @license GPL-2.0+
 */

namespace Ruijinen\Skin\R002_LP\App\Setup;

class ActivateCheck {
	//プロパティ
	public $messages   = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->check_rje_block_patterns_activate();
	}

	//Check the required environmen and Plugin Activation.
	public function check_rje_block_patterns_activate () {
		// if ( !is_admin() || !current_user_can( 'activate_plugins' ) ) {
		// 	return;
		// }
		$theme = wp_get_theme( get_template() );
		if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
			$this->messages['rje_r002_lp_a'] = 'スキンプラグインを利用するには「Snnow Monkey」テーマを有効にしている必要があります';
		} 
	}

	//必要なパッケージがアクティベートされてない場合のエラーメッセージ
	public function make_alert_message() {
		$alert_html = '<div class="notice notice-warning is-dismissible"><p><strong>[類人猿スキン LPパターン用]</strong></p>';
		foreach ( $this->messages as $text ) {
			$alert_html .= '<p>'.$text.'</p>';
		}
		$alert_html .= '</div>';
		echo $alert_html;
	}
}