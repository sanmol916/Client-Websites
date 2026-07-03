<?php
/**
 * Amar Legal — Editable content engine.
 *
 * Registers a "Content" panel in the WordPress Customizer so the client can edit
 * every heading, paragraph, button label and image with live preview, no code.
 *
 * @package Amar_Legal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Flatten the field model to key => field-definition, cached per request.
 *
 * @return array
 */
function amar_legal_flat() {
	static $flat = null;
	if ( null !== $flat ) {
		return $flat;
	}
	$flat  = array();
	$model = amar_legal_fields();
	foreach ( $model as $section ) {
		if ( empty( $section['fields'] ) ) {
			continue;
		}
		foreach ( $section['fields'] as $key => $def ) {
			$flat[ $key ] = $def;
		}
	}
	return $flat;
}

/**
 * Get an editable text value (falls back to the built-in default).
 *
 * @param string $key Setting key.
 * @return string
 */
function amar_legal_text( $key ) {
	$flat    = amar_legal_flat();
	$default = isset( $flat[ $key ]['default'] ) ? $flat[ $key ]['default'] : '';
	return get_theme_mod( $key, $default );
}

/**
 * Echo an editable text value, escaped for HTML.
 *
 * @param string $key Setting key.
 */
function amar_legal_e( $key ) {
	echo esc_html( amar_legal_text( $key ) );
}

/**
 * Get an image URL for an editable image setting.
 * Returns the uploaded image if set, otherwise the bundled placeholder.
 *
 * @param string $key Setting key (its default is a placeholder filename).
 * @return string
 */
function amar_legal_pic( $key ) {
	$val = get_theme_mod( $key, '' );
	if ( $val ) {
		return esc_url( $val );
	}
	$flat = amar_legal_flat();
	$file = isset( $flat[ $key ]['default'] ) ? $flat[ $key ]['default'] : '';
	return $file ? amar_legal_img( $file ) : '';
}

/**
 * Render a heading with one highlighted word wrapped in the gold accent span.
 *
 * @param string $title_key     Title setting key.
 * @param string $highlight_key Highlight-word setting key.
 * @return string Safe HTML.
 */
function amar_legal_heading_highlight( $title_key, $highlight_key ) {
	$title     = esc_html( amar_legal_text( $title_key ) );
	$highlight = trim( amar_legal_text( $highlight_key ) );
	if ( '' === $highlight ) {
		return $title;
	}
	$safe_hl = esc_html( $highlight );
	return str_replace( $safe_hl, '<span class="accent">' . $safe_hl . '</span>', $title );
}

/**
 * Register the Customizer panel, sections, settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function amar_legal_register_content( $wp_customize ) {
	$wp_customize->add_panel( 'amar_legal_content', array(
		'title'       => __( 'Amar Legal — Page Content', 'amar-legal' ),
		'description' => __( 'Edit the text and images on every page. Changes preview live on the right.', 'amar-legal' ),
		'priority'    => 22,
	) );

	$priority = 10;
	foreach ( amar_legal_fields() as $section_id => $section ) {
		$wp_customize->add_section( $section_id, array(
			'title'    => $section['title'],
			'panel'    => 'amar_legal_content',
			'priority' => $priority++,
		) );

		if ( empty( $section['fields'] ) ) {
			continue;
		}

		foreach ( $section['fields'] as $key => $def ) {
			$type = isset( $def['type'] ) ? $def['type'] : 'text';

			if ( 'image' === $type ) {
				$default = isset( $def['default'] ) ? amar_legal_img( $def['default'] ) : '';
				$wp_customize->add_setting( $key, array(
					'default'           => $default,
					'sanitize_callback' => 'esc_url_raw',
					'transport'         => 'refresh',
				) );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, array(
					'label'   => $def['label'],
					'section' => $section_id,
				) ) );
				continue;
			}

			$sanitizer = ( 'textarea' === $type ) ? 'wp_kses_post' : 'sanitize_text_field';
			$wp_customize->add_setting( $key, array(
				'default'           => isset( $def['default'] ) ? $def['default'] : '',
				'sanitize_callback' => $sanitizer,
				'transport'         => 'refresh',
			) );
			$wp_customize->add_control( $key, array(
				'label'   => $def['label'],
				'section' => $section_id,
				'type'    => ( 'textarea' === $type ) ? 'textarea' : 'text',
			) );
		}
	}
}
add_action( 'customize_register', 'amar_legal_register_content' );
