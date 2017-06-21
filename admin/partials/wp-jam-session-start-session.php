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
   $GLOBALS['set_parmeter'] = get_option('wp-jam-session-url-para');
   $GLOBALS['allowed_value'] = get_option('wp-jam-session-input-para');
   $GLOBALS['form_type'] = get_option('wp-jam-session-type-form');
   $GLOBALS['form_id'] = get_option('wp-jam-session-field-id');
   $GLOBALS['session_term_time'] = get_option('wp-jam-session-term-time');
   $GLOBALS['WC_form_name'] = strtolower(get_option('wp-jam-session-WC-id'));


  add_action('init', 'wp_jam_session_register_session', 1);
    // Setup session
    function wp_jam_session_register_session() {
      if( !session_id() )
      {
        session_start();
      }
    }

    add_action('wp_logout', 'wp_jam_session_end_session');
    // End session
    function wp_jam_session_end_session() {
      session_destroy ();
    }

   
    switch ($GLOBALS['WC_form_name']) {
        
        case 'billing':
          $WC_form_filter = 'woocommerce_checkout_fields';
          break;

        case 'checkout':
          $WC_form_filter = 'woocommerce_checkout_fields';  
            
          break;
        
        default:
          $WC_form_filter = 'woocommerce_admin_billing_fields';
          
          break;
      }

    add_action('wp_head', 'header_config');

    function header_config() {
 // Load all WP Jam Session options into varables
   // $set_parmeter = get_option('wp-jam-session-url-para');
   // $allowed_value = get_option('wp-jam-session-input-para');
   // $form_type = get_option('wp-jam-session-type-form');
   // $form_id = get_option('wp-jam-session-field-id');
   // $session_term_time = get_option('wp-jam-session-term-time');
   echo '<script>alert("'.$GLOBALS['set_parmeter'].'");</script>';
    // Check for empty session then vailidate value then set the session variable
    if (!$_SESSION[$GLOBALS['set_parmeter']] && $_GET[$GLOBALS['set_parmeter']] != '' && in_array($_GET[$GLOBALS['set_parmeter']], $GLOBALS['allowed_value'])) {  
      // Set the session variable
      $_SESSION['value'] = sanitize_text_field($_GET[$GLOBALS['set_parmeter']]);
      $_SESSION['form_type'] = $form_type;
      $_SESSION['form_id'] = $form_id;
      
    } elseif (!$_SESSION[$GLOBALS['set_parmeter']] && $_GET[$GLOBALS['set_parmeter']] =='') {
        $_SESSION['value'] = '';
        $_SESSION['form_type'] = '';
        $_SESSION['form_id'] = ''; 
              
      }

// If new parameter is set then update session variable 
      if ($_SESSION[$GLOBALS['set_parmeter']] != $_GET[$GLOBALS['set_parmeter']] && $_GET[$GLOBALS['set_parmeter']] != '') {
         // Set the session variable
      $_SESSION['value'] = sanitize_text_field($_GET[$GLOBALS['set_parmeter']]);
      $_SESSION['form_type'] = $GLOBALS['form_type'];
      $_SESSION['allowed_value'] = $_GET[$GLOBALS['allowed_value']];
      $_SESSION['form_id'] = $GLOBALS['form_id'];
        if (!in_array($_SESSION[$GLOBALS['set_parmeter']], $GLOBALS['allowed_value'])) {
          
        }
      } 
    }
// Add value to the selected woocommerce form, from the session variable
function wp_jam_session_load_wc_form( $fields ) {
    $parmeter = $_SESSION['value'];
    $WC_form_name = $_SESSION['WC_form_name'];
    $form_id = $_SESSION['form_id'];
    if ( !empty( $_SESSION['value'] ) ) {
    $fields[$WC_form_name][$form_id]['default'] = $parmeter;
    }
    return $fields;
}
add_filter( $WC_form_filter, 'wp_jam_session_load_wc_form' );