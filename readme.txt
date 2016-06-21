=== Activist Network Theme ===

Contributors: misfist
Tags: translation-ready, custom-background, theme-options, custom-menu, post-formats, threaded-comments

Requires at least: 4.0
Tested up to: 4.4
Stable tag: 2.0.23
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A custom starter theme called Activist NetworkTheme.

== Description ==

A theme for the main site of an ANP network, based on _s with Hybrid Core and Bootstrap

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Activist Network Theme includes support for Jetpack's Infinite Scroll and Site Logos, as well as other features.

== Changelog ==

= 2.0.23 - June, 21 2016 =
* Removed color specification from icon-font mixin.

= 2.0.22 - June, 20 2016 =
* Changed page heading class.

= 2.0.21 - June, 20 2016 =
*[Bugfix] Moved BuddyPress attribution to correct hook.

= 2.0.20 - June, 20 2016 =
* Added theme support for Hybrid Core 'get-the-image'
* Added `posts-list` class to index and archive templates
* Globally changed template action hooks to `anp_*` instead of `anp_network_main_` 
* Properly hid sidebar for full and grid layouts


= 2.0.19 - June, 16 2016 =
* Added page slug body class and removed call to `inc/extras.php`.

= 2.0.18 - June, 15 2016 =
* [Feature #1444] - Added custom partial template for Flexible Posts Widget plugin in `./flexible-posts-widget/`
* Added stylesheet partial for Flexible Posts Widget

= 2.0.17 - May 26 2016 =
* Issue #1408 - Optimized BuddyPress stylesheet for easier managability
* `#buddypress` background is white and text is dark gray regardless of theme
   * For dark colored backgrounds, the following can be added to fix padding issues:
    #buddypress {
        padding: 0 .25em .5em .25em;

        #cover-image-container,
        #item-nav {
            margin-right: -.25em;
            margin-left: -.25em;
        }
    }
* Moved BP docs templates to `/buddypress/docs` directory
* Updated BP template markup for consistency.
* Turned back on Event Organizer event handling
* Added group status class to header so public, private and hidden can be customized
* Changed "favorite" to "like" because it's better understood by users (thanks facebook :/ )
* Updated some functions, mixins and color variables.
* Added `group-type` and `member-count` mark-up to groups list 

= 2.0.16 - May 24 2016 =
* Issue #1408 - Updated BuddyPress styles to force consistency across child themes.
* Updated hook names
* Added BP Docs templates for customization
* Fixed BP Docs JS for hide/show filters

= 2.0.15 - May 19 2016 =
* Modified `.bottom-navigation` customizer settings to be assigned the background-color, if one is selected
* Changed default background color of `.bottom-navigation` to black with opacity .1 to create a slight overlay on any background color. This will be overridden if a background color is defined in the customizer.

= 2.0.14 - May 19 2016 =
* Modified `.bottom-navigation` customizer settings to be assigned the background-color, if one is selected
* Changed default background color of `.bottom-navigation` to black with opacity .1 to create a slight overlay on any background color. This will be overridden if a background color is defined in the customizer.

= 2.0.13 - May 17 2016 =
* Updated alert extends

= 2.0.12 - May 16 2016 =
* Added featured image to post archive

= 2.0.11 - May 12 2016 =
* Added `.custom-logo-link` and `.custom-logo` class definitions for new `custom-logo`

= 2.0.10 - May 10 2016 =
* Added custom-logo support for 4.5
* Added display of custom-logo, with fallback to Jetpack site-logo, then site name
* Added styling for multisite directory shortcode
* Cleaned up entry-meta display
* Fixed custom-logo and tagline display
* Updated Font Awesome library to 4.6.2

= 2.0.9 - May 4 2016 =
* [Bugfix]Fixed Notice: Trying to get property of non-object in wp-content/themes/anp-network-main/template-parts/content.php on line 63
* Updated package.json to include bower as a dev-dependency
* Fixed SASS compilation errors

= 2.0.8 - April 22 2016 =
* [Bugfix]Fixed body background scrolling issue.
* Set footer menu fallback to false so default menu doesn't appear when no menu is selected.
* Suppress footer nav row if none exists.

= 2.0.7 - April 21 2016 (Prince RIP) =
* Updated sites list, knowledge base list and buddypress lists styling to make more consistent.

= 2.0.6 - April 19 2016 =
* Added custom invite-anyone template that mark-up more consistent with BuddyPress theme
* Added styles for BuddyPress alerts
* Updated Font Awesome version from 4.5.0 to 4.6.1 (includes new accessibility icons)

= 2.0.5 - April 13 2016 =
* [Bugfix]Fixed issue causing Network Directory links to not appear
* Added pagination styling for current page

= 2.0.4 - April 12 2016 =
* Refined BuddyPress activity list styling
* Resolved style conflict between #item-header .entry-title and .entry-title
* Changed default horizontal rule color to $color__border-hr
* Removed horizontal rules from BuddyPress .meta

= 2.0.3 - April 8 2016 =
* Added numeric pagination function to replace previous / next
* Added pagination to archive and taxonomy templates
* Added styling for pager
* Updated BuddyPress activity post form to make 1 row high by default

= 2.0.2 - April 7 2016 =
* Added post type-specific search
* Added Knowledge Base template
* Changed header partial file names to begin with `header`

= 2.0 - January 29 2016 =
* Initial release

== Credits ==

* Based on _s http://components.underscores.me/, (C) 2015-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Hybrid Core Framework http://themehybrid.com/hybrid-core
* Bootstrap http://getbootstrap.com/
