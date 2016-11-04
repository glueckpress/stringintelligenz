=== Stringintelligenz ===
Contributors: glueckpress, elbmedien, tfrommen, kau-boy, benjaminbirkenhake
Tags: german, l10n, translation
Requires at least: 4.6
Tested up to: 4.6
Stable tag: 0.1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Gender-sensitive language for WordPress in German

== Description ==

**Stringintelligenz** is a localization feature project that aims to bring gender-sensitive language to German locales in WordPress.

This plugin swaps the German language packs for WordPress core with a set of language files containing a gender-sensitive translation of WordPress.

The most prominent change you will see after activating **Stringintelligenz** (and only if German is your site language) is the admin menu item “Profile” instead of “Benutzer”. Happy exploring!

> **Your feedback is appreciated!**
>
> **Stringintelligenz** is a localization feature plugin. It aims to eventually merge its modified translations into German core language packs, thus making **gender-sensitive language a default for WordPress in German**. We highly appreciate your feedback!
>
> * How do you like the modified translations? _(Bonus points for an educated opinion!)_
> * Would you like to see any gender-related translations improved?
>
> **Let us know via the [plugin forums](https://wordpress.org/support/plugin/stringintelligenz/#new-post)!**

== Installation ==

1. Install the plugin through the WordPress “Plugins” screen directly, or upload the plugin files to `/wp-content/plugins/stringintelligenz`.
2. Activate the plugin through the “Plugins” screen in WordPress.
   No settings to configure, but make sure you run default German (`de_DE`) as your site language.


== Frequently Asked Questions ==

= Will the plugin override my language packs for WordPress? =

No, your installation remains fully intact. The plugin will load its own language files. When you decide to deactivate it, WordPress will look just as before you installed the plugin.

= Will the plugin make all of my website gender-sensitive in German? =

No, this plugin only targets WordPress core. German translations of other plugins or themes remain unchanged. That’s why you may see inconsitent translations here and there. If you activate the plugin, and you still see a generic masculinum like “Benutzer” or “Autor”, it likely comes from another plugin or theme.

= Does this plugin introduce “genderized” word endings? =

In a few places, yes. We generally try to use alternative phrasing wherever possible instead. Word endings with a “gender star” can be found mostly on the word `Autor*in`. We found it particularly hard to come up with an alternative so far. (The single-word string `Author` is [used widely across multiple contexts](https://wordpress.org/support/topic/author-ohne-kontext/) in WordPress.)

= Can I use this plugin for client sites? =

Absolutely! We’d love to hear feedback from people who use WordPress, but don’t build with it on a daily basis. If you find the plugin appropriate to use on a client site, please let us know how your client received the language.

= How long will this plugin be maintained? =

At least until its translations are merged into the default German language packs for WordPress core.

= How can I contribute? =

Yay! :) The easiest way for you to contribute would be to just post your suggestions over in the [plugin forums](https://wordpress.org/support/plugin/stringintelligenz/#new-post). We monitor these forums closely and will definitely reply to any suggestions you make.

Contributing strings directly can get a bit tricky technically, but if you’re up for it, just shoot Caspar (@glueckpress) a message via [WordPress Slack](https://make.wordpress.org/chat/) or [German WordPress Slack](https://dewp.slack.com/).


== Screenshots ==

1. User list: renamed to “Profile”.
2. A woman labeled as a developer in German.
3. Stringintelligenz applied to the same label.


== Changelog ==

= 0.2.0 =
* [Profilname anstatt Zugangsname](https://github.com/glueckpress/stringintelligenz/issues/8)
* [neutrale Rollenbezeichnungen](https://github.com/glueckpress/stringintelligenz/issues/17)
* Beidnennung mit Schrägstrich statt Gender-Star
* [geringfügige Fehlerkorrekturen](https://github.com/glueckpress/stringintelligenz/issues/16)
* Projekt-Ziel „WordPress 4.7“ entfernt

= 0.1.0 =
* … und jedem Anfang wohnt ein Zauber inne.


== Upgrade Notice ==

= 0.2.0 =
We removed gender stars (“Autor*in”) in favor of displaying female and male genders with a slash (“Autorin/Autor”). “Zugangsname” got re-named to “Profilname”, and roles got functional instead of personal names. Got feedback? Join the [forum](https://wordpress.org/support/plugin/stringintelligenz/)!
