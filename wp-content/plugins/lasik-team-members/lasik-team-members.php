<?php
/**
 * Plugin Name:  Team Members
 * Description:  Add Team Members
 * Version:      0.1
 * Text Domain: lasik-team-members
 * Domain Path: /languages/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_TEAM_MEMBERS_PLUGIN_DIR' ) )
  define( 'LASIK_TEAM_MEMBERS_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

if ( ! class_exists( 'Lasik_Team_Members' ) ) :

  /**
   * Main Plugin Class.
   *
   * @class Lasik_Team_Members
   */
  class Lasik_Team_Members{

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
          'name'          => __( 'Team Members', 'lasik-team-members' ),
          'singular_name' => __( 'Team Member', 'lasik-team-members' ),
          'add_new' => __( 'Add New Team Member', 'lasik-team-members' ),
          'add_new_item' => __( 'Add New Team Member', 'lasik-team-members' ),
          'edit_item' => __( 'Edit Team Member', 'lasik-team-members' ),
          'new_item' => __( 'New Team Member', 'lasik-team-members' ),
          'view_item' => __( 'View Team Member', 'lasik-team-members' ),
          'view_items' => __( 'View Team Members', 'lasik-team-members' ),
          'search_items' => __( 'Search Team Members', 'lasik-team-members' ),
          'not_found' => __( 'No Team Members found', 'lasik-team-members' ),
          'not_found_in_trash' => __( 'No Team Members found in trash', 'lasik-team-members' ),
          'all_items' => __( 'All Team Members', 'lasik-team-members' ),
          'archives' => __( 'Team Member Archives', 'lasik-team-members' ),
          'attributes' => __( 'Team Member Attributes', 'lasik-team-members' ),
          'insert_into_item' => __( 'Insert into Team Member', 'lasik-team-members' ),
          'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'lasik-team-members' ),
          'featured_image' => __( 'Team Member Picture', 'lasik-team-members' ),
          'set_featured_image' => __( 'Set Team Member Picture', 'lasik-team-members' ),
          'remove_featured_image' => __( 'Remove Team Member Picture', 'lasik-team-members' ),
        ),
        'description' => __( 'Manage Team Members', 'lasik-team-members' ),
        'menu_icon' => 'dashicons-businessman',
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
      register_post_type( 'lasik_team_member', $post_type_args );

      if ( taxonomy_exists( 'lasik_job' ) )
        register_taxonomy_for_object_type( 'lasik_job', 'lasik_team_member' );
      if ( taxonomy_exists( 'lasik_market' ) )
        register_taxonomy_for_object_type( 'lasik_market', 'lasik_team_member' );

      // Localization
      load_plugin_textdomain( 'lasik-team-members', false, LASIK_TEAM_MEMBERS_PLUGIN_DIR . '/languages' );
    }
  }

endif;

new Lasik_Team_Members();