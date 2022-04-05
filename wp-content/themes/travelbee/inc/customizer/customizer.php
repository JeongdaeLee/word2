<?php
/**
 * Travelbee Theme Customizer
 *
 * @package Travelbee
 */

/**
 * Requiring customizer panels & sections
*/
$travelbee_sections     = array('info', 'site', 'footer', 'layout', 'appearance', 'general','home' );

foreach( $travelbee_sections as $a ){
    require get_template_directory() . '/inc/customizer/' . $a . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travelbee_customize_preview_js() {
	wp_enqueue_script( 'travelbee-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), TRAVELBEE_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'travelbee_customize_preview_js' );

function travelbee_customize_script(){
    $array = array(
        'home'    => get_permalink( get_option( 'page_on_front' ) )
    );
    
    wp_enqueue_style( 'travelbee-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), TRAVELBEE_THEME_VERSION );
    wp_enqueue_script( 'travelbee-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), TRAVELBEE_THEME_VERSION, true );
    wp_localize_script( 'travelbee-customize', 'travelbee_cdata', $array );

    wp_localize_script( 'travelbee-repeater', 'travelbee_customize',
		array(
			'nonce' => wp_create_nonce( 'travelbee_customize_nonce' )
		)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'travelbee_customize_script' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';