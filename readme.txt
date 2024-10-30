=== Kanpress ===
Contributors: isra00
Tags: kanban, task manager, productivity, groupware, collaboration, admin
Requires at least: 2.0.2
Donate link: http://israelviana.es/contacto/
Tested up to: 3.5.1
Stable tag: 1.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A kanban board for managing the creation of Wordpress posts

== Description ==

**Kanpress brings Kanban management methodology to the publishing world. It provides enhanced management for magazines, newspapers and collaborative blogs through a workflow where posts move along different states.**
 
 
**Total integration**
 · Kanpress manages post creation in your site with your current users and categories.

**Traceability**
 · Easily visualize when a task was assigned, processed or closed, and by who.

**Private**
 · Kanpress is used from the Wordpress back-end and it doesn't change nothing about public aspect or functionality of your site.

Available in English, *Español*, *Galego*, *Deutsch* (thanks J. O. Rüdiger), *Italiano* (thanks Marco Rossi), *Türk* (thanks Enes Ünal) and *Português* (thanks Felipe de Andrade Neves)

**More info on [Kanpress homepage](http://www.israelviana.es/kanpress).**

== Installation ==

You can install Kanpress like any other plug-in, from your Wordpress admin > plugins > add new.

If you want to do it manually, the steps are the typical for any WP plug-in:

1. Unzip the package into the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enjoy Kanpress from the `Kanpress` item in the administration menu

== Frequently Asked Questions ==

= Is the Kanban board public? =

No, it's only available for registered users with role contributor or higher

= Which users can manage Kanpress tasks? Is there any permission required? =

No, it's only available for registered users with role contributor or higher

= Which languages are available in Kanpress? =

Currently, English (American), Spanish, Portuguese (Brazil), German, Turkish and Galician are supported. If you want to translate it into any other language, you are very welcome ;-) Just contact me in isra00@gmail.com

= Is there any issue tracker where I can see how the development of Kanpress goes? =

I'm tracking tasks and bugs in the [Wordpress plug-ins Trac](http://plugins.trac.wordpress.org/query?status=assigned&status=new&status=reopened&keywords=~kanpress&col=id&col=summary&col=status&col=type&col=priority&col=component&col=severity&order=priority). Feel free to report any bug or task that you'd like to be considered.

== Screenshots ==

1. The Kanban board in action
2. Task details: descriptions, assigned author, linked post...

== Changelog ==

= 0.1 =
* First release

= 0.2 =
* Bugfixes and english translation

= 0.3 =
* Bugfixes and galician translation

= 0.3.2 =
* Important bugfixes in function hace_tiempo(). You should upgrade!

= 0.3.3 =
* Better translations, including JavaScript

= 0.3.4 = 
* Bugfixes in a DB query

= 0.3.5 =
* Bugfixes in i18n and avoided problems when refreshing page when new task is created

= 0.3.6 =
* More bugfixes in DB queries

= 0.3.7 =
* More bugfixes in DB queries

= 0.3.8 =
* Added turkish translation by @ensunal

= 0.3.9 =
* Bugfixing

= 0.3.10 =
* Bugfixing (button "new task" didn't work)

= 1.0 =
* Great refactor and UI improvements.
* Refactor translation files.
* This is the first really stable release.

= 1.1 =
* Added portuguese (BR) translation by Felipe de Andrade Neves

= 1.2 =
* #1913 Hide options for users not having permission
* #1911 Send 403 headers on forbidden AJAX requests
* #1907 Related article in status "future" does not display right status
* #1908 Use core i18n strings when appropiate
* #1914 Use kanpress_current_user_can() always


== Upgrade Notice ==

= 0.2 =
* Important cross-browser CSS fixes. You should upgrade

= 0.3.2 =
* Important bugfixes in date function. You should upgrade!
