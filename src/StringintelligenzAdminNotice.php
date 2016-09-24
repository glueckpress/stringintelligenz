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
		<div class="notice notice-warning is-dismissible">
			<h4><?php _e( '🙅✋👁📢&#160;Achtung! Stringintelligenz only supports default (<dfn title="That’s de_DE as a locale.">informal</dfn>) German for now.', 'stringintelligenz' ); ?></h4>
			<p><?php
				printf(
					__(
						'Switch to <strong>“Deutsch”</strong> in <a href="%s">Settings→General→Site&#160;Language</a> in order to enable gender-sensitive German in your WordPress admin interface.<br><em>(Quick check: As an administrator you should see the word “Profil” instead of “Benutzer” in your admin menu after you have activated Deutsch.)</em>',
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
