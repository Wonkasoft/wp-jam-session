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
if (!defined('ABSPATH')) {
  echo 'Start Session is exiting';
  exit;
}


  add_action('init', 'register_my_session', 1);
    // Setup session
    function register_my_session() {
      if( !session_id() )
      {
        session_start();
      }
    }

    add_action('wp_logout', 'myEndSession');
    // End session
    function myEndSession() {
      session_destroy ();
    }

    add_action('wp_head', 'header_config');

    // Validate by parameter
    function header_config() {
    // Validation by value
    // if valid then set session variable for value
      $set_parmeter = get_option('wp-jam-session-url-para');
      $allowed_value = get_option('wp-jam-session-input-para');
      // Check for empty session then vailidate value then set the session variable
      if ((!$set_parmeter) && ($set_parmeter != '')) {
        // Set the session variable
        $set_parmeter = sanitize_text_field($_GET[$set_parmeter]);
      } elseif ((!$set_parmeter) && ($set_parmeter =='')) {
              
              // session_destroy ();
              // status_header( 404 );
              // nocache_headers();
              // include( get_query_template( '404' ) );
              die();
      }

// If new parameter is set then update session variable 
      if ($set_parmeter != $set_parmeter && $set_parmeter != '') {
        $_SESSION[$set_parmeter] = sanitize_text_field($set_parmeter);
        if (!in_array($_SESSION[$set_parmeter], $allowed_value)) {
      // session_destroy();
      // status_header( 401 );
      // nocache_headers();
      // include( get_query_template( 'norep' ) );
      die();
        }
      } 
    }