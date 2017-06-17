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

$url_para = (!isset($_POST['url-para'])) ? '': $_POST['url-para'];
$input_para = (!isset($_POST['input-para'])) ? '': $_POST['input-para'];
$type_form = (!isset($_POST['type-form'])) ? '': $_POST['type-form'];
$field_id = (!isset($_POST['field-id'])) ? '': $_POST['field-id'];
$WC_id = (!isset($_POST['WC-id'])) ? '': $_POST['WC-id'];
$term_time = (!isset($_POST['term-time'])) ? '': $_POST['term-time'];

// These are for checking the empty inputs
(!isset($_POST['url-para'])) ? $_POST['url-para'] = '': $_POST['url-para'];
(!isset($_POST['input-para'])) ? $_POST['input-para'] = '': $_POST['input-para'];
(!isset($_POST['field-id'])) ? $_POST['field-id'] = '': $_POST['field-id'];
(!isset($_POST['WC-id'])) ? $_POST['WC-id'] = '': $_POST['WC-id'];
(!isset($_POST['term-time'])) ? $_POST['term-time'] = '': $_POST['term-time'];

if ( ( !$_POST['url-para'] ) && ( !$_POST['input-para'] ) && ( !$_POST['field-id'] ) && ( !$_POST['WC-id'] ) && ( !$_POST['term-time'] ) ) { 
  
  if ( !empty($_POST['sendvalues']) ) {
  $input_array_onload = (!empty(get_option('wp-jam-session-input-para'))) ? get_option('wp-jam-session-input-para'): array();
  $return = json_encode($input_array_onload);
  echo $return;
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

if ( !empty($_POST['input-para']) ) {
    $input_array = (!empty(get_option('wp-jam-session-input-para'))) ? get_option('wp-jam-session-input-para'): array();
    $cleaning_array = explode(",", $input_para);
    foreach ($cleaning_array as $value) {
      array_push($input_array, $value);
    }
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