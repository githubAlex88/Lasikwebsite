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



function create_story_post_type() {
    register_post_type( 'story',
        array(
            'labels'       => array(
                'name'       => __( 'Stories' ),
                'add_new_item'       => __('Add New Story'),
                'edit_item'          => __('Edit Story'),
                'new_item'           => __('New Story'),
                'view_item'          => __('View Story'),
                'search_items'       => __('Search Story'),
                'not_found'          => __('No story found.'),
                'not_found_in_trash' => __('No story found in trash.'),
                'all_items'          => __('All Stories'),
                'menu_name'          => __('Story'),
            ),
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'supports'     => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            ), 
            'taxonomies'   => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'story' );
    register_taxonomy_for_object_type( 'post_tag', 'story' );
}
add_action( 'init', 'create_story_post_type' );

function add_story_meta_boxes() {
    add_meta_box(
        'story_fields_meta_boxes', // $id
        'Story Fields', // $title
        'show_story_fields_meta_boxes', // $callback
        'story', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_story_meta_boxes' );

function show_story_fields_meta_boxes() {
    global $post;  
    
        $meta = get_post_meta( $post->ID, 'story_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="story_fields[title]">Story Title</label>
    <br>
    <input type="text" name="story_fields[title]" id="story_fields[title]" class="regular-title" value="<?php if (is_array($meta) && isset($meta['title'])) { echo $meta['title']; } ?>">
  </p>
    <p>
    <label for="story_fields[subtitle]">Story Subtitle</label>
    <br>
    <input type="text" name="story_fields[subtitle]" id="story_fields[subtitle]" class="regular-subtitle" value="<?php if (is_array($meta) && isset($meta['subtitle'])) { echo $meta['subtitle']; } ?>">
  </p>
  <p>
    <label for="story_fields[description]">Story Description</label>
    <br>
    <textarea name="story_fields[description]" id="story_fields[description]" rows="5" cols="30" style="width:500px;"><?php if( isset($meta['description']) )echo $meta['description']; ?></textarea>
  </p>
  <p>
    <label for="story_fields[is_visible_home]">Visible on home page
            <input type="checkbox" name="story_fields[is_visible_home]" value="is_visible_home" <?php if ( isset($meta['is_visible_home']) && $meta['is_visible_home'] === 'is_visible_home' ) echo 'checked'; ?>>
        </label>
  </p>
  <p>
    <label for="story_fields[image]">Patient Image</label><br>
    <input type="text" name="story_fields[image]" id="story_fields[image]" class="meta-image regular-text" value="<?php if(isset($meta['image'])) echo $meta['image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php if(isset($meta['image'])) echo $meta['image']; ?>" style="max-width: 250px;"></div>


  <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }
function save_story_fields_meta( $post_id ) {   
    // verify nonce
    if ( isset($_POST['your_meta_box_nonce']) 
            && !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
            return $post_id; 
        }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }
    
    $old = get_post_meta( $post_id, 'story_fields', true );
        if (isset($_POST['story_fields'])) { //Fix 3
            $new = $_POST['story_fields'];
            if ( $new && $new !== $old ) {
                update_post_meta( $post_id, 'story_fields', $new );
            } elseif ( '' === $new && $old ) {
                delete_post_meta( $post_id, 'story_fields', $old );
            }
        }
}

add_action( 'save_post', 'save_story_fields_meta' );