<?php
/**
* The admin-specific functionality of the plugin.
*
* @link       https://wonkasoft.com
* @since      1.0.0
*
* @package    Wp_Jam_Session
* @subpackage Wp_Jam_Session/admin
*/

/**
* The admin-specific functionality of the plugin.
*
* Defines the plugin name, version, and two examples hooks for how to
* enqueue the admin-specific stylesheet and JavaScript.
*
* @package    Wp_Jam_Session
* @subpackage Wp_Jam_Session/admin
* @author     Wonkasoft <info@wonkasoft.com>
*/

add_filter( 'plugin_action_links_'. JAM_SESSION_BASENAME, 'wp_jam_session_add_settings_link_filter' , 10, 1);

function wp_jam_session_add_settings_link_filter( $links ) { 
 $settings_link = '<a href="admin.php?page=wp-jam-session-settings">Settings</a>';
 array_unshift( $links, $settings_link); 
 $links[] = '<a href="https://paypal.me/Wonkasoft" target="blank"><img src="' . plugin_dir_url( "wp-jam-session" ) . "wp-jam-session/admin/img/jam-session-box-logo.svg" . '" style="width: 20px; height: 15px; display:inline-block; vertical-align: text-top; float: none;" /></a>';
 return $links; 
}

add_filter( 'plugin_row_meta', 'jam_session_add_description_link_filter', 10, 2);

function jam_session_add_description_link_filter( $links, $file ) {
if ( strpos($file, 'wp-jam-session.php') !== false ) {
$links[] = '<a href="admin.php?page=wp-jam-session-settings" target="_self">Settings</a>';
$links[] = '<a href="https://wonkasoft.com/wp-jam-session" target="blank">Support</a>';
$links[] = '<a href="https://paypal.me/Wonkasoft" target="blank">Donate <img src="' . plugin_dir_url( "wp-jam-session" ) . "wp-jam-session/admin/img/jam-session-box-logo.svg" . '" style="width: 20px; height: 15px; display: inline-block; vertical-align: text-top; float: none;" /></a>';
}
return $links; 
}