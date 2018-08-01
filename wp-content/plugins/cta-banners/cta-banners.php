<?php
/*
Plugin Name: CTA Banners
Version: 1.0
Plugin URI:
Description: Create CTA Banners for schedule exam
Author: Alex Gyulbudaghyan
Author URI:
License: GPL v2+
Text Domain: cta-banners
Domain Path: /languages
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Define global variables
if ( ! defined( 'LASIK_PLUGIN_DIR' ) )
  define( 'LASIK_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );


class CtaBanners {

    private $screen = array(
        'ctabanner'
    );

    private $meta_fields = array(
        array(
            'label' => 'Background Image',
            'id' => 'backgroundimage_74144',
            'type' => 'media',
        ),
        array(
            'label' => 'Title',
            'id' => 'title_77276',
            'type' => 'text',
        ),
        array(
            'label' => 'Description',
            'id' => 'description_68523',
            'type' => 'text',
        ),
        array(
            'label' => 'CTA Copy',
            'id' => 'ctacopy_75893',
            'type' => 'text',
        ),
        array(
            'label' => 'CTA Link',
            'id' => 'ctalink_39645',
            'type' => 'text',
        )
    );

    public function __construct()
    {
        add_action( 'admin_print_styles', array( $this, 'meta_styles' ) );
        add_action( 'init', array( $this, 'create_post_type' ), 0 );
    }

    public function meta_styles()
    {
        $plugin_url = plugin_dir_url( __FILE__ );

        wp_enqueue_style( 'cta-banners-style',  $plugin_url . "css/style.css" );
        wp_enqueue_style( 'cta-banners-style',  $plugin_url . "css/style.css" );
    }

    public function init_meta_boxes()
    {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'admin_footer', array( $this, 'media_fields' ) );
        add_action( 'save_post', array( $this, 'save_fields' ) );

        add_shortcode( 'cta_banner', array( $this, 'cta_banner' ) );
    }

    public function cta_banner()
    {
        $args = array(
            'post_type'         => 'ctabanner',
            'orderby'           => 'rand',
            'posts_per_page'    => 1
        );
        $query_banners = new WP_Query( $args );
        while ( $query_banners->have_posts() ) {
            $query_banners->the_post();
            get_template_part( 'template-parts/post/banner', false );
        }
        wp_reset_postdata();
    }

    public function create_post_type()
    {
        $labels = array(
            'name' => __( 'CTA Banners', 'Post Type General Name', 'textdomain' ),
            'singular_name' => __( 'CTA Banner', 'Post Type Singular Name', 'textdomain' ),
            'menu_name' => __( 'CTA Banners', 'textdomain' ),
            'name_admin_bar' => __( 'CTA Banner', 'textdomain' ),
            'archives' => __( 'CTA Banner Archives', 'textdomain' ),
            'attributes' => __( 'CTA Banner Attributes', 'textdomain' ),
            'parent_item_colon' => __( 'Parent CTA Banner:', 'textdomain' ),
            'all_items' => __( 'All CTA Banners', 'textdomain' ),
            'add_new_item' => __( 'Add New CTA Banner', 'textdomain' ),
            'add_new' => __( 'Add New', 'textdomain' ),
            'new_item' => __( 'New CTA Banner', 'textdomain' ),
            'edit_item' => __( 'Edit CTA Banner', 'textdomain' ),
            'update_item' => __( 'Update CTA Banner', 'textdomain' ),
            'view_item' => __( 'View CTA Banner', 'textdomain' ),
            'view_items' => __( 'View CTA Banners', 'textdomain' ),
            'search_items' => __( 'Search CTA Banner', 'textdomain' ),
            'not_found' => __( 'Not found', 'textdomain' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
            'featured_image' => __( 'Featured Image', 'textdomain' ),
            'set_featured_image' => __( 'Set featured image', 'textdomain' ),
            'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
            'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
            'insert_into_item' => __( 'Insert into CTA Banner', 'textdomain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this CTA Banner', 'textdomain' ),
            'items_list' => __( 'CTA Banners list', 'textdomain' ),
            'items_list_navigation' => __( 'CTA Banners list navigation', 'textdomain' ),
            'filter_items_list' => __( 'Filter CTA Banners list', 'textdomain' ),
        );
        $args = array(
            'label' => __( 'CTA Banner', 'textdomain' ),
            'description' => __( '', 'textdomain' ),
            'labels' => $labels,
            'menu_icon' => 'dashicons-admin-post',
            'supports' => array(),
            'taxonomies' => array(),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => false,
            'can_export' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type( 'ctabanner', $args );

        remove_post_type_support( 'ctabanner', 'editor' );
    }

    public function add_meta_boxes()
    {
        foreach ( $this->screen as $single_screen ) 
        {
            add_meta_box(
                'ctabanners',
                __( 'CTA Banners', 'textdomain' ),
                array( $this, 'meta_box_callback' ),
                $single_screen,
                'advanced',
                'default'
            );
        }
    }

    public function meta_box_callback( $post ) 
    {
        wp_nonce_field( 'ctabanners_data', 'ctabanners_nonce' );
        $this->field_generator( $post );
    }

    public function field_generator( $post )
    {
        // print_r(get_post_meta( $post->ID ) );
        // die();
        $output = '';
        foreach ( $this->meta_fields as $meta_field ) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            $meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
            if ( empty( $meta_value ) ) {
                $meta_value = $meta_field['default']; 
            }
            switch ( $meta_field['type'] ) {
                case 'media':
                    $input = sprintf(
                        '<input style="width: 80%%" id="%s" name="%s" type="hidden" value="%s"> <input style="width: 19%%" class="button ctabanners-media" id="%s_button" name="%s_button" type="button" value="Upload" /><div class="status"><img src="%s" id="imgStatus"><p><a href="#" data-target="%s" class="remove-file-button" rel="background_image"></a></p></div>',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_value,
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_value,
                        $meta_field['id']
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

    public function media_fields()
    {
        ?><script>
            jQuery(document).ready(function($){
                if ( typeof wp.media !== 'undefined' ) {
                    var _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;
                    $('.remove-file-button').click(function(e) {
                        e.preventDefault();
                        var target = $(this).data('target');
                        $('input#'+target).val('');
                        $('input#'+target).siblings('div.status').addClass('hidden');
                        $('img#imgStatus').attr('src', '');
                    });
                    $('.ctabanners-media').click(function(e) {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        var button = $(this);
                        var id = button.attr('id').replace('_button', '');
                        _custom_media = true;
                            wp.media.editor.send.attachment = function(props, attachment){
                            if ( _custom_media ) {
                                $('input#'+id).val(attachment.url);
                                $('input#'+id).siblings('div.status').removeClass('hidden');
                                $('img#imgStatus').attr('src', attachment.url);
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

    public function format_rows( $label, $input ) {
        return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
    }

    public function save_fields( $post_id )
    {
        // print_r($_POST);
        // die();
        if ( ! isset( $_POST['ctabanners_nonce'] ) )
                return $post_id;
            $nonce = $_POST['ctabanners_nonce'];
            if ( !wp_verify_nonce( $nonce, 'ctabanners_data' ) )
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



if( class_exists('CtaBanners') ) {
    $banner = new CtaBanners();

    $banner->init_meta_boxes();
}


