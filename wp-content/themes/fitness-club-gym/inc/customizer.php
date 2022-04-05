<?php
/**
 * Fitness Club Gym: Customizer
 *
 * @subpackage Fitness Club Gym
 * @since 1.0
 */

use WPTRT\Customize\Section\Fitness_Club_Gym_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Fitness_Club_Gym_Button::class );

	$manager->add_section(
		new Fitness_Club_Gym_Button( $manager, 'fitness_club_gym_pro', [
			'title'      => __( 'Fitness Club Gym Pro', 'fitness-club-gym' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'fitness-club-gym' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/fitness-club-wordpress-theme/', 'fitness-club-gym')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'fitness-club-gym-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'fitness-club-gym-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function fitness_club_gym_customize_register( $wp_customize ) {

	$wp_customize->add_setting('fitness_club_gym_logo_margin',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('fitness_club_gym_logo_margin',array(
		'label' => __('Logo Margin','fitness-club-gym'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('fitness_club_gym_logo_top_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'fitness_club_gym_sanitize_float'
	));
	$wp_customize->add_control('fitness_club_gym_logo_top_margin',array(
		'type' => 'number',
		'description' => __('Top','fitness-club-gym'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('fitness_club_gym_logo_bottom_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'fitness_club_gym_sanitize_float'
	));
	$wp_customize->add_control('fitness_club_gym_logo_bottom_margin',array(
		'type' => 'number',
		'description' => __('Bottom','fitness-club-gym'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('fitness_club_gym_logo_left_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'fitness_club_gym_sanitize_float'
	));
	$wp_customize->add_control('fitness_club_gym_logo_left_margin',array(
		'type' => 'number',
		'description' => __('Left','fitness-club-gym'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('fitness_club_gym_logo_right_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'fitness_club_gym_sanitize_float'
 	));
 	$wp_customize->add_control('fitness_club_gym_logo_right_margin',array(
		'type' => 'number',
		'description' => __('Right','fitness-club-gym'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('fitness_club_gym_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'fitness_club_gym_sanitize_checkbox'
	));
	$wp_customize->add_control('fitness_club_gym_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','fitness-club-gym'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('fitness_club_gym_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'fitness_club_gym_sanitize_checkbox'
	));
	$wp_customize->add_control('fitness_club_gym_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','fitness-club-gym'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_panel( 'fitness_club_gym_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'fitness-club-gym' ),
		'description' => __( 'Description of what this panel does.', 'fitness-club-gym' ),
	) );

	$wp_customize->add_section( 'fitness_club_gym_theme_options_section', array(
    	'title'      => __( 'General Settings', 'fitness-club-gym' ),
		'priority'   => 30,
		'panel' => 'fitness_club_gym_panel_id'
	) );

	$wp_customize->add_setting('fitness_club_gym_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'fitness_club_gym_sanitize_choices'
	));
	$wp_customize->add_control('fitness_club_gym_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','fitness-club-gym'),
		'section' => 'fitness_club_gym_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','fitness-club-gym'),
		   'Right Sidebar' => __('Right Sidebar','fitness-club-gym'),
		   'One Column' => __('One Column','fitness-club-gym'),
		   'Three Columns' => __('Three Columns','fitness-club-gym'),
		   'Four Columns' => __('Four Columns','fitness-club-gym'),
		   'Grid Layout' => __('Grid Layout','fitness-club-gym')
		),
	));

	$wp_customize->add_setting('fitness_club_gym_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'fitness_club_gym_sanitize_choices'
	));
	$wp_customize->add_control('fitness_club_gym_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','fitness-club-gym'),
        'section' => 'fitness_club_gym_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','fitness-club-gym'),
            'Right Sidebar' => __('Right Sidebar','fitness-club-gym'),
            'One Column' => __('One Column','fitness-club-gym')
        ),
	));

	$wp_customize->add_setting('fitness_club_gym_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'fitness_club_gym_sanitize_choices'
	));
	$wp_customize->add_control('fitness_club_gym_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','fitness-club-gym'),
        'section' => 'fitness_club_gym_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','fitness-club-gym'),
            'Right Sidebar' => __('Right Sidebar','fitness-club-gym'),
            'One Column' => __('One Column','fitness-club-gym')
        ),
	));

	$wp_customize->add_setting('fitness_club_gym_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'fitness_club_gym_sanitize_choices'
	));
	$wp_customize->add_control('fitness_club_gym_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','fitness-club-gym'),
        'section' => 'fitness_club_gym_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','fitness-club-gym'),
            'Right Sidebar' => __('Right Sidebar','fitness-club-gym'),
            'One Column' => __('One Column','fitness-club-gym'),
		   	'Three Columns' => __('Three Columns','fitness-club-gym'),
		   	'Four Columns' => __('Four Columns','fitness-club-gym'),
            'Grid Layout' => __('Grid Layout','fitness-club-gym')
        ),
	));

	//Header
	$wp_customize->add_section( 'fitness_club_gym_header_section' , array(
    	'title'    => __( 'Header', 'fitness-club-gym' ),
		'priority' => null,
		'panel' => 'fitness_club_gym_panel_id'
	) );

	$wp_customize->add_setting('fitness_club_gym_timing',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fitness_club_gym_timing',array(
	   	'type' => 'text',
	   	'label' => __('Add Timing','fitness-club-gym'),
	   	'section' => 'fitness_club_gym_header_section',
	));

	$wp_customize->add_setting('fitness_club_gym_phone_number',array(
    	'default' => '',
    	'sanitize_callback'	=> 'fitness_club_gym_sanitize_phone_number'
	));
	$wp_customize->add_control('fitness_club_gym_phone_number',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','fitness-club-gym'),
	   	'section' => 'fitness_club_gym_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'fitness_club_gym_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'fitness-club-gym' ),
		'priority' => null,
		'panel' => 'fitness_club_gym_panel_id'
	) );

	$wp_customize->add_setting('fitness_club_gym_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'fitness_club_gym_sanitize_checkbox'
	));
	$wp_customize->add_control('fitness_club_gym_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','fitness-club-gym'),
	   	'section' => 'fitness_club_gym_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'fitness_club_gym_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'fitness_club_gym_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'fitness_club_gym_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'fitness-club-gym' ),
			'description'=> __('Image size (1400px x 600px)','fitness-club-gym'),
			'section' => 'fitness_club_gym_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//Services Section
	$wp_customize->add_section('fitness_club_gym_service_section',array(
		'title'	=> __('Service Section','fitness-club-gym'),
		'description'=> __('This section will appear below the slider.','fitness-club-gym'),
		'panel' => 'fitness_club_gym_panel_id',
	));

    $wp_customize->add_setting('fitness_club_gym_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fitness_club_gym_section_title',array(
		'label'	=> __('Section Title','fitness-club-gym'),
		'section' => 'fitness_club_gym_service_section',
		'type' => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('fitness_club_gym_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'fitness_club_gym_sanitize_choices',
	));
	$wp_customize->add_control('fitness_club_gym_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','fitness-club-gym'),
		'section' => 'fitness_club_gym_service_section',
	));

	//Footer
    $wp_customize->add_section( 'fitness_club_gym_footer', array(
    	'title'  => __( 'Footer Text', 'fitness-club-gym' ),
		'priority' => null,
		'panel' => 'fitness_club_gym_panel_id'
	) );

	$wp_customize->add_setting('fitness_club_gym_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'fitness_club_gym_sanitize_checkbox'
    ));
    $wp_customize->add_control('fitness_club_gym_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','fitness-club-gym'),
       'section' => 'fitness_club_gym_footer'
    ));

    $wp_customize->add_setting('fitness_club_gym_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fitness_club_gym_footer_copy',array(
		'label'	=> __('Footer Text','fitness-club-gym'),
		'section' => 'fitness_club_gym_footer',
		'setting' => 'fitness_club_gym_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'fitness_club_gym_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'fitness_club_gym_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'fitness_club_gym_customize_register' );

function fitness_club_gym_customize_partial_blogname() {
	bloginfo( 'name' );
}

function fitness_club_gym_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fitness_club_gym_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function fitness_club_gym_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}