<?php

/**
 * Class Stringintelligenz.
 *
 * Takes care of overwriting the default informal German strings with the gender-neutral ones provided by this plugin.
 */
class Stringintelligenz {

	/**
	 * Main plugin file.
	 *
	 * @var string
	 */
	private $file;

	/**
	 * Folder with the overwrite files.
	 *
	 * @var string
	 */
	private $overwrite_folder;

	/**
	 * Folder with template files.
	 *
	 * @var string
	 */
	private $templates_folder;

	/**
	 * Folder with plugin localization files.
	 *
	 * @var string
	 */
	private $l10n_folder;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @param string $file Main plugin file.
	 */
	public function __construct( $file ) {

		// Set main plugin file.
		$this->file = (string) $file;

		// Set folder for overwrites.
		$this->overwrite_folder = dirname( $file ) . '/languages';

		// Set folder for template files.
		$this->templates_folder = dirname( $file ) . '/templates';

		// Set folder for localization files of the plugin itself.
		$this->l10n_folder = dirname( $file ) . '/l10n';
	}

	/**
	 * Initializes the plugin.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @return void
	 */
	public function initialize() {

		// Load textdomain in order to be able to localize notices.
		load_plugin_textdomain( 'stringintelligenz', false, $this->l10n_folder );

		/**
		 * Stringintelligenz Core override checker class.
		 */
		require_once dirname( __FILE__ ) . '/StringintelligenzCoreOverrideChecker.php';

		/**
		 * Stringintelligenz Readable text domain loader class.
		 */
		require_once dirname( __FILE__ ) . '/StringintelligenzReadableTextDomainLoader.php';

		/**
		 * Stringintelligenz override class.
		 */
		require_once dirname( __FILE__ ) . '/StringintelligenzOverride.php';

		// Register filter function that is triggered, whenever a textdomain is loaded.
		$override = new StringintelligenzSiteOverride(
			$this->overwrite_folder,
			new StringintelligenzCoreOverrideChecker( $this->overwrite_folder ),
			new StringintelligenzReadableTextDomainLoader()
		);

		add_filter( 'override_load_textdomain', array( $override, 'override' ), 10, 3 );
	}

	/**
	 * Returns the (user) locale.
	 *
	 * @return string The (user) locale.
	 */
	private function get_locale() {

		return (string) ( function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale() );
	}
}
