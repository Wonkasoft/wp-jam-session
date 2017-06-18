<?php
/**
 * Run ajax for settings form
 *
 * This file is used to process all of the settings form data for the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 * @access   private
 *
 * @package    Wp_Jam_Session
 * @subpackage Wp_Jam_Session/admin/partials
 */
$file_path = realpath(dirname(__FILE__). '/../../../../..'). '/';
require( $file_path . 'wp-load.php' );
global $wpdb;

$url_para = (!isset($_POST['url-para'])) ? '': sanitize_text_field($_POST['url-para']);
$url_para = str_replace(" ","",$url_para);
$input_para = (!isset($_POST['input-para'])) ? '': sanitize_text_field($_POST['input-para']);
$input_para = str_replace(" ","",$input_para);
$type_form = (!isset($_POST['type-form'])) ? '': sanitize_text_field($_POST['type-form']);
$url_link = (!isset($_POST['url-link'])) ? '': esc_url($_POST['url-link']);
$field_id = (!isset($_POST['field-id'])) ? '': sanitize_text_field($_POST['field-id']);
$field_id = str_replace(" ","",$field_id);
$WC_id = (!isset($_POST['WC-id'])) ? '': sanitize_text_field($_POST['WC-id']);
$WC_id = str_replace(" ","",$WC_id);
$term_time = (!isset($_POST['term-time'])) ? '': sanitize_text_field($_POST['term-time']);
$term_time = str_replace(" ","",$term_time);

// These are for checking the empty inputs
(!isset($_POST['url-para'])) ? $_POST['url-para'] = '': sanitize_text_field($_POST['url-para']);
(!isset($_POST['input-para'])) ? $_POST['input-para'] = '': sanitize_text_field($_POST['input-para']);
(!isset($_POST['field-id'])) ? $_POST['field-id'] = '': sanitize_text_field($_POST['field-id']);
(!isset($_POST['url-link'])) ? $_POST['url-link'] = '': esc_url($_POST['url-link']);
(!isset($_POST['WC-id'])) ? $_POST['WC-id'] = '': sanitize_text_field($_POST['WC-id']);
(!isset($_POST['term-time'])) ? $_POST['term-time'] = '': sanitize_text_field($_POST['term-time']);

if ( ( !$_POST['url-para'] ) && ( !$_POST['input-para'] ) && ( !$_POST['field-id'] ) && ( !$_POST['url-link'] ) && ( !$_POST['WC-id'] ) && ( !$_POST['term-time'] ) ) { 

  // This is for getting data to build accepted values list
  if ( !empty($_POST['sendvalues']) ) {
  $input_array_onload = (!empty(get_option('wp-jam-session-input-para'))) ? get_option('wp-jam-session-input-para'): array();
  $input_array_onload = array_filter($input_array_onload);
  $return = json_encode($input_array_onload);
  echo $return;
}

// This is for removing values
if ( !empty($_POST['remove-value']) ) {
  $input_array_remove = (!empty(get_option('wp-jam-session-input-para'))) ? get_option('wp-jam-session-input-para'): array();
  if(($key = array_search($_POST['remove-value'], $input_array_remove)) !== false) {
    unset($input_array_remove[$key]);
    $input_array_remove = array_values($input_array_remove);
  }
  if(($key = array_search('', $input_array_remove)) !== false) {
    unset($input_array_remove[$key]);
    $input_array_remove = array_values($input_array_remove);
  }
  update_option( 'wp-jam-session-input-para', $input_array_remove, 'yes' );
  $return = json_encode($input_array_remove);
  echo $return;

  }

  // This is for current values for link creation
  if ( !empty($_POST['current-value']) ) {
    update_option( 'wp-jam-session-current-value', $_POST['current-value'], 'yes' );
    $created_link = (!empty(get_option('wp-jam-session-url-link'))) ? get_option('wp-jam-session-url-link') . '?' . get_option('wp-jam-session-url-para') . '=' . get_option('wp-jam-session-current-value'): '';
    echo $created_link;
  }
  return;
}


if ( !empty($_POST['url-para']) ) {

    update_option( 'wp-jam-session-url-para', $url_para, 'yes' );
}

if ( !empty($_POST['type-form']) ) {

    update_option( 'wp-jam-session-type-form', $type_form, 'yes' );
}

if ( !empty($_POST['field-id']) ) {

    update_option( 'wp-jam-session-field-id', $field_id, 'yes' );
}

if ( !empty($_POST['url-link']) ) {

    update_option( 'wp-jam-session-url-link', $url_link, 'yes' );
}

if ( !empty($_POST['input-para']) ) {
    $input_array = (!empty(get_option('wp-jam-session-input-para'))) ? get_option('wp-jam-session-input-para'): array();
    $cleaning_array = explode(",", $input_para);
    foreach ($cleaning_array as $value) {
      array_push($input_array, $value);
    }
    $input_array = array_unique($input_array);
    $input_array = array_filter($input_array);
    $input_array = array_slice($input_array, 0, 5);

    update_option( 'wp-jam-session-input-para', $input_array, 'yes' );
    $return = json_encode($input_array);
    echo $return;
}

if ( !empty($_POST['WC-id']) ) {

    update_option( 'wp-jam-session-WC-id', $WC_id, 'yes' );
}

if ( !empty($_POST['term-time']) ) {
  
    update_option( 'wp-jam-session-term-time', $term_time, 'yes' );
}