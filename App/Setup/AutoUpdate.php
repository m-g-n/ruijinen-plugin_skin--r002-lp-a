<?php
/**
 * @package ruijinen-skin--r002-lp
 * @author mgn
 * @license GPL-2.0+
 */

namespace Ruijinen\Skin\R002_LP\App\Setup;

use Inc2734\WP_GitHub_Plugin_Updater\Bootstrap as Updater;

class AutoUpdate{

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'activate_autoupdate' ) );
	}

	/**
	 * Activate auto update using GitHub,
	 *
	 * @return void
	 */
	public function activate_autoupdate() {
		new Updater(
			RJE_SKIN_R002_LP_A_BASENAME,
			'm-g-n',
			'ruijinen-skin--r002-lp',
			[
				'homepage' => 'https://rui-jin-en.com',
			]
		);
	}
}