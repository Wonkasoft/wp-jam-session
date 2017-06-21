<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wonkasoft.com
 * @since      1.0.0
 *
 * @package    Wp_Jam_Session
 * @subpackage Wp_Jam_Session/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Jam_Session
 * @subpackage Wp_Jam_Session/public
 * @author     Wonkasoft <info@wonkasoft.com>
 */
class Wp_Jam_Session_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * 
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Jam_Session_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Jam_Session_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-jam-session-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * 
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Jam_Session_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Jam_Session_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-jam-session-public.js', array( 'jquery' ), $this->version, false );

	}

	public function wp_jam_session_form_loader() {
		include plugin_dir_path( __FILE__ ) . 'partials/wp-jam-session-public-display.php';
	}

}
