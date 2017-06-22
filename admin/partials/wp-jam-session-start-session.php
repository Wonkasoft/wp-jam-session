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
  echo 'This session is exiting';
  exit;
}

// Load all settings into globals for checks
$GLOBALS['set_parmeter'] = get_option('wp-jam-session-url-para');
$GLOBALS['allowed_value'] = get_option('wp-jam-session-input-para');
$GLOBALS['form_type'] = get_option('wp-jam-session-type-form');
$GLOBALS['field_id'] = get_option('wp-jam-session-field-id');
$GLOBALS['session_term_time'] = get_option('wp-jam-session-term-time');

// Register session on init
add_action('init', 'wp_jam_session_register_session', 1);

// Setup session with expiration time
function wp_jam_session_register_session() {
  if( !session_id() ) {
    session_start();
    $add = new DateInterval("PT".$GLOBALS['session_term_time']."H"); // Interval of term in hours
    $date = new DateTime(); // Current time
    $date->add($add); // adds term time from settings page
    $expiration = $date->format('h'); // loads the expiration time
    $_SESSION['expiration'] = $expiration;
  }
}

add_action('wp_logout', 'wp_jam_session_end_session');

// End session on logout
function wp_jam_session_end_session() {
  session_destroy ();
}

add_action('wp_head', 'wp_jam_session_header_config');

function wp_jam_session_header_config() {
  // load current time for expiration check
  $current_set = new DateTime();
  $current_time = $current_set->format('h');

  // For checking expiration time of a session and destroying that which is expired
  if ( $current_time > $_SESSION['expiration'] ) {
    session_destroy();
  }

  // Check for 
  if (!$_SESSION[$GLOBALS['set_parmeter']] && $_GET[$GLOBALS['set_parmeter']] != '' && in_array($_GET[$GLOBALS['set_parmeter']], $GLOBALS['allowed_value'])) {  
    
    // Set the session variable
    $_SESSION['value'] = sanitize_text_field($_GET[$GLOBALS['set_parmeter']]);

  } elseif (!$_SESSION[$GLOBALS['set_parmeter']] && $_GET[$GLOBALS['set_parmeter']] =='') {


  }

  // If new parameter is set then update session variable 
  if ($_SESSION[$GLOBALS['set_parmeter']] != $_GET[$GLOBALS['set_parmeter']] && $_GET[$GLOBALS['set_parmeter']] != '') {

    // Set the session variable
    $_SESSION['value'] = sanitize_text_field($_GET[$GLOBALS['set_parmeter']]);
    $_SESSION['allowed_value'] = $_GET[$GLOBALS['allowed_value']];

    if (!in_array($_SESSION[$GLOBALS['set_parmeter']], $GLOBALS['allowed_value'])) {

    }
  } 
}

// Add value to the selected woocommerce form, from the session variable
function wp_jam_session_load_wc_form( $fields ) {
  if ( !empty( $_SESSION['value'] ) ) {
    $fields['billing'][$GLOBALS['field_id']]['default'] = $_SESSION['value'];
  }
  return $fields;
}

// Check for form type and if it is WooCommerce run form filter
if ( $GLOBALS['form_type'] == 'WooCommerce' ) {
  add_filter( 'woocommerce_checkout_fields', 'wp_jam_session_load_wc_form' );
}