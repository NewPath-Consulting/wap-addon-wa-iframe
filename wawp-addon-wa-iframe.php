<?php
/**
 * Plugin Name:       Wild Apricot iFrame Add-on for WAWP
 * Description:       Showcase a Wild Apricot widget on your WordPress site with a Gutenberg block!
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            NewPath Consulting
 * License:           GPL-2.0-or-later
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

use WAWP\Addon;

function create_block_wawp_addon_wa_iframe_block_init() {
	register_block_type_from_metadata( __DIR__ );
	if (class_exists('WAWP\Addon')) {
		WAWP\Addon::instance()::new_addon(array('wawp-addon-wa-iframe' => 'Wild Apricot iFrame'));
	} else {
		deactivate_plugins(plugin_basename(__FILE__));
		wp_die(__('This plugin requires that Wild Apricot for Wordpress is installed. ', 'textdomain'));
	}
	
}

add_action( 'init', 'create_block_wawp_addon_wa_iframe_block_init' );
