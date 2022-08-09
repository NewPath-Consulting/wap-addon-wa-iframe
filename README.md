=== WildApricot Press iFrame Add-on ===
Contributors: nataliebrotherton, asirota
Tags: wap, wildapricot, wild apricot, sso, membership
Requires at least: 5.7
Tested up to: 6.0
Requires PHP: 7.4
Stable Tag: 1.0b4
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


This plugin installs a Gutenberg block which allows the user to include an iFrame with a Wild Apricot widget.

# Release History
August 9 2022 - 1.0b4 - submitted to WP Repo

# WAP Wild Apricot iFrame Add On

## How to install
0. Clone or download this repository.
1. Compress the plugin folder.
2. Upload the plugin zip archive to your WordPress site using the plugin installer.

OR

0. Clone or download this repository directly in your WordPress site's `wp-content/plugins` folder.
1. Browse to the "Plugins" page on your site, look for "WAP Wild Apricot iFrame Add-on", and activate the plugin.

You must also obtain a [free license to enable use](https://github.com/NewPath-Consulting/Wild-Apricot-Press#license). See the [NewPath website](https://newpathconsulting.com/wawp) to register for a free license.

## How to use
1. Make a new post or page.
2. Browse to the block inserter (`+` on the top left of the post editor) or use a slash (/) command to find the WAP iframe
 
![wap iframe block](https://user-images.githubusercontent.com/458134/132222439-628ca16b-8cb8-4879-8f8f-074160246ac1.jpg)

You now should be able to see the block settings panel on the right side of the editor.

![wap iframe options](https://user-images.githubusercontent.com/458134/132222635-e925d858-661f-45cd-9ac8-1a07db1e8cc9.jpg)

5. The Wild Apricot domain name `<yourorgname>` will display on the right and should reflect your authorized site set with the Authorization credentials. If you want a different domain (eg `anotherdomain.wildapricot.org`), you can enter it in the Wild Apricot Domain setting.
6.  The widget URL will reflect the URL path to the widget you wish to install. For example if you wish to insert a member's profile use /sys/profile:

![wap iframe member profile](https://user-images.githubusercontent.com/458134/132223214-2170edfa-f5a3-43f4-afd8-2130fa2bd19c.jpg)

Details on all available Wild Apricot widgets that can be used in an iframe black are available [here](https://gethelp.wildapricot.com/en/articles/222-using-widgets).

## How to contribute

#### Setup
0. Clone this repository in your WordPress site's `wp-content/plugins` folder.
1. Follow the instructions on [WordPress's block development environment setup tutorial](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/).
2. Enter the command `npm install` in the root of this directory.

#### Run and test
3. Run `npm start` to run the React compiler.
4. To test this plugin, activate it from the plugin UI and find "WAP Wild Apricot iFrame" in the block inserter. Since the plugin folder is already in the plugins directory, there is no need to reinstall it when you're testing. **Always make sure the build (in `build`) files are up-to-date when testing this plugin**.

#### Other useful `npm` commands
`npm start`
Starts the build for development.

`npm run build`
Builds the code for production.

`npm run format`
Formats files.

`npm run lint:css`
Lints CSS files.

`npm run lint:js`
Lints JavaScript files.

`npm run packages-update`
Updates WordPress packages to the latest version.
