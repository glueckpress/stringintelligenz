<?php
/**
 * Plugin Name: Stringintelligenz
 * Description: Gender-sensitive Sprache für WordPress in Deutsch
 * Version:     0.1.0-alpha
 * Author:      Caspar Hübinger
 * Author URI:  https://profiles.wordpress.org/glueckpress
 * License:     GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0
 */

/**
 * Class Stringintelligenz.
 *
 * Takes care of overwriting the default informal German strings with the gender-neutral ones provided by this plugin.
 */
class Stringintelligenz {

	/**
	 * Current site ID.
	 *
	 * @var int
	 */
	private $current_site_id = 1;

	/**
	 * Flag to check if running a multisite environment.
	 *
	 * @var bool
	 */
	private $is_multisite;

	/**
	 * Current locale (e.g., "de_DE").
	 *
	 * @var string
	 */
	private $locale;

	/**
	 * Folder with the overwrite files.
	 *
	 * @var string
	 */
	private $overwrite_folder;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 0.1.0-alpha
	 */
	public function __construct() {

		// Check if multisite.
		$this->is_multisite = is_multisite();

		if ( $this->is_multisite ) {
			// If it is a multisite, set the current site ID.
			$this->current_site_id = get_current_blog_id();
		}

		// Set current locale.
		$this->locale = get_locale();

		// Set folder for overwrites.
		$this->overwrite_folder = trailingslashit( dirname( __FILE__ ) ) . 'languages/';
	}

	/**
	 * Initializes the plugin.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @return void
	 */
	public function initialize() {

		// Only for de_DE (informal) for now.
		if ( 'de_DE' !== $this->locale ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_bailout_locale' ) );

			return;
		}

		// Register action that is triggered, whenever a textdomain is loaded.
		add_action( 'override_load_textdomain', array( $this, 'overwrite_textdomain' ), 10, 3 );
	}

	/**
	 * Overwrites strings from all loaded textdomains, no matter if they are used in Core, Plugins or Themes.
	 *
	 * The .mo file has to be named [domain]-[locale].mo (e.g., for the plugin Jetpack with the textdomain "jetpack" and
	 * the locale "de_DE" is has to be jetpack-de_DE.mo).
	 *
	 * @since   0.1.0-alpha
	 * @wp-hook override_load_textdomain
	 *
	 * @return bool Whether or not the textdomain was overwritten.
	 */
	public function overwrite_textdomain( $override, $domain, $mofile ) {

		// Only for core files.
		if ( 'default' !== $domain ) {
			return false;
		}

		// Extract file name.
		$mofile_pieces = explode( '/', $mofile );
		$mofile_pieces_reverse = array_reverse( $mofile_pieces );
		$mofile_name = $mofile_pieces_reverse[0];

		// If not called with an overwrite mofile, proceed with the given mofile and prevent an endless recursion.
		if ( strpos( $mofile, $this->overwrite_folder ) !== false ) {
			return false;
		}

		// If an overwrite file exists, load it to overwrite the original strings.
		$overwrite_mofile = $mofile_name;

		// Check if a global overwrite mofile exists and load it.
		$global_overwrite_file = $this->overwrite_folder . $overwrite_mofile;

		if ( file_exists( $global_overwrite_file ) ) {
			load_textdomain( $domain, $global_overwrite_file );
		}

		// Check if a overwrite mofile for the current site exists and load it.
		if ( $this->is_multisite ) {
			$current_site_overwrite_file = $this->overwrite_folder . 'blogs.dir/' . $this->current_site_id . '/' . $overwrite_mofile;

			if ( file_exists( $current_site_overwrite_file ) ) {
				load_textdomain( $domain, $current_site_overwrite_file );
			}
		}

		return false;
	}

	/**
	 * Notifies user when their installed locale does not qualify.
	 *
	 * @since   0.1.0-alpha
	 * @wp-hook admin_notices
	 *
	 * @return void
	 */
	public function admin_notice_bailout_locale() {

		printf(
			'<div class="notice notice-error is-dismissible"><p>%s</p></div>',
			sprintf(
				__(
					'<strong>Stringintelligenz</strong> ist momentan nur für <em>Deutsch</em> verfügbar („Du“-Version, Locale: <code>de_DE</code>). Unter <a href="%s">Einstellungen→Allgemein</a> kannst du zu <em>Deutsch</em> wechseln.',
					'stringintelligenz'
				),
				admin_url( 'options-general.php' )
			)
		);
	}
}

$stringintelligenz = new Stringintelligenz();
$stringintelligenz->initialize();
