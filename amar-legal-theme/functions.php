<?php
/**
 * Amar Legal theme functions.
 *
 * @package Amar_Legal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AMAR_LEGAL_VERSION', '1.0.0' );

// Editable content engine (Customizer-driven text & images).
require_once get_template_directory() . '/inc/content-model.php';
require_once get_template_directory() . '/inc/customizer-content.php';

/**
 * Theme setup.
 */
function amar_legal_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'amar-legal' ),
	) );
}
add_action( 'after_setup_theme', 'amar_legal_setup' );

/**
 * Enqueue styles and scripts.
 */
function amar_legal_assets() {
	wp_enqueue_style(
		'amar-legal-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'amar-legal-style', get_stylesheet_uri(), array( 'amar-legal-fonts' ), AMAR_LEGAL_VERSION );
	wp_enqueue_script( 'amar-legal-main', get_template_directory_uri() . '/js/main.js', array(), AMAR_LEGAL_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'amar_legal_assets' );

/**
 * Helper: return a theme image URL.
 */
function amar_legal_img( $file ) {
	return esc_url( get_template_directory_uri() . '/images/' . $file );
}

/**
 * Helper: get a contact detail from the Customizer with a sensible default.
 */
function amar_legal_info( $key ) {
	$defaults = array(
		'phone'   => '+91 00000 00000',
		'email'   => 'contact@amarlegal.in',
		'address' => 'Mumbai, Maharashtra, India',
		'hours'   => 'Mon – Fri: 9:00 AM – 6:00 PM',
		'hours_2' => 'Sat: 10:00 AM – 2:00 PM · Sun: Closed',
		'map'     => '',
	);
	$default = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'amar_legal_' . $key, $default );
}

/**
 * Customizer: contact details + hero text so the client edits without code.
 */
function amar_legal_customize( $wp_customize ) {
	$wp_customize->add_section( 'amar_legal_contact', array(
		'title'    => __( 'Amar Legal — Contact Details', 'amar-legal' ),
		'priority' => 30,
	) );

	$fields = array(
		'phone'   => __( 'Phone Number', 'amar-legal' ),
		'email'   => __( 'Email Address', 'amar-legal' ),
		'address' => __( 'Office Address', 'amar-legal' ),
		'hours'   => __( 'Office Hours (line 1)', 'amar-legal' ),
		'hours_2' => __( 'Office Hours (line 2)', 'amar-legal' ),
		'map'     => __( 'Google Maps embed URL (optional)', 'amar-legal' ),
	);
	foreach ( $fields as $key => $label ) {
		$wp_customize->add_setting( 'amar_legal_' . $key, array(
			'default'           => amar_legal_info( $key ),
			'sanitize_callback' => ( 'email' === $key ) ? 'sanitize_email' : ( ( 'map' === $key ) ? 'esc_url_raw' : 'sanitize_text_field' ),
		) );
		$wp_customize->add_control( 'amar_legal_' . $key, array(
			'label'   => $label,
			'section' => 'amar_legal_contact',
			'type'    => ( 'map' === $key ) ? 'url' : 'text',
		) );
	}
}
add_action( 'customize_register', 'amar_legal_customize' );

/**
 * ============================================================
 * SELF-CONFIGURATION — runs once when the theme is activated.
 * Creates the 5 pages, assigns templates, sets the static front
 * page and builds the primary menu. This is what prevents the
 * "empty / black backend" problem: everything is ready instantly.
 * ============================================================
 */
function amar_legal_after_switch() {
	amar_legal_provision_site();
}
add_action( 'after_switch_theme', 'amar_legal_after_switch' );

function amar_legal_provision_site() {
	$pages = array(
		'home'           => array( 'title' => 'Home', 'template' => '' ),
		'about'          => array( 'title' => 'About Us', 'template' => 'page-about.php' ),
		'practice-areas' => array( 'title' => 'Practice Areas', 'template' => 'page-practice-areas.php' ),
		'team'           => array( 'title' => 'Our Team', 'template' => 'page-team.php' ),
		'contact'        => array( 'title' => 'Contact', 'template' => 'page-contact.php' ),
	);

	$ids = array();

	foreach ( $pages as $slug => $data ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$ids[ $slug ] = $existing->ID;
			continue;
		}
		$page_id = wp_insert_post( array(
			'post_title'   => $data['title'],
			'post_name'    => $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		) );
		if ( $page_id && ! is_wp_error( $page_id ) ) {
			$ids[ $slug ] = $page_id;
			if ( ! empty( $data['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $data['template'] );
			}
		}
	}

	// Set the static front page to "Home".
	if ( isset( $ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
	}

	// Build the primary menu once.
	$menu_name = 'Primary Menu';
	$menu      = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( ! is_wp_error( $menu_id ) ) {
			$order = array( 'home', 'about', 'practice-areas', 'team', 'contact' );
			$pos   = 1;
			foreach ( $order as $slug ) {
				if ( isset( $ids[ $slug ] ) ) {
					wp_update_nav_menu_item( $menu_id, 0, array(
						'menu-item-title'     => $pages[ $slug ]['title'],
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $ids[ $slug ],
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
						'menu-item-position'  => $pos++,
					) );
				}
			}
			$locations            = get_theme_mod( 'nav_menu_locations', array() );
			$locations['primary'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	// Pretty permalinks so page URLs resolve cleanly.
	if ( '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
		if ( function_exists( 'flush_rewrite_rules' ) ) {
			flush_rewrite_rules();
		}
	}
}

/**
 * Fallback menu (used before/if no menu is assigned).
 */
function amar_legal_fallback_menu() {
	$items = array(
		''                => 'Home',
		'about'           => 'About',
		'practice-areas'  => 'Practice Areas',
		'team'            => 'Our Team',
		'contact'         => 'Contact',
	);
	echo '<ul id="primary-menu" class="nav__links">';
	foreach ( $items as $slug => $label ) {
		$url = $slug ? home_url( '/' . $slug . '/' ) : home_url( '/' );
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

/**
 * Handle the contact form submission (no plugin required).
 */
function amar_legal_handle_contact() {
	if ( ! isset( $_POST['amar_legal_contact'] ) ) {
		return;
	}
	if ( ! isset( $_POST['amar_legal_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['amar_legal_nonce'] ) ), 'amar_legal_contact' ) ) {
		return;
	}
	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : 'Website enquiry';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
		wp_safe_redirect( add_query_arg( 'sent', 'error', wp_get_referer() ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$headers = array( 'Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>' );
	$body    = '<p><strong>Name:</strong> ' . esc_html( $name ) . '</p>'
		. '<p><strong>Email:</strong> ' . esc_html( $email ) . '</p>'
		. '<p><strong>Phone:</strong> ' . esc_html( $phone ) . '</p>'
		. '<p><strong>Area:</strong> ' . esc_html( $subject ) . '</p>'
		. '<p><strong>Message:</strong><br>' . nl2br( esc_html( $message ) ) . '</p>';

	$ok = wp_mail( $to, 'Amar Legal — Website Enquiry: ' . $subject, $body, $headers );
	wp_safe_redirect( add_query_arg( 'sent', $ok ? 'success' : 'error', wp_get_referer() ) );
	exit;
}
add_action( 'template_redirect', 'amar_legal_handle_contact' );
