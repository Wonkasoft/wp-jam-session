<?php
/**
 * Run ajax for settings form
 *
 * This file is used to process all of the settings form data for the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Wp_Jam_Session
 * @subpackage Wp_Jam_Session/admin/partials
 */

if ( isset($_POST) ) {
  if ( ( !$_POST['url-para'] ) && ( !$_POST['input-para'] )
   && ( !$_POST['field-id'] ) && ( !$_POST['WC-id'] ) && ( !$_POST['term-time'] ) ) { 
    return;
  }
}

if ( !empty($_POST['url-para']) ) {

$urlpara = $_POST['url-para'];
$typeform = $_POST['type-form'];
$fieldid = $_POST['field-id'];
$inputpara = $_POST['input-para'];
$WCid = $_POST['WC-id'];
$termtime = $_POST['term-time'];

update_option( 'wp-jam-session-url-para', $urlpara, 'yes' );
update_option( 'wp-jam-session-type-form', $typeform, 'yes' );
update_option( 'wp-jam-session-field-id', $fieldid, 'yes' );
update_option( 'wp-jam-session-input-para', $inputpara, 'yes' );
update_option( 'wp-jam-session-WC-id', $WCid, 'yes' );
update_option( 'wp-jam-session-term-time', $termtime, 'yes' );


}

