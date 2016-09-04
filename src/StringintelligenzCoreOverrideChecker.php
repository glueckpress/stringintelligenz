<?php

/**
 * Stringintelligenz override checker interface.
 */
require_once dirname( __FILE__ ) . '/StringintelligenzOverrideChecker.php';

/**
 * Class StringintelligenzDefaultOverrideChecker.
 *
 * Checks the context for any Core text domain overrides.
 */
final class StringintelligenzCoreOverrideChecker implements StringintelligenzOverrideChecker {

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
	 * @param string $overwrite_folder Folder with the overwrite files.
	 */
	public function __construct( $overwrite_folder ) {

		// Set folder for overwrites.
		$this->overwrite_folder = (string) $overwrite_folder;
	}

	/**
	 * Checks whether or not to override the given text domain and .mo file.
	 *
	 * @since 0.1.0-alpha
	 *
	 * @param string $domain Text domain.
	 * @param string $mofile Path to .mo file.
	 *
	 * @return bool Whether or not to override the given text domain and .mo file.
	 */
	public function check( $domain, $mofile ) {

		// Only for core files.
		if ( 'default' !== $domain ) {
			return false;
		}

		// If not called with an overwrite .mo file, proceed with the given .mo file.
		if ( false !== strpos( $mofile, $this->overwrite_folder ) ) {
			return false;
		}

		// Yes, we can (and will) overwrite.
		return true;
	}
}
