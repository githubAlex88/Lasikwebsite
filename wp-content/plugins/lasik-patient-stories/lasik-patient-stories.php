<?php
/*
    Plugin Name: Patient Stories

 */

// define('Lasik_Patient_Stories', 'story');
// add_theme_support('post-thumbnails');

// function lasik_post_types()
// {
//  $supports = ['title', 'editor', 'revisions', 'page-attributes', 'thumbnail'];
//  register_post_type(Lasik_Patient_Stories, array(
//      'labels'              => array(
//          'name'               => _x('Stories', 'post type general name'),
//          'singular_name'      => _x('Story', 'post type singular name'),
//          'add_new_item'       => __('Add New Story'),
//          'edit_item'          => __('Edit Story'),
//          'new_item'           => __('New Story'),
//          'view_item'          => __('View Story'),
//          'search_items'       => __('Search Story'),
//          'not_found'          => __('No story found.'),
//          'not_found_in_trash' => __('No story found in trash.'),
//          'all_items'          => __('All Stories'),
//          'menu_name'          => __('Story'),
//      ),
//      'register_meta_box_cb' => 'stories_meta_box',
//      'public'              => false,
//      'exclude_from_search' => true,
//      'publicly_queryable'  => false,
//      'show_in_nav_menus'   => false,
//      'show_ui'             => true,
//      'show_in_admin_bar'   => false,
//      'query_var'           => false,
//      'supports'            => $supports,
//  ));
// }

// function initialize_meta_boxes()
// {
//  // add_meta_box('study_meta', 'Study Details', function() {
//  //       echo 'Working';
//  //   });
// }
 
// function stories_meta_box(WP_Post $post) {
//     add_meta_box('story_meta', 'Story Details', function() use ($post) {
//             $field_name = 'your_field';
//             $field_value = get_post_meta($post->ID, $field_name, true);
//             wp_nonce_field('story_nonce', 'story_nonce');
//             

//         });
// }
// add_action('init', 'lasik_post_types');
// add_action('init', 'initialize_meta_boxes', 9999);



// function create_story_post_type() {
//     register_post_type( 'story',
//         array(
//             'labels'       => array(
//                 'name'       => __( 'Stories' ),
//                 'add_new_item'       => __('Add New Story'),
//                 'edit_item'          => __('Edit Story'),
//                 'new_item'           => __('New Story'),
//                 'view_item'          => __('View Story'),
//                 'search_items'       => __('Search Story'),
//                 'not_found'          => __('No story found.'),
//                 'not_found_in_trash' => __('No story found in trash.'),
//                 'all_items'          => __('All Stories'),
//                 'menu_name'          => __('Story'),
//             ),
//             'public'       => true,
//             'hierarchical' => true,
//             'has_archive'  => true,
//             'supports'     => array(
//                 'title',
//                 'editor',
//                 'excerpt',
//                 'thumbnail',
//             ), 
//             'taxonomies'   => array(
//                 'post_tag',
//                 'category',
//             )
//         )
//     );
//     register_taxonomy_for_object_type( 'category', 'story' );
//     register_taxonomy_for_object_type( 'post_tag', 'story' );
// }
// add_action( 'init', 'create_story_post_type' );

    function create_story_cpt() {

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
      );
      register_post_type( 'story', $args );

    }
    add_action( 'init', 'create_story_cpt', 0 );

class storyfieldMetabox {
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
if (class_exists('storyfieldMetabox')) {
  new storyfieldMetabox;
};