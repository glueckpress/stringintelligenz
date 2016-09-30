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
	}

	/**
	 * Initializes the plugin.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @return void
	 */
	public function initialize() {

		/**
		 * Stringintelligenz JavaScript file model for dismissing admin notices.
		 */
		require_once dirname( __FILE__ ) . '/StringintelligenzDismissAdminNoticeScript.php';

		// We will be showing a dismissible admin notice no matter what, so we enqueue the according script right away.
		add_action( 'admin_enqueue_scripts', array(
			new StringintelligenzDismissAdminNoticeScript( $this->file ),
			'enqueue'
		) );

		/**
		 * Stringintelligenz admin notice model class.
		 */
		require_once dirname( __FILE__ ) . '/StringintelligenzAdminNotice.php';

		/**
		 * Stringintelligenz dismissible admin notice controller class.
		 */
		require_once dirname( __FILE__ ) . '/StringintelligenzDismissController.php';

		add_action( 'wp_ajax_stringintelligenz-dismiss-admin-notice', array(
			new StringintelligenzDismissController(),
			'handle_dismiss_request'
		) );

		// Only for de_DE (informal) for now.
		if ( 'de_DE' !== get_locale() ) {
			add_action( 'admin_notices', array( new StringintelligenzAdminNotice(
				$this->templates_folder . '/admin-notice-locale-not-supported.php'
			), 'render' ) );

			return;
		}

		add_action( 'admin_notices', array(
			new StringintelligenzAdminNotice(
				$this->templates_folder . '/admin-notice-plugin-activated.php',
				array( 'type' => 'success' )
			),
			'render'
		) );

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
