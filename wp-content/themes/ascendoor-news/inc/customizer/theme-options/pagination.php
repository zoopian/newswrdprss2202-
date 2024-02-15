<?php
/**
 * Pagination
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_pagination',
	array(
		'panel' => 'ascendoor_news_theme_options',
		'title' => esc_html__( 'Pagination', 'ascendoor-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ascendoor_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ascendoor_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ascendoor-news' ),
			'section'  => 'ascendoor_news_pagination',
			'settings' => 'ascendoor_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ascendoor_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_pagination',
		'settings'        => 'ascendoor_news_pagination_type',
		'active_callback' => 'ascendoor_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'ascendoor-news' ),
			'numeric' => __( 'Numeric', 'ascendoor-news' ),
		),
	)
);
