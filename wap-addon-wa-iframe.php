<?php
/**
 * Plugin Name:       WildApricot Press iFrame Add-on
 * Description:       Showcase a Wild Apricot widget using an iframe on your WordPress site with a Gutenberg block!
 * Requires at least: 5.7
 * Requires PHP:      7.4
 * Version:           1.0b4
 * Author:            NewPath Consulting
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wap-addon-wa-iframe
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


const WAWP_IFRAME_SLUG = 'wap-addon-iframe'; 
const WAWP_IFRAME_SHOW_NOTICE_ACTIVATION = 'show_notice_activation_' . WAWP_IFRAME_SLUG;
const WAWP_IFRAME_LICENSE_CHECK = 'license-check-' . WAWP_IFRAME_SLUG;
const WAWP_IFRAME_NAME = 'Wild Apricot iFrame Add-on for WAP';

add_action( 'init', 'create_block_wawp_addon_wa_iframe_block_init' );
function create_block_wawp_addon_wa_iframe_block_init() {
	if (!class_exists('WAWP\Addon')) {
		add_action('admin_init', 'wawp_iframe_not_loaded_die');
		return;
	}
	$license_valid = WAWP\Addon::instance()::has_valid_license(WAWP_IFRAME_SLUG);
	if (!$license_valid) return;
	register_block_type_from_metadata( __DIR__ );

}

/**
 * Error message for if WAWP is not installed or activated.
 */
function wawp_iframe_not_loaded_notice_msg() {
	echo "<div class='notice notice-error'><p><strong>";
	echo WAWP_IFRAME_NAME . '</strong> requires that Wild Apricot for Wordpress is installed and activated.</p></div>';
	unset($_GET['activate']);
	return;
}

function wawp_iframe_not_loaded_die() {
	deactivate_plugins(plugin_basename(__FILE__));
	add_action('admin_notices', 'wawp_iframe_not_loaded_notice_msg');
}

// add_action('init', 'add_to_addon_list');
// function add_to_addon_list() {
	if (class_exists('WAWP\Addon')) {
		WAWP\Addon::instance()::new_addon(array(
			'slug' => WAWP_IFRAME_SLUG,
			'name' => WAWP_IFRAME_NAME,
			'filename' => plugin_basename(__FILE__),
			'license_check_option' => WAWP_IFRAME_LICENSE_CHECK,
			'show_activation_notice' => WAWP_IFRAME_SHOW_NOTICE_ACTIVATION,
			'is_addon' => 1,
			'blocks' => array(
				'wawp/wawp-addon-wa-iframe',
			)
		));
	}
// }

/**
 * Activation function.
 * Checks if WAWP is loaded. Deactivate if not.
 * Calls Addon::activate() function which checks for a license key and sets appropriate flags.
 */
register_activation_hook(plugin_basename(__FILE__), 'wawp_iframe_activate');
function wawp_iframe_activate() {
	if (!class_exists('WAWP\Addon')) {
		add_action('admin_init', 'wawp_iframe_not_loaded_die');
		return;
	}

	WAWP\Addon::instance()::activate(WAWP_IFRAME_SLUG);
}

/**
 * Deactivation function.
 * Deletes the plugin from the list of WAWP plugins in the options table.
 */
register_deactivation_hook(plugin_basename(__FILE__), 'wawp_iframe_deactivate');
function wawp_iframe_deactivate() {
	// remove from addons list
	$addons = get_option('wawp_addons');
	unset($addons[WAWP_IFRAME_SLUG]);
	update_option('wawp_addons', $addons);
}

?>