<?php
/**
 * Plugin Name:       WAP Wild Apricot iFrame Add-on
 * Description:       Showcase a Wild Apricot widget using an iframe on your WordPress site with a Gutenberg block!
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           1.0
 * Author:            NewPath Consulting
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wawp-addon-wa-iframe
 *
 * @package           wawp
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */

// use WAWP\Addon;
use WAWP\Activator;

//$activator_dir = ABSPATH . 'wp-content/plugins/wawp/src/Activator.php';
//require_once ($activator_dir);
require_once plugin_dir_path(__FILE__) . '../Wild-Apricot-Press/src/Activator.php';

function create_block_wawp_addon_wa_iframe_block_init() {
	register_block_type_from_metadata( __DIR__ );
	if (!class_exists('WAWP\Activator')) {
		deactivate_plugins(plugin_basename(__FILE__));
		add_action('admin_notices', 'wawp_not_loaded');
	}
}

function wawp_not_loaded() {
    printf(
      '<div class="error"><p>%s</p></div>',
      __('This plugin requires that Wild Apricot Press is installed.')
    );
}

add_action( 'init', 'create_block_wawp_addon_wa_iframe_block_init' );

if (class_exists('WAWP\Activator')) {
	$activator = new WAWP\Activator('wawp-addon-wa-iframe', plugin_basename(__FILE__), 'Wild Apricot iFrame Add-on');
}

