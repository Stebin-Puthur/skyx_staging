=== Simple YouTube Responsive ===
Contributors: Eirudo
Donate link: https://www.paypal.me/Eirudo
Tags: youtube, embed, video, responsive, media, player, shortcode
Requires at least: 2.5
Tested up to: 5.7
Stable tag: 2.5
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


Embed responsive YouTube videos using simple shortcode. Lazy Load and AMP supported.

== Description ==

Embed YouTube videos and keept their aspect ratio, just using simple shortcode.

* Simple shortcode, can be used in the posts or widgets.
* Insert shortcode directly from post editor.
* Using default YouTube Embed Code (iframe).
* Custom aspect ratio, if you want set different porpotion size.
* Auto centered position. So if you insert it on your post section, the video always on center-aligned.
* Lazy Load supported.
* 100% Free! And no annoying ads inside.




== Installation ==

1. Install plugin from Wordpress menu Plugins > Add New
2. Activate the plugin
3. Yay! Well done.
4. Insert your shortcode to the post, or even widgets. Multiple shortcode is supported.


== Screenshots ==

https://eirudo.com/files/simple-youtube-responsive-screenshot-1.jpg
https://eirudo.com/files/simple-youtube-responsive-screenshot-2.jpg
https://eirudo.com/files/simple-youtube-responsive-screenshot-3.jpg
https://eirudo.com/files/simple-youtube-responsive-screenshot-4.jpg


== Changelog ==

= 1.0 =
* We just born. Nothing to see here.

= 1.1 =
* Fix Bug: Failed to Install
* Some typos
= 1.2 =
* Fix Bug: Mixed Content on https sites. I'm Sorry, forgot to make https version for embed code :3
= 1.2.1 =
* Fix Bug: PHP Error Divided by zero.
* Remove: Default Max Width (600px).
= 1.2.2 =
* Add: Alias attribute for inserting YouTube ID. You can using "video" or "v" tags
= 1.2.3 =
* Add: Google AMP supported
= 1.2.4 =
* Fix Bug: Break post when AMP plugin not installed.
= 1.2.5 =
* Little Bug, Fixed.
* New Contributor
* New documentation link
= 1.2.6 =
* Typo in ReadMe and Description
= 2.0.0 =
* Add Plugin Option page on Administration Menu.
* Lazy Load supported 
* Custom video thumbnails on Lazy Load mode.
= 2.0.1 =
* Bug Fixes on AMP
* Added Troubleshoot options: Javascript placing (sometimes YouTube not working if you using Elementor Pro and using Custom Footer Section). And now you can choose how to place the JavaScript.
* Typo on shortcode guide. For automatic centered, use center="" attribute
* Placing Stylesheet on Header (previously on footer)
= 2.1.0 =
* Bug Fixes on JavaScript Conflict with another plugin. Special thanks to @jkeasley2 for helping resolve this bugs.
= 2.2.0 =
* Bug Fixes break Wordpress after update
= 2.2.1 =
* Little optimization and remove unecessary codes
= 2.2.2 =
* More custom parameters added: Loop, Fullscreen, Show video controls bar, Start at, End at
= 2.3 =
* Now you can add your own supported parameters on each shortcode (for advanced use only). See https://developers.google.com/youtube/player_parameters#Parameters for complete list parameters.
= 2.4 =
* Bug Fixes: video player floated to the left on mobile devices
= 2.5 =
* Bug Fixes: On Lazy Load mode, sometimes the width of video not full 100% as it's container element (as default), caused by Elementor's CSS

== Upgrade Notice ==
* Just install this plugin.
* If you update this plugin from version 1x.x, make sure you reactuvate manually from plugin page.

== Arbitrary section ==


== A brief Markdown Example ==

Pros:
1. Simple, only using shortcode to use
2. Lazy Load supported
3. Custom parameters for advanced use

Cons:
1. Only for simple use. Embedding one video for each shortcode.
