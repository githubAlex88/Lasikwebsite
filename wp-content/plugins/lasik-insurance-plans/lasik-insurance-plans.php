<?php
/**
 * Plugin Name:  Insurance Plans
 * Description:  Add Insurance Plans
 * Version:      0.1
 * Text Domain: lasik-insurance-plans
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_INSURANCE_PLANS_PLUGIN_DIR' ) )
  define( 'LASIK_INSURANCE_PLANS_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Insurance_Plans' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_Insurance_Plans
   */
  class Lasik_Insurance_Plans{

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
          'name'          => __( 'Insurance Plans', 'lasik-insurance-plans' ),
          'singular_name' => __( 'Insurance Plan', 'lasik-insurance-plans' ),
          'add_new' => __( 'Add New Insurance Plan', 'lasik-insurance-plans' ),
          'add_new_item' => __( 'Add New Insurance Plan', 'lasik-insurance-plans' ),
          'edit_item' => __( 'Edit Insurance Plan', 'lasik-insurance-plans' ),
          'new_item' => __( 'New Insurance Plan', 'lasik-insurance-plans' ),
          'view_item' => __( 'View Insurance Plan', 'lasik-insurance-plans' ),
          'view_items' => __( 'View Insurance Plans', 'lasik-insurance-plans' ),
          'search_items' => __( 'Search Insurance Plans', 'lasik-insurance-plans' ),
          'not_found' => __( 'No Insurance Plans found', 'lasik-insurance-plans' ),
          'not_found_in_trash' => __( 'No Insurance Plans found in trash', 'lasik-insurance-plans' ),
          'all_items' => __( 'All Insurance Plans', 'lasik-insurance-plans' ),
          'archives' => __( 'Insurance Plan Archives', 'lasik-insurance-plans' ),
          'attributes' => __( 'Insurance Plan Attributes', 'lasik-insurance-plans' ),
          'insert_into_item' => __( 'Insert into InsurancePlan', 'lasik-insurance-plans' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Insurance Plan', 'lasik-insurance-plans' ),
          'featured_image' => __( 'Insurance Plan Picture', 'lasik-insurance-plans' ),
          'set_featured_image' => __( 'Set Insurance Plan Picture', 'lasik-insurance-plans' ),
          'remove_featured_image' => __( 'Remove Insurance Plan Picture', 'lasik-insurance-plans' ),
        ),
        'description' => __( 'Manage Insurance Plans', 'lasik-insurance-plans' ),
        'menu_icon' => 'dashicons-shield',
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
      register_post_type( 'lasik_insurance_plan', $post_type_args );

      // Localization
      load_plugin_textdomain( 'lasik-insurance-plans', false, LASIK_INSURANCE_PLANS_PLUGIN_DIR . '/languages' );
    }

    /**
     * Admin Init.
     */
    public function admin_init() {
      // Change post title placeholder with a custom title
      add_filter( 'enter_title_here', 'lasik_insurance_plans_change_title_text' );
      function lasik_insurance_plans_change_title_text($title) {
        $screen = get_current_screen();

        if  ( 'lasik_insurance_plan' == $screen->post_type ) {
          $title = 'Plan name';
        }

        return $title;
      }

      // Add caption to post editor
      add_action( 'edit_form_after_title', 'lasik_insurance_plans_add_text_after_title' );
      function lasik_insurance_plans_add_text_after_title() {
        $screen = get_current_screen();

        if  ( 'lasik_insurance_plan' == $screen->post_type ) {
          echo '<h1 class="wp-heading-inline">Plan description</h1>';
        }
      }
    }
  }

endif;

new Lasik_Insurance_Plans();