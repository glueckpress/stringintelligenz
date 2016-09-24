<?php

/**
 * Stringintelligenz text domain loader interface.
 */
require_once dirname( __FILE__ ) . '/StringintelligenzTextDomainLoader.php';

/**
 * Class StringintelligenzReadableTextDomainLoader.
 *
 * Takes care of loading text domains, given the according file is readable.
 */
final class StringintelligenzReadableTextDomainLoader implements StringintelligenzTextDomainLoader {

	/**
	 * Loads the given text domain.
	 *
	 * @param string $domain Text domain.
	 * @param string $mofile Path to .mo file.
	 *
	 * @return bool Whether or not the text domain was loaded successfully.
	 */
	public function load_textdomain( $domain, $mofile ) {

		if ( ! is_readable( $mofile ) ) {
			return false;
		}

		if ( ! load_textdomain( $domain, $mofile ) ) {
			return false;
		}

		return true;
	}
}
