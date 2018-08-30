<?php
/**
 * Plugin Name:  FAQ
 * Description:  Add FAQ
 * Version:      0.1
 * Text Domain: lasik-faq
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_FAQ_PLUGIN_DIR' ) )
  define( 'LASIK_FAQ_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_FAQ' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_FAQ
   */
  class Lasik_FAQ{

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
          'name'          => __( 'FAQ', 'lasik-faq' ),
          'singular_name' => __( 'FAQ', 'lasik-faq' ),
          'add_new' => __( 'Add New Question', 'lasik-faq' ),
          'add_new_item' => __( 'Add New Question', 'lasik-faq' ),
          'edit_item' => __( 'Edit Question', 'lasik-faq' ),
          'new_item' => __( 'New Question', 'lasik-faq' ),
          'view_item' => __( 'View Question', 'lasik-faq' ),
          'view_items' => __( 'View Question', 'lasik-faq' ),
          'search_items' => __( 'Search FAQ', 'lasik-faq' ),
          'not_found' => __( 'No FAQ found', 'lasik-faq' ),
          'not_found_in_trash' => __( 'No FAQ found in trash', 'lasik-faq' ),
          'all_items' => __( 'All FAQ', 'lasik-faq' ),
          'archives' => __( 'FAQ Archives', 'lasik-faq' ),
          'attributes' => __( 'FAQ Attributes', 'lasik-faq' ),
          'insert_into_item' => __( 'Insert into FAQ', 'lasik-faq' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Question', 'lasik-faq' ),
          'featured_image' => __( 'Question Picture', 'lasik-faq' ),
          'set_featured_image' => __( 'Set Question Picture', 'lasik-faq' ),
          'remove_featured_image' => __( 'Remove Question Picture', 'lasik-faq' ),
        ),
        'description' => __( 'Manage FAQ', 'lasik-faq' ),
        'menu_icon' => 'dashicons-warning',
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
      register_post_type( 'lasik_faq', $post_type_args );
      register_taxonomy_for_object_type( 'category', 'lasik_faq' );

      // Register Market Taxonomy
      if ( taxonomy_exists( 'lasik_market' ) )
        register_taxonomy_for_object_type( 'lasik_market', 'lasik_faq' );

      // Localization
      load_plugin_textdomain( 'lasik-faq', false, LASIK_FAQ_PLUGIN_DIR . '/languages' );
    }

    /**
     * Admin Init.
     */
    public function admin_init() {
      // Change post title placeholder with a custom title
      add_filter( 'enter_title_here', 'lasik_faq_change_title_text' );
      function lasik_faq_change_title_text($title) {
        $screen = get_current_screen();

        if  ( 'lasik_faq' == $screen->post_type ) {
          $title = 'Enter the question here';
        }

        return $title;
      }

      // Add caption to post editor
      add_action( 'edit_form_after_title', 'lasik_faq_add_text_after_title' );
      function lasik_faq_add_text_after_title() {
        $screen = get_current_screen();

        if  ( 'lasik_faq' == $screen->post_type ) {
          echo '<h1 class="wp-heading-inline">Enter the answer</h1>';
        }
      }
    }
  }

endif;

new Lasik_FAQ();