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


if ( ( !$_POST['url-para'] ) && ( !$_POST['input-para'] )
 && ( !$_POST['field-id'] ) && ( !$_POST['WC-id'] ) && ( !$_POST['term-time'] ) ) { 
  return;
}

if ( !empty($_POST['url-para']) ) {
echo $_POST['url-para'];
}

