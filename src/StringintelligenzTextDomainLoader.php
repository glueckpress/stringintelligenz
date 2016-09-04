<?php

/**
 * Interface StringintelligenzTextDomainLoader.
 *
 * Takes care of loading text domains.
 */
interface StringintelligenzTextDomainLoader {

	/**
	 * Loads the given text domain.
	 *
	 * @param string $domain Text domain.
	 * @param string $mofile Path to .mo file.
	 *
	 * @return bool Whether or not the text domain was loaded successfully.
	 */
	public function load_textdomain( $domain, $mofile );
}
