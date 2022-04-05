<?php
/**
 * Appearance Settings
 *
 * @package Travelbee
 */

function travelbee_customize_register_appearance( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'travelbee' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'travelbee' ),
        ) 
    );
    
    /** Primary Color*/
    $wp_customize->add_setting( 
        'primary_color', 
        array(
            'default'           => '#e79372',
            'sanitize_callback' => 'sanitize_hex_color',
        ) 
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'primary_color', 
            array(
                'label'       => __( 'Primary Color', 'travelbee' ),
                'description' => __( 'Primary color of the theme.', 'travelbee' ),
                'section'     => 'colors',
                'priority'    => 5,
            )
        )
    );
    
    /** Body Settings */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'travelbee' ),
            'priority' => 40,
            'panel'    => 'appearance_settings'
        )
    );
        
    /** Note */
    $wp_customize->add_setting(
        'typography_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Travelbee_Note_Control( 
			$wp_customize,
			'typography_text',
			array(
				'section'	  => 'typography_settings',
                'description' => sprintf( __( 'You can access the Google Fonts Library %1$sHere%2$s.', 'travelbee' ), '<a href="' . esc_url("https://fonts.google.com/") . '" target="_blank">', '</a>' ),
			)
		)
    );

    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Work Sans',
			'sanitize_callback' => 'travelbee_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Travelbee_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'travelbee' ),
                'description' => __( 'Primary font of the site.', 'travelbee' ),
    			'section'     => 'typography_settings',
    			'choices'     => travelbee_get_all_fonts(),	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Ovo',
			'sanitize_callback' => 'travelbee_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Travelbee_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'travelbee' ),
                'description' => __( 'Secondary font of the site.', 'travelbee' ),
    			'section'     => 'typography_settings',
    			'choices'     => travelbee_get_all_fonts(),	
     		)
		)
	);  
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'travelbee_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Travelbee_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'typography_settings',
				'label'		  => __( 'Font Size', 'travelbee' ),
				'description' => __( 'Change the font size of your site.', 'travelbee' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel                          = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority                       = 20;
    $wp_customize->get_section( 'background_image' )->panel                = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority             = 30;

}
add_action( 'customize_register', 'travelbee_customize_register_appearance' );