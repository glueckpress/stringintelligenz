<?php

/**
 * Class StringintelligenzAdminNotice.
 *
 * Admin notice informing the user when the current locale does not qualify for being overwritten by Stringintelligenz.
 */
class StringintelligenzAdminNotice {

	/**
	 * Notifies user when their installed locale does not qualify.
	 *
	 * @since   0.1.0-alpha
	 * @wp-hook admin_notices
	 *
	 * @return void
	 */
	public function render() {

		?>
		<div class="notice notice-error is-dismissible">
			<p>
				<?php
				printf(
					__(
						'<strong>Stringintelligenz</strong> ist momentan nur für <em>Deutsch</em> verfügbar („Du“-Version, Locale: <code>de_DE</code>). Unter <a href="%s">Einstellungen→Allgemein</a> kannst du zu <em>Deutsch</em> wechseln.',
						'stringintelligenz'
					),
					admin_url( 'options-general.php' )
				);
				?>
			</p>
		</div>
		<?php
	}
}
