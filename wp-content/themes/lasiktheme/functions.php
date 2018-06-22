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

    // Walker Navigation includes
    require_once( get_stylesheet_directory() . '/inc/header-nav.php' );
    require_once( get_stylesheet_directory() . '/inc/sidebar-nav.php' );

?>