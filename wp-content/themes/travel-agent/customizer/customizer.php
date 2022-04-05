<?php

function travel_agent_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'adventure_travelling_color_option' );
    $wp_customize->remove_section( 'adventure_travelling_documentation' );
    $wp_customize->remove_section( 'adventure_travelling_social_media' );
    $wp_customize->remove_setting( 'adventure_travelling_location' );
    $wp_customize->remove_control( 'adventure_travelling_location' );
    $wp_customize->remove_setting( 'adventure_travelling_timming' );
    $wp_customize->remove_control( 'adventure_travelling_timming' );
}
add_action( 'customize_register', 'travel_agent_remove_customize_register', 11 );

function travel_agent_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'travel_agent_trip_offer_section' , array(
        'title'      => __( 'Latest Offer Settings', 'travel-agent' ),
        'panel' => 'adventure_travelling_panel_id'
    ) );

    $wp_customize->add_setting('travel_agent_offer_section_short_title',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('travel_agent_offer_section_short_title',array(
        'label' => __('Short Title','travel-agent'),
        'section'   => 'travel_agent_trip_offer_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('travel_agent_offer_section_tittle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('travel_agent_offer_section_tittle',array(
        'label' => __('Section Title','travel-agent'),
        'section'   => 'travel_agent_trip_offer_section',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('travel_agent_offer_section_text',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('travel_agent_offer_section_text',array(
        'label' => __('Section Description','travel-agent'),
        'section'   => 'travel_agent_trip_offer_section',
        'type'      => 'text'
    ));

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('travel_agent_offer_section_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('travel_agent_offer_section_category',array(
        'type'    => 'select',
        'choices' => $offer_cat,
        'label' => __('Select Category','travel-agent'),
        'section' => 'travel_agent_trip_offer_section',
    ));

}
add_action( 'customize_register', 'travel_agent_customize_register' );