<?php
/**
 * Plugin Name:  Reviews
 * Description:  Add review storage
 * Version:      0.1
 * Text Domain: lasik-reviews
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_REVIEWS_PLUGIN_DIR' ) )
  define( 'LASIK_REVIEWS_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Reviews' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_Reviews
   */
  class Lasik_Reviews {

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
          'name'          => __( 'Reviews', 'lasik-reviews' ),
          'singular_name' => __( 'Review', 'lasik-reviews' ),
          'add_new' => __( 'Add New Review', 'lasik-reviews' ),
          'add_new_item' => __( 'Add New Review', 'lasik-reviews' ),
          'edit_item' => __( 'Edit Review', 'lasik-reviews' ),
          'new_item' => __( 'New Review', 'lasik-reviews' ),
          'view_item' => __( 'View Review', 'lasik-reviews' ),
          'view_items' => __( 'View Reviews', 'lasik-reviews' ),
          'search_items' => __( 'Search Reviews', 'lasik-reviews' ),
          'not_found' => __( 'No Reviews found', 'lasik-reviews' ),
          'not_found_in_trash' => __( 'No Reviews found in trash', 'lasik-reviews' ),
          'all_items' => __( 'All Reviews', 'lasik-reviews' ),
          'archives' => __( 'Review Archives', 'lasik-reviews' ),
          'attributes' => __( 'Review Attributes', 'lasik-reviews' ),
          'insert_into_item' => __( 'Insert into Review', 'lasik-reviews' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Review', 'lasik-reviews' ),
          'featured_image' => __( 'Review Featured Image', 'lasik-reviews' ),
          'set_featured_image' => __( 'Set Review Featured Image', 'lasik-reviews' ),
          'remove_featured_image' => __( 'Remove Review Featured Image', 'lasik-reviews' ),
        ),
        'description' => __( 'Manage reviews', 'lasik-reviews' ),
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array('title', 'editor', 'thumbnail', ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'review', 'with_front' => false),
      );
      register_post_type( 'lasik_review', $post_type_args );

      // Register market taxonomy
      if ( taxonomy_exists( 'lasik_market' ) ) {
        register_taxonomy_for_object_type( 'lasik_market', 'lasik_review' );
      }

      // Localization
      load_plugin_textdomain( 'lasik-reviews', false, LASIK_PLUGIN_DIR . '/languages' );
    }
  }

endif;

new Lasik_Reviews();