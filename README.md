# Stringintelligenz
Inclusive WordPress localization

**Stringintelligenz** is a localization feature project that aims to bring inclusive localizations to WordPress.

This plugin swaps language packs for WordPress core with a custom set of language files for a given locale. Currently, the only locale shipping with the plugin is German (informal); **WordPress Polyglot teams are invited to contribute experimental versions of their own locales!**

Changes in your dashboard when you activate the plugin may be subtle to hardly recognizable. That is by design. If nothing seems to have changed for you, there are mostly two possible reasons:

* Your locale or user locale is not (yet) supported by Stringintelligenz. In this case, feel free to [post on the forums and get involved](https://wordpress.org/support/plugin/stringintelligenz/#new-post).
* The experimental translation shipped with the plugin for your locale has nailed it and made WordPress’ interface more inclusive the smart way. :)

== Installation ==

1. Install the plugin through the WordPress “Plugins” screen directly, or upload the plugin files to `/wp-content/plugins/stringintelligenz`.
2. Activate the plugin through the “Plugins” screen in WordPress.
   No settings to configure, but make sure you run a supported locale (currently only `de_DE`) as your site language or user language.


## Frequently Asked Questions

### Will the plugin override my language packs for WordPress?

No, your installation remains fully intact. The plugin will load its own language files. When you decide to deactivate it, WordPress will look just as before you installed the plugin.

### Will the plugin make all of my website gender-neutral?

No, this plugin only targets the user interface of WordPress core. It will not mess with the content of your website in any way. Translations of other plugins or themes remain unchanged, so you may see inconsitent translations in WP Admin here and there. If you activate the plugin on a website with a supported locale, and you still see e.g. a generic masculinum, it likely comes from another plugin or theme.

### Does this plugin introduce “genderized” word endings?

We generally try to use alternative gender-neutral phrasing wherever possible. In German, short forms of male/female can be found mostly on the word `Autor/-in`. (The single-word string `Author` is [used widely across multiple contexts](https://wordpress.org/support/topic/author-ohne-kontext/) in WordPress which currently makes it particularly hard to fine-tune its translations.)

### Can I use this plugin for client sites?

Absolutely! We’d love to hear feedback from people who use WordPress, but don’t build with it on a daily basis. If you find the plugin appropriate to use on a client site, please let us know how your client received it.

### I dig the code, who wrote this?

After this plugin had started out as a fork of [Bernhard Kau’s](https://github.com/2ndkauboy) [Backend Localization](https://wordpress.org/plugins/kau-boys-backend-localization/) plugin, [Thorsten Frommen](https://github.com/tfrommen) has contributed the current OOP version.

## How can I contribute?

The easiest way for you to contribute would be to just post your suggestions over in the [plugin forums](https://wordpress.org/support/plugin/stringintelligenz/#new-post). We monitor these forums closely and will definitely reply to any suggestions you make.

**Forum posts that aim to criticize the general approach of gender-neutral or gender-sensitive language may or may not get a reply. If you feel enclined to discuss (in whatever form) the general approach of this plugin, please use your own means of publishing, like your blog, but not the plugin forums. Other than that, you’re also perfectly welcome to not use the plugin, of course.**

For any questions regarding contribution feel free to shoot Caspar (@glueckpress) a message via [WordPress Slack](https://make.wordpress.org/chat/).

If you're familiar with GitHub, you are welcome to contribute via  [issue](https://github.com/glueckpress/stringintelligenz/issues) and PR.
