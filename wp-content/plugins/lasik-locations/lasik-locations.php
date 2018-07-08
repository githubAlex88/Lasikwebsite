<?php
/**
 * Plugin Name:  Locations
 * Description:  Add location and centers
 * Version:      0.1
 * Text Domain: lasik-locations
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_PLUGIN_DIR' ) )
  define( 'LASIK_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Locations' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_Locations
   */
  class Lasik_Locations {

    /**
     * Initialize.
     */
    public function __construct() {
      // Init
      add_action( 'init', array( $this, 'init' ), 0 );
    }

    /**
     * Init.
     */
    public function init() {
      // Add custom post type
      $post_type_args = array(
        'labels'      => array(
          'name'          => __( 'Vision Centers', 'lasik-locations' ),
          'singular_name' => __( 'Vision Center', 'lasik-locations' ),
          'all_items' => __( 'All Vision Centers', 'lasik-locations' ),
          'add_new_item' => __( 'Add New Vision Center', 'lasik-locations' ),
        ),
        'description' => __( 'Manage vision centers', 'lasik-locations' ),
        'menu_icon' => 'dashicons-admin-site',
        'supports' => array('title', 'editor', 'thumbnail', ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
      );
      register_post_type( 'lasik_location', $post_type_args );

      // Localization
      load_plugin_textdomain( 'lasik-locations', false, LASIK_PLUGIN_DIR . '/languages' );
    }
  }

endif;

new Lasik_Locations();