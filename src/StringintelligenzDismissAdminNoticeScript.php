<?php

/**
 * Class StringintelligenzDismissAdminNoticeScript.
 *
 * Model for the JavaScript file for dismissing admin notices.
 */
class StringintelligenzDismissAdminNoticeScript {

	/**
	 * Main plugin file.
	 *
	 * @var string
	 */
	private $file;

	/**
	 * Script handle.
	 *
	 * @var string
	 */
	private $handle = 'stringintelligenz-dismiss-admin-notice';

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @param string $file Main plugin file.
	 */
	public function __construct( $file ) {

		$this->file = (string) $file;
	}

	/**
	 * Enqueues the file.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @return bool Whether or not the file has been enqueued.
	 */
	public function enqueue() {

		if ( wp_script_is( $this->handle ) ) {
			return false;
		}

		$file = 'assets/js/dismiss-admin-notice' . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min' ) . '.js';

		wp_enqueue_script(
			$this->handle,
			plugin_dir_url( $this->file ) . $file,
			array(
				'jquery',
			),
			filemtime( plugin_dir_path( $this->file ) . $file ),
			true
		);

		return true;
	}
}
