<?php
/**
 * Breadcrumb
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ascendoor-news' ),
		'panel' => 'ascendoor_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ascendoor_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ascendoor-news' ),
			'section' => 'ascendoor_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ascendoor_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ascendoor_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ascendoor-news' ),
		'active_callback' => 'ascendoor_news_is_breadcrumb_enabled',
		'section'         => 'ascendoor_news_breadcrumb',
	)
);
