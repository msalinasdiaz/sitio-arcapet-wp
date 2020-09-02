<?php
/**
 * bhost Theme Customizer
 *
 * @package bhost
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bhost_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bhost_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bhost_customize_preview_js() {
	wp_enqueue_script( 'bhost_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bhost_customize_preview_js' );

/**
 * Custom scripts and styles on customize.php for bhost.
 *
 * @since bhost 1.2.7
 */
function bhost_customize_scripts() {
	wp_enqueue_script( 'bhost_customizer_custom', get_template_directory_uri() . '/js/bhost-customizer-custom-scripts.min.js', array( 'jquery' ), '20131028', true );
	
	$bhost_misc_links = array(
							'upgrade_link' 				=> esc_url( 'https://www.codegrape.com/item/bhost-pro-responsive-wordpress-theme/8758' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'bhost' ),
		);

	//Add Upgrade Button and old WordPress message via localized script
	wp_localize_script( 'bhost_customizer_custom', 'bhost_misc_links', $bhost_misc_links );

	wp_enqueue_style( 'bhost_customizer_custom', get_template_directory_uri() . '/css/bhost-customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'bhost_customize_scripts');