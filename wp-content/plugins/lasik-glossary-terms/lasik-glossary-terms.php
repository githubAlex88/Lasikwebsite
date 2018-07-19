<?php
/**
 * Plugin Name:  Glossary Terms
 * Description:  Add Glossary Terms
 * Version:      0.1
 * Text Domain: lasik-glossary-terms
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_GLOSSARY_TERMS_PLUGIN_DIR' ) )
  define( 'LASIK_GLOSSARY_TERMS_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Glossary_Terms' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_Glossary_Terms
   */
  class Lasik_Glossary_Terms{

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
          'name'          => __( 'Glossary Terms', 'lasik-glossary-terms' ),
          'singular_name' => __( 'Glossary Term', 'lasik-glossary-terms' ),
          'add_new' => __( 'Add New Glossary Term', 'lasik-glossary-terms' ),
          'add_new_item' => __( 'Add New Glossary Term', 'lasik-glossary-terms' ),
          'edit_item' => __( 'Edit Glossary Term', 'lasik-glossary-terms' ),
          'new_item' => __( 'New Glossary Term', 'lasik-glossary-terms' ),
          'view_item' => __( 'View Glossary Term', 'lasik-glossary-terms' ),
          'view_items' => __( 'View Glossary Terms', 'lasik-glossary-terms' ),
          'search_items' => __( 'Search Glossary Terms', 'lasik-glossary-terms' ),
          'not_found' => __( 'No Glossary Terms found', 'lasik-glossary-terms' ),
          'not_found_in_trash' => __( 'No Glossary Terms found in trash', 'lasik-glossary-terms' ),
          'all_items' => __( 'All Glossary Terms', 'lasik-glossary-terms' ),
          'archives' => __( 'Glossary Term Archives', 'lasik-glossary-terms' ),
          'attributes' => __( 'Glossary Term Attributes', 'lasik-glossary-terms' ),
          'insert_into_item' => __( 'Insert into Glossary Term', 'lasik-glossary-terms' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Glossary Term', 'lasik-glossary-terms' ),
          'featured_image' => __( 'Glossary Term Picture', 'lasik-glossary-terms' ),
          'set_featured_image' => __( 'Set Glossary Term Picture', 'lasik-glossary-terms' ),
          'remove_featured_image' => __( 'Remove Glossary Term Picture', 'lasik-glossary-terms' ),
        ),
        'description' => __( 'Manage Glossary Terms', 'lasik-glossary-terms' ),
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'thumbnail', ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
      );
      register_post_type( 'lasik_glossary_term', $post_type_args );

      // Register Market Taxonomy
      if ( taxonomy_exists( 'lasik_market' ) )
        register_taxonomy_for_object_type( 'lasik_market', 'lasik_glossary_term' );

      // Localization
      load_plugin_textdomain( 'lasik-glossary-terms', false, LASIK_GLOSSARY_TERMS_PLUGIN_DIR . '/languages' );
    }

    /**
     * Admin Init.
     */
    public function admin_init() {
      // Change post title placeholder with a custom title
      add_filter( 'enter_title_here', 'lasik_glossary_term_change_title_text' );
      function lasik_glossary_term_change_title_text($title) {
        $screen = get_current_screen();

        if  ( 'lasik_glossary_term' == $screen->post_type ) {
          $title = 'Enter the term here';
        }

        return $title;
      }

      // Add caption to post editor
      add_action( 'edit_form_after_title', 'lasik_glossary_term_add_text_after_title' );
      function lasik_glossary_term_add_text_after_title() {
        $screen = get_current_screen();

        if  ( 'lasik_glossary_term' == $screen->post_type ) {
          echo '<h1 class="wp-heading-inline">Enter the description</h1>';
        }
      }
    }
  }

endif;

new Lasik_Glossary_Terms();