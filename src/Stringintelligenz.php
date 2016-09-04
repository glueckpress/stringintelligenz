<?php

/**
 * Class Stringintelligenz.
 *
 * Takes care of overwriting the default informal German strings with the gender-neutral ones provided by this plugin.
 */
class Stringintelligenz {

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
	 *
	 * @param string $file Main plugin file.
	 */
	public function __construct( $file ) {

		// Set folder for overwrites.
		$this->overwrite_folder = dirname( $file ) . '/languages';
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
		if ( 'de_DE' !== get_locale() ) {
			/**
			 * Stringintelligenz admin notice class.
			 */
			require_once dirname( __FILE__ ) . '/StringintelligenzAdminNotice.php';

			add_action( 'admin_notices', array( new StringintelligenzAdminNotice(), 'render' ) );

			return;
		}

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
}
