<?php

/**
 * Class StringintelligenzAdminNotice.
 *
 * Admin notice model.
 */
class StringintelligenzAdminNotice {

	/**
	 * @var string
	 */
	private $classes;

	/**
	 * @var bool
	 */
	private $is_dismissible;

	/**
	 * @var string
	 */
	private $template;

	/**
	 * Constructor. Sets up the properties.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @param string $template Template file path.
	 * @param array  $args     {
	 *     Optional. Configuration arguments. Defaults to empty array.
	 *
	 *     @type string  $type        Notice type. Possible values: 'warning' (default), 'error', 'success', and 'info'.
	 *     @type bool    $dismissible Whether or not the admin notice should be marked dismissible. Defaults to true.
	 * }
	 */
	public function __construct( $template, array $args = array() ) {

		$this->template = (string) $template;

		$args = array_merge( array(
			'type'        => 'warning',
			'dismissible' => true,
		), $args );

		$classes = array(
			'notice',
			"notice-{$args['type']}",
		);
		if ( $args['dismissible'] ) {
			$classes[] = 'is-dismissible';
		}
		$this->classes = implode( ' ', $classes );

		$this->is_dismissible = (bool) $args['dismissible'];
	}

	/**
	 * Renders the admin notice.
	 *
	 * @since   0.1.0-alpha
	 * @wp-hook admin_notices
	 *
	 * @return bool True if the admin notice was rendered successfully, false if the template file is not readable.
	 */
	public function render() {

		if ( ! ( file_exists( $this->template ) && is_readable( $this->template ) ) ) {
			return false;
		}

		$hash = $this->get_hash();

		if ( $this->is_dismissible ) {
			$dismiss_controller = new StringintelligenzDismissController();
			if ( $dismiss_controller->notice_dismissed( $hash ) ) {
				return false;
			}
		}
		?>
		<div class="<?php echo esc_attr( $this->classes ); ?>" data-hash="<?php echo esc_attr( $hash ); ?>"
			data-nonce="<?php echo esc_attr( wp_create_nonce( $hash ) ); ?>">
			<?php
			/** @noinspection PhpIncludeInspection
			 * Template file.
			 */
			require $this->template;
			?>
		</div>
		<?php
		return true;
	}

	/**
	 * Returns the hash for the admin notice.
	 *
	 * @return string Admin notice hash.
	 */
	private function get_hash() {

		$template = str_replace( '\\', '/', $this->template );

		$parts = explode( '/', $template );

		$name = end( $parts );

		return md5( $name );
	}
}
