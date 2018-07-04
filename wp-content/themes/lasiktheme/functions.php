<?php

    add_action( 'generate_rewrite_rules' , 'my_custom_function' );

    function my_custom_function( $rules )
    {
        // do something
        // print_r($rules);
        // die(",,,");
    }

    add_action( 'wp_enqueue_scripts', 'lasik_styles' );

    function lasik_styles()
    {
        wp_enqueue_style( 'lasik-google-fonts', 
            'https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i|Noto+Serif:400,400i,700,700i', false );
        wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css'); 
        wp_enqueue_style( 'styles_css', get_template_directory_uri() . '/style.css' );
    }

    add_action( 'wp_enqueue_scripts', 'lasik_scripts', 11);

    function lasik_scripts()
    {
        wp_deregister_script('jquery');
        wp_enqueue_script('jqueryJS', 'https://code.jquery.com/jquery-3.3.1.min.js', '', true);
        wp_enqueue_script('materialize_js', get_template_directory_uri() . '/assets/js/materialize.min.js','','', true);
        wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/main.js',array('jqueryJS'),'1.0.0', true);
    }

    add_theme_support( 'menus' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'widgets' );

    add_theme_support(
        'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support(
        'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        )
    );

    add_theme_support( 'post-thumbnails' );

    function register_theme_menus() {
        register_nav_menus(
            array(
                'header-menu'           =>  __( 'Navigation Menu' ),
                // 'mobile-header-menu'    =>  __( 'Mobile Navigation Menu' )
            )
        );
    }

    function create_widget( $name, $id, $description, $before_widget = '', $after_widget = '', $before_title = '', $after_title = '' )
    {
        $args = array(
            'name'          => $name,
            'description'   => __( $description ),
            'id'            => $id,
            'before_widget' => $before_widget,
            'after_widget'  => $after_widget,
            'before_title'  => $before_title,
            'after_title'   => $after_title
        );
        register_sidebar( $args );
    }

    create_widget( 
        'Footer Column 1', 
        'footer-widget-1', 
        'First Footer Column', 
        '<div class="footer__item">', 
        '</div>' 
    );
    create_widget( 
        'Footer Column 2',
        'footer-widget-2', 
        'Second Footer Column', 
        '<div class="footer__item">',
        '</div>', 
        '<h3>', 
        '</h3>' 
    );
    create_widget( 
        'Footer Column 3',
        'footer-widget-3', 
        'Third Footer Column', 
        '<div class="footer__item">',
        '</div>', 
        '<h3>', 
        '</h3>' 
    );
    create_widget( 
        'Footer Column Social',
        'footer-social-widget', 
        'Footer Widget Column', 
        '<div class="footer__item">',
        '</div>', 
        '<h3>', 
        '</h3>' 
    );
    create_widget( 
        'Footer Column Additional',
        'footer-additional-widget', 
        'Footer Widget Column', 
        '<div class="footer__item">',
        '</div>', 
        '<h3>', 
        '</h3>' 
    );

    create_widget(
        'Header Sidebar Menu',
        'header-sidebar',
        'Header Mobile Menu'
    );

    add_action( 'init' , 'register_theme_menus' );


    add_action( 'wp_footer', 'add_svg_sprites', 9999 );

    function add_svg_sprites()
    {
        $svg_icons = get_stylesheet_directory()  . '/template-parts/sprites/sprite.symbol.svg';
        // If it exists, include it.
        if ( file_exists( $svg_icons ) ) {
            require_once( $svg_icons );
        }
    }

    if( ! function_exists( 'fix_no_editor_on_posts_page' ) ) {

        /**
         * Add the wp-editor back into WordPress after it was removed in 4.2.2.
         *
         * @param Object $post
         * @return void
         */
        function fix_no_editor_on_posts_page( $post ) {
            if( isset( $post ) && $post->ID != get_option('page_for_posts') ) {
                return;
            }

            remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
            add_post_type_support( 'page', 'editor' );
        }
        add_action( 'edit_form_after_title', 'fix_no_editor_on_posts_page', 0 );
     }

    remove_filter( 'the_excerpt', 'wpautop' );
    // remove_filter( 'the_content', 'wpautop' );

    add_filter( 'wp_nav_menu_items', 'add_search_to_nav', 10, 2 );

    function add_search_to_nav( $items, $args )
    {
        // check if navigation menu is header and add last 2 items 
        if( is_a($args->walker, 'Header_Nav') ) {
            $items .= '<li class="menu__item show-on-medium"><a href="#" class="menu__link sidenav-trigger" data-target="mobile-menu"><i class="far fa-bars menu__icon"></i></a></li>';
            $items .= '<li class="menu__item hide-on-small-only"><a href="#search-modal" class="menu__link modal-trigger"><i class="far fa-search menu__icon"></i></a></li>';
        }
        return $items;
    }

    // Walker Navigation includes
    require_once( get_stylesheet_directory() . '/inc/header-nav.php' );
    require_once( get_stylesheet_directory() . '/inc/sidebar-nav.php' );

?>