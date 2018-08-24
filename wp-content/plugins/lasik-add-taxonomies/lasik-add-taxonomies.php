<?php
/**
 * Plugin Name:  Taxonomies
 * Description:  Add custom taxonomies to CMS
 * Version:      0.1
 * Text Domain: lasik-taxonomies
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_TAXONOMIES_DIR' ) )
  define( 'LASIK_TAXONOMIES_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Taxonomies' ) ) :

  /**
   * Main Class.
   *
   * @class Lasik_Taxonomies
   */
  class Lasik_Taxonomies {

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
      // Add custom market taxonomy
      $this->register_custom_taxonomy( 'market' );
      if ( taxonomy_exists( 'lasik_market' ) ) {
        register_taxonomy_for_object_type( 'lasik_market', 'post' );
      }

      // Add custom job taxonomy
      $this->register_custom_taxonomy( 'job' );

      // Add primary tag taxonomy
      $this->register_custom_taxonomy( 'primary_tag' );
      if ( taxonomy_exists( 'lasik_primary_tag' ) ) {
        register_taxonomy_for_object_type( 'lasik_primary_tag', 'post' );
        register_taxonomy_for_object_type( 'lasik_primary_tag', 'page' );
      }

      // Localization
      load_plugin_textdomain( 'lasik-taxonomies', false, LASIK_PLUGIN_DIR . '/languages' );
    }

    /**
     * Register custom taxonomy to be used for posts in CMS
     *
     * @param string $slug
     */
    public function register_custom_taxonomy($slug ) {
      // Assure slug is lowercase
      $slug = strtolower( $slug );
      // Uppercase for first letter
      $singular = ucfirst( str_replace("_", " ", $slug ) );
      // Add s to end of string
      $plural = $singular . 's';
      // Taxonomy arguments
      $taxonomy_args = array(
        'labels'      => array(
          'name'          => __( $plural, "lasik-taxonomies" ),
          'singular_name' => __( $singular, "lasik-taxonomies" ),
          'all_items' => __( "All {$plural}", "lasik-taxonomies" ),
          'edit_item' => __( "Edit {$singular}", "lasik-taxonomies" ),
          'view_item' => __( "View {$singular}", "lasik-taxonomies" ),
          'update_item' => __( "Update {$singular}", "lasik-taxonomies" ),
          'add_new_item' => __( "Add New {$singular}", "lasik-taxonomies" ),
          'new_item_name' => __( "New {$singular} Name", "lasik-taxonomies" ),
          'search_items' => __( "Search {$plural}", "lasik-taxonomies" ),
          'popular_items' => __( "Most used {$plural}", "lasik-taxonomies" ),
          'add_or_remove_items' => __( "Add or remove {$plural}", "lasik-taxonomies" ),
          'choose_from_most_used' => __( "Choose from the most used {$plural}", "lasik-taxonomies" ),
          'not_found' => __( "No {$plural} found", "lasik-taxonomies" ),
        ),
        'description' => __( "{$singular} taxonomy", "lasik-taxonomies" ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
      );
      // Register taxonomy
      register_taxonomy( "lasik_{$slug}", '', $taxonomy_args );
    }
  }

endif;

new Lasik_Taxonomies();