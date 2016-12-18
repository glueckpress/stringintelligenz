<?php
/**
 * Plugin Name: Stringintelligenz
 * Description: Gender-sensitive language for WordPress in German
 * Version:     0.2.1
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

$stringintelligenz = new Stringintelligenz( __FILE__ );
$stringintelligenz->initialize();
