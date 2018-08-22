<?php
/**
 * Plugin Name:  Partnerships
 * Description:  Add Partnerships
 * Version:      0.1
 * Text Domain: lasik-partnerships
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_PARTNERSHIPS_PLUGIN_DIR' ) )
  define( 'LASIK_PARTNERSHIPS_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Partnerships' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_Partnerships
   */
  class Lasik_Partnerships{

    /**
     * Initialize.
     */
    public function __construct() {
      // Init
      add_action( 'init', array( $this, 'init' ), 0 );
      // Admin init
      add_action( 'admin_init', array( $this, 'admin_init' ), 0 );
    }

    /**
     * Init.
     */
    public function init() {
      // Add custom post type
      $post_type_args = array(
        'labels'      => array(
          'name'          => __( 'Partnerships', 'lasik-partnerships' ),
          'singular_name' => __( 'Partnership', 'lasik-partnerships' ),
          'add_new' => __( 'Add New Partner', 'lasik-partnerships' ),
          'add_new_item' => __( 'Add New Partner', 'lasik-partnerships' ),
          'edit_item' => __( 'Edit Partner', 'lasik-partnerships' ),
          'new_item' => __( 'New Partner', 'lasik-partnerships' ),
          'view_item' => __( 'View Partner', 'lasik-partnerships' ),
          'view_items' => __( 'View Partners', 'lasik-partnerships' ),
          'search_items' => __( 'Search Partners', 'lasik-partnerships' ),
          'not_found' => __( 'No Partners found', 'lasik-partnerships' ),
          'not_found_in_trash' => __( 'No Partners found in trash', 'lasik-partnerships' ),
          'all_items' => __( 'All Partners', 'lasik-partnerships' ),
          'archives' => __( 'Partnership Archives', 'lasik-partnerships' ),
          'attributes' => __( 'Partnership Attributes', 'lasik-partnerships' ),
          'insert_into_item' => __( 'Insert into Partnership', 'lasik-partnerships' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Partner', 'lasik-partnerships' ),
          'featured_image' => __( 'Partner Picture', 'lasik-partnerships' ),
          'set_featured_image' => __( 'Set Partner Picture', 'lasik-partnerships' ),
          'remove_featured_image' => __( 'Remove Partner Picture', 'lasik-partnerships' ),
        ),
        'description' => __( 'Manage Partnerships', 'lasik-partnerships' ),
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => array('title', 'editor', 'thumbnail', ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
      );
      register_post_type( 'lasik_partnership', $post_type_args );

      // Localization
      load_plugin_textdomain( 'lasik-partnerships', false, LASIK_PARTNERSHIPS_PLUGIN_DIR . '/languages' );
    }

    /**
     * Admin Init.
     */
    public function admin_init() {
      // Change post title placeholder with a custom title
      add_filter( 'enter_title_here', 'lasik_partnerships_change_title_text' );
      function lasik_partnerships_change_title_text($title) {
        $screen = get_current_screen();

        if  ( 'lasik_partnership' == $screen->post_type ) {
          $title = 'Partner name';
        }

        return $title;
      }

      // Add caption to post editor
      add_action( 'edit_form_after_title', 'lasik_partnerships_add_text_after_title' );
      function lasik_partnerships_add_text_after_title() {
        $screen = get_current_screen();

        if  ( 'lasik_partnership' == $screen->post_type ) {
          echo '<h1 class="wp-heading-inline">Partner description</h1>';
        }
      }
    }
  }

endif;

new Lasik_Partnerships();