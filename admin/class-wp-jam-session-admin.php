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
class Wp_Jam_Session_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Jam_Session_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Jam_Session_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		// Check to see if bootstrap style is already enqueue before setting the enqueue
		wp_enqueue_style( $this->plugin_name, str_replace( array('http:', 'https:'), '', plugin_dir_url( __FILE__ ) . 'css/wp-jam-session-admin.css'), $this->version, 'all' );

		$style = 'bootstrap';
		if( ( ! wp_style_is( $style, 'enqueued' ) ) && ( ! wp_style_is( $style, 'done' ) ) ) {
	    //queue up your bootstrap
			wp_enqueue_style( $style, str_replace( array('http:', 'https:'), '', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css'), '3.3.7', 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Jam_Session_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Jam_Session_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		// Check to see if bootstrap js is already enqueue before setting the enqueue
		wp_enqueue_script( $this->plugin_name, str_replace( array('http:', 'https:'), '', plugin_dir_url( __FILE__ ) . 'js/wp-jam-session-admin.js'), array( 'jquery' ), $this->version, false );

		$bootstrapjs = 'bootstrap-js';
		if ( ( ! wp_script_is( $bootstrapjs, 'enqueued') ) && ( ! wp_script_is($bootstrapjs, 'done') ) ) {
		 	// enqueue bootstrap js
			wp_enqueue_script( $bootstrapjs, str_replace( array('http:', 'https:'), '', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js'), array( 'jquery' ), '3.3.7', false );
		 } 
	
	}

	public function display_admin_page() {
		add_menu_page(
			'WP Jam Session',
			'WP Jam Session',
			'manage_options',
			'wp-jam-session-settings',
			array($this,'showSettingsPage'),
			plugins_url("/img/Jam-Session-Box-Logo.svg", __FILE__),
			'8.0'
			);
	}

	public function showSettingsPage () {
		include plugin_dir_path( __FILE__ ) . 'partials/wp-jam-session-admin-display.php';
	}

}