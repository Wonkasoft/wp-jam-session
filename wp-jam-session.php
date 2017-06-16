<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wonkasoft.com
 * @since             1.0.0
 * @package           Wp_Jam_Session
 *
 * @wordpress-plugin
 * Plugin Name:       WP Jam Session
 * Plugin URI:        https://wonkasoft.com/wp-jam-session
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Wonkasoft
 * Author URI:        https://wonkasoft.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-jam-session
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-jam-session-activator.php
 */
function activate_wp_jam_session() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-jam-session-activator.php';
	Wp_Jam_Session_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-jam-session-deactivator.php
 */
function deactivate_wp_jam_session() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-jam-session-deactivator.php';
	Wp_Jam_Session_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_jam_session' );
register_deactivation_hook( __FILE__, 'deactivate_wp_jam_session' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-jam-session.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_jam_session() {

	$plugin = new Wp_Jam_Session();
	$plugin->run();

}
run_wp_jam_session();

/**
*
* Add settings, support, and donate links on plugin page.
*
* These links are only added to the action links
* and should show when plugin is actived
* 
* @since 1.0.0
*/
function add_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=wp-jam-session-settings">Settings</a>'; 
  $support_link = '<a href="https://wonkasoft.com/wp-jam-session" target="blank">Support</a>';
  $donate_link = '<a href="https://wonkasoft.com/wp-jam-session/donate" target="blank">Donate</a>';
  array_unshift($links, $settings_link, $support_link, $donate_link); 
  return $links; 
}
     
add_filter("plugin_action_links_" . plugin_basename(__FILE__), 'add_settings_link' );