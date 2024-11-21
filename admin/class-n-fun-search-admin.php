<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nampil.dev
 * @since      1.0.0
 *
 * @package    N_Fun_Search
 * @subpackage N_Fun_Search/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    N_Fun_Search
 * @subpackage N_Fun_Search/admin
 * @author     Nampil <nampil.dev@gmail.com>
 */
class N_Fun_Search_Admin {

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
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in N_Fun_Search_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The N_Fun_Search_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/n-fun-search-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in N_Fun_Search_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The N_Fun_Search_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/n-fun-search-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add custom Menu.
	 *
	 * @since    1.0.0
	 */

	public function nfs_add_admin_menu() {

		add_menu_page(
			'N Fun Search',
			'N Fun Search',
			'manage_options',
			'n-fun-search',
			array( $this, 'nfs_admin_menu' ),
			'dashicons-search',
			6
		);
	}

	/**
	 * Display the custom Menu.
	 *
	 * @since    1.0.0
	 */

	public function nfs_admin_menu() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/n-fun-search-admin-display.php';
	}

}
