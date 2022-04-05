<?php
/**
 * Custom header implementation
 */

function fitness_club_gym_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'fitness_club_gym_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 85,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'fitness_club_gym_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'fitness_club_gym_custom_header_setup' );

if ( ! function_exists( 'fitness_club_gym_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see fitness_club_gym_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'fitness_club_gym_header_style' );
function fitness_club_gym_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header {
			background-image:url('".esc_url(get_header_image())."');
			background-position: bottom center;
		}";
	   	wp_add_inline_style( 'fitness-club-gym-basic-style', $custom_css );
	endif;
}
endif; // fitness_club_gym_header_style