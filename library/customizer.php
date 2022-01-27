<?php

define('SIMPLESHOP_CONFIG_ID','simpleshop_customizer_setting');
define('SIMPLESHOP_PANEL_ID', 'simpleshop_customzer_panel');

if(class_exists('kirki')){
    ////////// who can edit
    Kirki::add_config( SIMPLESHOP_CONFIG_ID, array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );

    ///// Panel
    Kirki::add_panel( SIMPLESHOP_PANEL_ID, array(
        'priority'    => 200,
        'title'       => esc_html__( 'Theme Options', 'simpleshop' ),
        'description' => esc_html__( 'Theme Options description', 'simpleshop' ),
    ) );

    //////////start section //// home
    Kirki::add_section( 'home_section', array(
        'title'           => esc_html__( 'Home page options', 'simpleshop' ),
        'description'     => esc_html__( 'Configer home page options', 'simpleshop' ),
        'panel'           => SIMPLESHOP_PANEL_ID,
        'priority'        => 160,
        'active_callback' => function(){
            return is_page_template('page-template/homepage.php');
        }
    ) );

    /////// hide / show field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'categroy_option',
        'label'       => esc_html__( 'Display Category section', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'category_title',
        'label'    => esc_html__( 'Category Title', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'Shop By Category', 'simpleshop' ),
        'priority' => 11,
        'active_callback' => array(array(
            'setting'  => 'categroy_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'number',
        'settings'    => 'category_column',
        'label'       => esc_html__( 'Number of category in one column', 'simpleshop' ),
        'section'     => 'home_section',
        'priority' => 11,
        'default'     => 3,
        'choices'     => [
            'min'  => 2,
            'max'  => 6,
            'step' => 1,
        ],
        'active_callback' => array(array(
            'setting'  => 'categroy_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );

    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'category_number_show',
        'label'       => esc_html__('Display product number', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 11,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    /////////// Product Options

    /////// hide / show field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'product_option',
        'label'       => esc_html__( 'Display Product section', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 12,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'product_title',
        'label'    => esc_html__( 'Product Title', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'New Arrival', 'simpleshop' ),
        'priority' => 13,
        'active_callback' => array(array(
            'setting'  => 'product_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'product_subtitle',
        'label'    => esc_html__( 'Product subtitle', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( '37 New fashion products arrived recently in our showroom for this winter', 'simpleshop' ),
        'priority' => 14,
        'active_callback' => array(array(
            'setting'  => 'product_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );

    /////////// Promo Options

    /////// hide / show field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'promo_option',
        'label'       => esc_html__( 'Display Promo section', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 15,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'promo_title',
        'label'    => esc_html__( 'Promo Title', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'Sale', 'simpleshop' ),
        'priority' => 16,
        'active_callback' => array(array(
            'setting'  => 'promo_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'promo_text',
        'label'    => esc_html__( 'Promo Offer Text', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'Up to 50% off', 'simpleshop' ),
        'priority' => 17,
        'active_callback' => array(array(
            'setting'  => 'promo_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'promo_button',
        'label'    => esc_html__( 'Promo Button Text', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'in store and online', 'simpleshop' ),
        'priority' => 18,
        'active_callback' => array(array(
            'setting'  => 'promo_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );
    //////////// link field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'link',
        'settings' => 'button_link',
        'label'    => __( 'Button Link', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => '#',
        'priority' => 19,
        'active_callback' => array(array(
            'setting'  => 'promo_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );

    /////////// Popular product Options

    /////// hide / show field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'popular_option',
        'label'       => esc_html__( 'Display popular product section', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 20,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'popular_title',
        'label'    => esc_html__( 'Popular product Title', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'Popular Product', 'simpleshop' ),
        'priority' => 21,
        'active_callback' => array(array(
            'setting'  => 'popular_option',
            'operator' => '==',
            'value'    => true,
        ))
    ] );

    /////////// Offer Options

    /////// hide / show field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'offer_option',
        'label'       => esc_html__( 'Display Offer section', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 22,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    
    /////////// Flicker Options

    /////// hide / show field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'flicker_option',
        'label'       => esc_html__( 'Display Flicker section', 'simpleshop' ),
        'section'     => 'home_section',
        'default'     => 'on',
        'priority'    => 24,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );
    /////// Text field
    Kirki::add_field( SIMPLESHOP_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'flicker_title',
        'label'    => esc_html__( 'Flicker Title', 'simpleshop' ),
        'section'  => 'home_section',
        'default'  => esc_html__( 'Simple Shop on Flickr', 'simpleshop' ),
        'priority' => 25,
        'active_callback' => array(array(
            'setting'  => 'flicker_option',
            'operator' => '==',
            'value'    => true,
        )), 
    ] );
}