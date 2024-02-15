<?php
/**
 * Excerpt
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_excerpt_options',
	array(
		'panel' => 'ascendoor_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'ascendoor-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'ascendoor_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'ascendoor_news_sanitize_number_range',
		'validate_callback' => 'ascendoor_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'ascendoor_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ascendoor-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 200. Please input the valid number and save. Then refresh the page to see the change.', 'ascendoor-news' ),
		'section'     => 'ascendoor_news_excerpt_options',
		'settings'    => 'ascendoor_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);
