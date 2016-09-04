<?php

/**
 * Interface StringintelligenzOverrideChecker.
 *
 * Checks the context for any text domain overrides.
 */
interface StringintelligenzOverrideChecker {

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
	public function check( $domain, $mofile );
}
