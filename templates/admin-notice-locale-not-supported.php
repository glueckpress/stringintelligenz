<h4><?php _e( '🙅✋👁📢&#160;Achtung! Stringintelligenz only supports default (<dfn title="That’s de_DE as a locale.">informal</dfn>) German for now.', 'stringintelligenz' ); ?></h4>
<p>
	<?php
	printf(
		__(
			'Switch to <strong>“Deutsch”</strong> in <a href="%s">Settings→General→Site&#160;Language</a> in order to enable gender-sensitive German in your WordPress admin interface.<br><em>(Quick check: As an administrator you should see the word “Profile” instead of “Benutzer” in your admin menu after you have activated Deutsch.)</em>',
			'stringintelligenz'
		),
		admin_url( 'options-general.php' )
	);
	?>
</p>
