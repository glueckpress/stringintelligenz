<?php

/**
 * Class StringintelligenzSiteOverride.
 *
 * Takes care of overwriting the default informal German strings with the gender-neutral ones provided by this plugin.
 */
class StringintelligenzSiteOverride {

	/**
	 * Override checker object.
	 *
	 * @var StringintelligenzOverrideChecker
	 */
	private $checker;

	/**
	 * Current site ID.
	 *
	 * @var int
	 */
	private $current_site_id;

	/**
	 * Text domain loader object.
	 *
	 * @var StringintelligenzTextDomainLoader
	 */
	private $loader;

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
	 * @param string                            $overwrite_folder Folder with the overwrite files.
	 * @param StringintelligenzOverrideChecker  $checker          Override checker object.
	 * @param StringintelligenzTextDomainLoader $loader           Text domain loader object.
	 */
	public function __construct(
		$overwrite_folder,
		StringintelligenzOverrideChecker $checker,
		StringintelligenzTextDomainLoader $loader
	) {

		$this->overwrite_folder = (string) $overwrite_folder;

		$this->checker = $checker;

		$this->loader = $loader;

		if ( is_multisite() ) {
			// Set current site ID.
			$this->current_site_id = get_current_blog_id();
		}
	}

	/**
	 * Overwrites strings from all loaded text domains, no matter if they are used in Core, Plugins or Themes.
	 *
	 * The .mo file has to be named [domain]-[locale].mo (e.g., for the plugin Jetpack with the text domain "jetpack"
	 * and the locale "de_DE" is has to be jetpack-de_DE.mo).
	 *
	 * @since   0.1.0-alpha
	 * @wp-hook override_load_textdomain
	 *
	 * @param bool   $override Whether or not to override the .mo file loading.
	 * @param string $domain   Text domain.
	 * @param string $mofile   Path to .mo file.
	 *
	 * @return bool Whether or not the text domain was overwritten.
	 */
	public function override( $override, $domain, $mofile ) {

		// Check override context.
		if ( ! $this->checker->check( $domain, $mofile ) ) {
			return $override;
		}

		// Extract file name.
		$mofile_pieces = explode( '/', $mofile );
		$overwrite_mofile_name = end( $mofile_pieces );

		// Check if a global overwrite .mo file exists and load it.
		$overwrite_mofile = "{$this->overwrite_folder}/{$overwrite_mofile_name}";
		if ( $this->loader->load_textdomain( $domain, $overwrite_mofile ) ) {
			$override = true;
		}

		// If multisite, check if a network overwrite .mo file exists and load it.
		if ( $this->current_site_id ) {
			$overwrite_mofile = "{$this->overwrite_folder}/blogs.dir/{$this->current_site_id}/{$overwrite_mofile_name}";
			if ( $this->loader->load_textdomain( $domain, $overwrite_mofile ) ) {
				$override = true;
			}
		}

		return $override;
	}
}
