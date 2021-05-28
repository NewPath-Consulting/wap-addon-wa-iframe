# WAWP Wild Apricot iFrame Add On

This plugin installs a Gutenberg block which allows the user to include an iFrame with a Wild Apricot widget. 

## How to install
0. Clone or download this repository.
1. Compress the plugin folder.
2. Upload the plugin zip archive to your WordPress site using the plugin installer. 

OR

0. Clone or download this repository directly in your WordPress site's `wp-content/plugins` folder. 
1. Browse to the "Plugins" page on your site, look for "Wild Apricot iFrame Add-on for WAWP", and activate the plugin.



## How to contribute

#### Setup
0. Clone this repository in your WordPress site's `wp-content/plugins` folder. 
1. Follow the instructions on [WordPress's block development environment setup tutorial](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/).
2. Enter the command `npm install` in the root of this directory. 

#### Run and test
3. Run `npm start` to run the React compiler. 
4. To test this plugin, activate it from the plugin UI and find "Wild Apricot iFrame" in the block inserter. Since the plugin folder is already in the plugins directory, there is no need to reinstall it when you're testing. **Always make sure the build (in `build`) files are up-to-date when testing this plugin**.

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
