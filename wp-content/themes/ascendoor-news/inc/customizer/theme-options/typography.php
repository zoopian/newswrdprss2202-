<?php

/**
 * Typography
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_typography',
	array(
		'panel' => 'ascendoor_news_theme_options',
		'title' => esc_html__( 'Typography', 'ascendoor-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ascendoor_news_site_title_font',
	array(
		'default'           => 'Roboto',
		'sanitize_callback' => 'ascendoor_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ascendoor-news' ),
		'section'  => 'ascendoor_news_typography',
		'settings' => 'ascendoor_news_site_title_font',
		'type'     => 'select',
		'choices'  => ascendoor_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ascendoor_news_site_description_font',
	array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'ascendoor_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ascendoor-news' ),
		'section'  => 'ascendoor_news_typography',
		'settings' => 'ascendoor_news_site_description_font',
		'type'     => 'select',
		'choices'  => ascendoor_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ascendoor_news_header_font',
	array(
		'default'           => 'Roboto',
		'sanitize_callback' => 'ascendoor_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ascendoor-news' ),
		'section'  => 'ascendoor_news_typography',
		'settings' => 'ascendoor_news_header_font',
		'type'     => 'select',
		'choices'  => ascendoor_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ascendoor_news_body_font',
	array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'ascendoor_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ascendoor-news' ),
		'section'  => 'ascendoor_news_typography',
		'settings' => 'ascendoor_news_body_font',
		'type'     => 'select',
		'choices'  => ascendoor_news_get_all_google_font_families(),
	)
);
