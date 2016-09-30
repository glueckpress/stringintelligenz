<?php # -*- coding: utf-8 -*-

/**
 * Class StringintelligenzDismissController.
 *
 * Controller for dismissible admin notices.
 */
class StringintelligenzDismissController {

	/**
	 * Prefix for all options.
	 *
	 * @var string
	 */
	private $prefix = 'stringintelligenz_admin_notice_';

	/**
	 * Checks if the admin notice with the given hash has been dismissed.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @param string $hash Admin notice hash.
	 *
	 * @return bool True if the admin notice has been dismissed, and false if not.
	 */
	public function notice_dismissed( $hash ) {

		return (bool) get_option( "{$this->prefix}{$hash}" );
	}

	/**
	 * Dismisses the admin notice with the given hash.
	 *
	 * @since   0.1.0-alpha
	 * @wp-hook wp_ajax_{$action}
	 *
	 * @return void
	 */
	public function handle_dismiss_request() {

		if ( empty( $_REQUEST['hash'] ) ) {
			exit;
		}

		$hash = $_REQUEST['hash'];

		check_ajax_referer( $hash, 'nonce' );

		update_option( "{$this->prefix}{$hash}", true );

		exit;
	}
}
