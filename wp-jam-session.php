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


// add_action('init', 'register_my_session', 1);
// add_action('wp_logout', 'myEndSession');
// add_action('wp_login', 'myEndSession');
// add_action('wp_head', 'header_config');
// // Setup session
// function register_my_session() {
//   if( !session_id() )
//   {
//     session_start();
//   }
// }
// // End session
// function myEndSession() {
//   session_destroy ();
// }
// // Set session variable for rep number and discount number
// // Validate by parameter
// // If repnum is not set then the user will be redirected to the 404 page
// function header_config() {
// // Validation by repnum
// // if valid then set session variable for repnum
//   if (!$_SESSION['repnum'] && $_GET['repnum'] != '') {
//     $_SESSION['repnum'] = $_GET['repnum'];
//   } elseif ($_SESSION['repnum'] == '' && $_GET['repnum'] =='') {
//           status_header( 404 );
//           nocache_headers();
//           include( get_query_template( '404' ) );
//           die();
//     }
// // If new parameter sent update session variable for repnum
//   if ($_SESSION['repnum'] != $_GET['repnum'] && $_GET['repnum'] != '') {
//     $_SESSION['repnum'] = $_GET['repnum'];
//   }
// // Set discount variable by parameter
//   if (!$_SESSION['discount'] && $_GET['discount']!=''){
//     $_SESSION['discount'] = $_GET['discount'];
//   }
// // If new parameter sent update session variable for discount
//   if ($_SESSION['discount'] != $_GET['discount'] && $_GET['discount'] != '') {
//     $_SESSION['discount'] = $_GET['discount'];
//   }
// }