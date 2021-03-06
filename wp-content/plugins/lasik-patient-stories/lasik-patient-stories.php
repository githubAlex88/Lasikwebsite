<?php
/*
    Plugin Name: Patient Stories
  * Plugin Name:  Patient's Stories
  * Description:  Our Patient's Stories
  * Version:      0.1
  * Text Domain: lasik-stories

 */


    // Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) exit;

    // Define global variables
    if ( ! defined( 'LASIK_PLUGIN_DIR' ) )
        define( 'LASIK_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

    class LasikStories 
    {

        public function __construct()
        {
            add_action( 'init', array( $this, 'init' ), 0 );
        }

        public function init()
        {
            $labels = array(
              'name' => __( 'Stories', 'Post Type General Name', 'textdomain' ),
              'singular_name' => __( 'Story', 'Post Type Singular Name', 'textdomain' ),
              'menu_name' => __( 'Stories', 'textdomain' ),
              'name_admin_bar' => __( 'Story', 'textdomain' ),
              'archives' => __( 'Story Archives', 'textdomain' ),
              'attributes' => __( 'Story Attributes', 'textdomain' ),
              'parent_item_colon' => __( 'Parent Story:', 'textdomain' ),
              'all_items' => __( 'All Stories', 'textdomain' ),
              'add_new_item' => __( 'Add New Story', 'textdomain' ),
              'add_new' => __( 'Add New', 'textdomain' ),
              'new_item' => __( 'New Story', 'textdomain' ),
              'edit_item' => __( 'Edit Story', 'textdomain' ),
              'update_item' => __( 'Update Story', 'textdomain' ),
              'view_item' => __( 'View Story', 'textdomain' ),
              'view_items' => __( 'View Stories', 'textdomain' ),
              'search_items' => __( 'Search Story', 'textdomain' ),
              'not_found' => __( 'Not found', 'textdomain' ),
              'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
              'featured_image' => __( 'Featured Image', 'textdomain' ),
              'set_featured_image' => __( 'Set featured image', 'textdomain' ),
              'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
              'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
              'insert_into_item' => __( 'Insert into Story', 'textdomain' ),
              'uploaded_to_this_item' => __( 'Uploaded to this Story', 'textdomain' ),
              'items_list' => __( 'Stories list', 'textdomain' ),
              'items_list_navigation' => __( 'Stories list navigation', 'textdomain' ),
              'filter_items_list' => __( 'Filter Stories list', 'textdomain' ),
            );
            $args = array(
              'label' => __( 'Story', 'textdomain' ),
              'description' => __( 'Patient Story', 'textdomain' ),
              'labels' => $labels,
              'menu_icon' => 'dashicons-admin-post',
              'supports' => array('title', 'editor', 'thumbnail', ),
              'taxonomies' => array(),
              'public' => true,
              'show_ui' => true,
              'show_in_menu' => true,
              'menu_position' => 5,
              'show_in_admin_bar' => true,
              'show_in_nav_menus' => true,
              'can_export' => true,
              'has_archive' => true,
              'hierarchical' => false,
              'exclude_from_search' => false,
              'show_in_rest' => true,
              'publicly_queryable' => true,
              'capability_type' => 'post',
              'rewrite' => array( 'slug' => 'patient-story', 'with_front' => false),
            );

            register_post_type( 'story', $args );

        }


    }


    class StoryFieldMetabox 
    {
        private $screen = array(
            'Story',
        );
        private $meta_fields = array(
            array(
                'label' => 'Title',
                'id' => 'title',
                'type' => 'text',
            ),
            array(
                'label' => 'Subtitle',
                'id' => 'subtitle',
                'type' => 'text',
            ),
            array(
                'label' => 'Description',
                'id' => 'description',
                'type' => 'textarea',
            ),
            array(
                'label' => 'Patient Story Name',
                'id' => 'fname',
                'type' => 'text',
            ),
            array(
                'label' => 'Patient Last Name',
                'id' => 'lname',
                'type' => 'text',
            ),
            array(
                'label' => 'Patient Story Text',
                'id' => 'story_text',
                'type' => 'text',
            ),
            array(
                'label' => 'Image',
                'id' => 'image',
                'type' => 'media',
            ),
            array(
                'label' => 'Homepage Visibility',
                'id' => 'is_homepage_visible',
                'type' => 'checkbox',
            ),
        );
        public function __construct() {
            add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
            add_action( 'admin_footer', array( $this, 'media_fields' ) );
            add_action( 'save_post', array( $this, 'save_fields' ) );
        }
        public function add_meta_boxes() {
            foreach ( $this->screen as $single_screen ) {
                add_meta_box(
                    'storyfield',
                    __( 'Story Field', 'textdomain' ),
                    array( $this, 'meta_box_callback' ),
                    $single_screen,
                    'advanced',
                    'default'
                );
            }
        }
        public function meta_box_callback( $post ) {
            wp_nonce_field( 'storyfield_data', 'storyfield_nonce' );
            $this->field_generator( $post );
        }
        public function media_fields() {
            ?><script>
            jQuery(document).ready(function($){
                if ( typeof wp.media !== 'undefined' ) {
                  var _custom_media = true,
                  _orig_send_attachment = wp.media.editor.send.attachment;
                  $('.storyfield-media').click(function(e) {
                    var send_attachment_bkp = wp.media.editor.send.attachment;
                    var button = $(this);
                    var id = button.attr('id').replace('_button', '');
                    _custom_media = true;
                      wp.media.editor.send.attachment = function(props, attachment){
                      if ( _custom_media ) {
                        $('input#'+id).val(attachment.url);
                      } else {
                        return _orig_send_attachment.apply( this, [props, attachment] );
                      };
                    }
                    wp.media.editor.open(button);
                    return false;
                  });
                  $('.add_media').on('click', function(){
                    _custom_media = false;
                  });
                }
            });
            </script><?php
        }
        public function field_generator( $post ) {
            $output = '';
            foreach ( $this->meta_fields as $meta_field ) {
              $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
              $meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
              if ( empty( $meta_value ) ) {
                $meta_value = $meta_field['default']; }
                switch ( $meta_field['type'] ) {
                    case 'media':
                        $input = sprintf(
                            '<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button storyfield-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
                            $meta_field['id'],
                            $meta_field['id'],
                            $meta_value,
                            $meta_field['id'],
                            $meta_field['id']
                        );
                        break;
                    case 'checkbox':
                        $input = sprintf(
                            '<input %s id=" % s" name="% s" type="checkbox" value="1">',
                            $meta_value === '1' ? 'checked' : '',
                            $meta_field['id'],
                            $meta_field['id']
                        );
                        break;
                    case 'textarea':
                        $input = sprintf(
                            '<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
                            $meta_field['id'],
                            $meta_field['id'],
                            $meta_value
                        );
                        break;
                    default:
                        $input = sprintf(
                            '<input %s id="%s" name="%s" type="%s" value="%s">',
                            $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
                            $meta_field['id'],
                            $meta_field['id'],
                            $meta_field['type'],
                            $meta_value
                        );
                }
                $output .= $this->format_rows( $label, $input );
            }
            echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
        }
        public function format_rows( $label, $input ) {
            return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
        }
        public function save_fields( $post_id ) {
            if ( ! isset( $_POST['storyfield_nonce'] ) )
                return $post_id;
            $nonce = $_POST['storyfield_nonce'];
            if ( !wp_verify_nonce( $nonce, 'storyfield_data' ) )
                return $post_id;
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
                return $post_id;
            foreach ( $this->meta_fields as $meta_field ) {
                if ( isset( $_POST[ $meta_field['id'] ] ) ) {
                    switch ( $meta_field['type'] ) {
                    case 'email':
                        $_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
                        break;
                    case 'text':
                        $_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
                        break;
                }
                update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
                } else if ( $meta_field['type'] === 'checkbox' ) {
                    update_post_meta( $post_id, $meta_field['id'], '0' );
                }
            }
        }
    }

    if (class_exists('LasikStories')) {
        new LasikStories;
    };
    if (class_exists('StoryFieldMetabox')) {
        new StoryFieldMetabox;
    };
