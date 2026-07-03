<?php
/**
 * Amar Legal Theme Functions
 * 
 * @package Amar_Legal
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function amar_legal_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Set default thumbnail size
    set_post_thumbnail_size( 1200, 675, true );
    
    // Add additional image sizes
    add_image_size( 'amar-legal-hero', 1920, 800, true );
    add_image_size( 'amar-legal-medium', 800, 600, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'amar-legal' ),
        'footer'  => __( 'Footer Menu', 'amar-legal' ),
    ) );

    // Switch default core markup to output valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'editor-style.css' );

    // Add support for wide alignment
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'amar_legal_setup' );

/**
 * Set the content width in pixels
 */
function amar_legal_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'amar_legal_content_width', 1200 );
}
add_action( 'after_setup_theme', 'amar_legal_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function amar_legal_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'amar-legal-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Enqueue custom JavaScript
    wp_enqueue_script( 'amar-legal-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );

    // Add inline JavaScript for mobile menu
    wp_add_inline_script( 'amar-legal-scripts', '
        var amarLegalConfig = {
            homeUrl: "' . esc_url( home_url( '/' ) ) . '",
            ajaxUrl: "' . esc_url( admin_url( 'admin-ajax.php' ) ) . '"
        };
    ', 'before' );

    // Enqueue comment reply script if needed
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'amar_legal_scripts' );

/**
 * Register widget areas
 */
function amar_legal_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 1', 'amar-legal' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'amar-legal' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 2', 'amar-legal' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'amar-legal' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area 3', 'amar-legal' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'amar-legal' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Sidebar', 'amar-legal' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'amar-legal' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'amar_legal_widgets_init' );

/**
 * Customizer additions
 */
function amar_legal_customize_register( $wp_customize ) {
    
    // Add theme options section
    $wp_customize->add_section( 'amar_legal_theme_options', array(
        'title'    => __( 'Theme Options', 'amar-legal' ),
        'priority' => 30,
    ) );

    // Hero Section Title
    $wp_customize->add_setting( 'amar_legal_hero_title', array(
        'default'           => 'Amar Legal',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'amar_legal_hero_title', array(
        'label'    => __( 'Hero Title', 'amar-legal' ),
        'section'  => 'amar_legal_theme_options',
        'type'     => 'text',
        'priority' => 10,
    ) );

    // Hero Section Description
    $wp_customize->add_setting( 'amar_legal_hero_description', array(
        'default'           => 'Professional Legal Services You Can Trust',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'amar_legal_hero_description', array(
        'label'    => __( 'Hero Description', 'amar-legal' ),
        'section'  => 'amar_legal_theme_options',
        'type'     => 'textarea',
        'priority' => 20,
    ) );

    // Contact Information Section
    $wp_customize->add_section( 'amar_legal_contact_info', array(
        'title'    => __( 'Contact Information', 'amar-legal' ),
        'priority' => 40,
    ) );

    // Phone Number
    $wp_customize->add_setting( 'amar_legal_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'amar_legal_phone', array(
        'label'    => __( 'Phone Number', 'amar-legal' ),
        'section'  => 'amar_legal_contact_info',
        'type'     => 'text',
        'priority' => 10,
    ) );

    // Email Address
    $wp_customize->add_setting( 'amar_legal_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'amar_legal_email', array(
        'label'    => __( 'Email Address', 'amar-legal' ),
        'section'  => 'amar_legal_contact_info',
        'type'     => 'email',
        'priority' => 20,
    ) );

    // Office Address
    $wp_customize->add_setting( 'amar_legal_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'amar_legal_address', array(
        'label'    => __( 'Office Address', 'amar-legal' ),
        'section'  => 'amar_legal_contact_info',
        'type'     => 'textarea',
        'priority' => 30,
    ) );

    // Office Hours
    $wp_customize->add_setting( 'amar_legal_hours', array(
        'default'           => 'Mon - Fri: 9:00 AM - 6:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'amar_legal_hours', array(
        'label'    => __( 'Office Hours', 'amar-legal' ),
        'section'  => 'amar_legal_contact_info',
        'type'     => 'text',
        'priority' => 40,
    ) );

    // Social Media Links
    $wp_customize->add_section( 'amar_legal_social_media', array(
        'title'    => __( 'Social Media Links', 'amar-legal' ),
        'priority' => 50,
    ) );

    $social_platforms = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'linkedin'  => 'LinkedIn',
        'instagram' => 'Instagram',
    );

    $priority = 10;
    foreach ( $social_platforms as $platform => $label ) {
        $wp_customize->add_setting( 'amar_legal_' . $platform, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( 'amar_legal_' . $platform, array(
            'label'    => $label . ' ' . __( 'URL', 'amar-legal' ),
            'section'  => 'amar_legal_social_media',
            'type'     => 'url',
            'priority' => $priority,
        ) );

        $priority += 10;
    }
}
add_action( 'customize_register', 'amar_legal_customize_register' );

/**
 * Custom excerpt length
 */
function amar_legal_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'amar_legal_excerpt_length' );

/**
 * Custom excerpt more
 */
function amar_legal_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'amar_legal_excerpt_more' );

/**
 * Add custom body classes
 */
function amar_legal_body_classes( $classes ) {
    // Add class if we're viewing the front page
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }

    // Add class if sidebar is active
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'has-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'amar_legal_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts
 */
function amar_legal_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'amar_legal_pingback_header' );

/**
 * Contact Form Handler (if not using plugin)
 */
function amar_legal_contact_form_handler() {
    if ( isset( $_POST['amar_legal_contact_form'] ) ) {
        
        // Verify nonce
        if ( ! isset( $_POST['amar_legal_nonce'] ) || ! wp_verify_nonce( $_POST['amar_legal_nonce'], 'amar_legal_contact_form' ) ) {
            wp_die( __( 'Security check failed', 'amar-legal' ) );
        }

        // Sanitize form data
        $name    = sanitize_text_field( $_POST['name'] );
        $email   = sanitize_email( $_POST['email'] );
        $subject = sanitize_text_field( $_POST['subject'] );
        $message = sanitize_textarea_field( $_POST['message'] );

        // Validate
        if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
            wp_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
            exit;
        }

        // Prepare email
        $to      = get_option( 'admin_email' );
        $headers = array( 'Content-Type: text/html; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>' );
        $body    = '<p><strong>Name:</strong> ' . $name . '</p>';
        $body   .= '<p><strong>Email:</strong> ' . $email . '</p>';
        $body   .= '<p><strong>Subject:</strong> ' . $subject . '</p>';
        $body   .= '<p><strong>Message:</strong></p><p>' . nl2br( $message ) . '</p>';

        // Send email
        $sent = wp_mail( $to, 'Contact Form: ' . $subject, $body, $headers );

        if ( $sent ) {
            wp_redirect( add_query_arg( 'contact', 'success', wp_get_referer() ) );
        } else {
            wp_redirect( add_query_arg( 'contact', 'error', wp_get_referer() ) );
        }
        exit;
    }
}
add_action( 'template_redirect', 'amar_legal_contact_form_handler' );

/**
 * Helper function to get theme option
 */
function amar_legal_get_option( $option_name, $default = '' ) {
    return get_theme_mod( $option_name, $default );
}

/**
 * Custom navigation walker for mobile menu
 */
class Amar_Legal_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
}
