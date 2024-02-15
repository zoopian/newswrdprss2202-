<?php
/**
 * Header Options
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_header_options',
	array(
		'panel' => 'ascendoor_news_theme_options',
		'title' => esc_html__( 'Header Options', 'ascendoor-news' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'ascendoor_news_enable_topbar',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_news_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'ascendoor-news' ),
			'section' => 'ascendoor_news_header_options',
		)
	)
);

// Header Options - Advertisement.
$wp_customize->add_setting(
	'ascendoor_news_header_advertisement',
	array(
		'default'           => '',
		'sanitize_callback' => 'ascendoor_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ascendoor_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'ascendoor-news' ),
			'section'  => 'ascendoor_news_header_options',
			'settings' => 'ascendoor_news_header_advertisement',
		)
	)
);

// Header Options - Advertisement URL.
$wp_customize->add_setting(
	'ascendoor_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ascendoor_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'ascendoor-news' ),
		'section'  => 'ascendoor_news_header_options',
		'settings' => 'ascendoor_news_header_advertisement_url',
		'type'     => 'url',
	)
);
