<?php
/**
 * Plugin Name: Stringintelligenz
 * Description: Open language for WordPress in German
 * Version:     0.2.3-alpha
 * Author:      Caspar Hübinger
 * Author URI:  https://profiles.wordpress.org/glueckpress
 * License:     GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
 * Text Domain: stringintelligenz
 * Domain Path: /l10n
 */

defined( 'ABSPATH' ) or die();

/**
 * Main plugin class.
 */
require_once dirname( __FILE__ ) . '/src/Stringintelligenz.php';

/**
 * Initializes Stringintelligenz.
 *
 * @since   0.2.2
 * @wp-hook plugins_loaded
 *
 * @return void
 */
function initialize_stringintelligenz() {

	$stringintelligenz = new Stringintelligenz( __FILE__ );
	$stringintelligenz->initialize();
}

add_action( 'plugins_loaded', 'initialize_stringintelligenz' );
