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
          'add_new' => __( 'Add New Vision Center', 'lasik-locations' ),
          'add_new_item' => __( 'Add New Vision Center', 'lasik-locations' ),
          'edit_item' => __( 'Edit Vision Center', 'lasik-locations' ),
          'new_item' => __( 'New Vision Center', 'lasik-locations' ),
          'view_item' => __( 'View Vision Center', 'lasik-locations' ),
          'view_items' => __( 'View Vision Centers', 'lasik-locations' ),
          'search_items' => __( 'Search Vision Centers', 'lasik-locations' ),
          'not_found' => __( 'No Vision Centers found', 'lasik-locations' ),
          'not_found_in_trash' => __( 'No Vision Centers found in trash', 'lasik-locations' ),
          'all_items' => __( 'All Vision Centers', 'lasik-locations' ),
          'archives' => __( 'Vision Center Archives', 'lasik-locations' ),
          'attributes' => __( 'Vision Center Attributes', 'lasik-locations' ),
          'insert_into_item' => __( 'Insert into VisionCenter', 'lasik-locations' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Vision CEnter', 'lasik-locations' ),
          'featured_image' => __( 'Vision Center Featured Image', 'lasik-locations' ),
          'set_featured_image' => __( 'Set Vision Center Featured Image', 'lasik-locations' ),
          'remove_featured_image' => __( 'Remove Vision Center Featured Image', 'lasik-locations' ),
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
        'rewrite' => array( 'slug' => 'vision-center', 'with_front' => false),
      );
      register_post_type( 'lasik_location', $post_type_args );

      if ( taxonomy_exists( 'lasik_market' ) ) {
        register_taxonomy_for_object_type( 'lasik_market', 'lasik_location' );
      }

      // Localization
      load_plugin_textdomain( 'lasik-locations', false, LASIK_PLUGIN_DIR . '/languages' );
    }
  }

endif;

new Lasik_Locations();