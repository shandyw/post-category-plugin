<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://shandyward.com/
 * @since             1.0.0
 * @package           Post_Category
 *
 * @wordpress-plugin
 * Plugin Name:       Post Category
 * Plugin URI:        https://github.com/shandyw/post-category-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Shandy Ward
 * Author URI:        https://shandyward.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       post-category
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'POST_CATEGORY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-post-category-activator.php
 */
function activate_post_category() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-category-activator.php';
	Post_Category_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-post-category-deactivator.php
 */
function deactivate_post_category() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-category-deactivator.php';
	Post_Category_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_post_category' );
register_deactivation_hook( __FILE__, 'deactivate_post_category' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-post-category.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_post_category() {

	$plugin = new Post_Category();
	$plugin->run();

}
run_post_category();
