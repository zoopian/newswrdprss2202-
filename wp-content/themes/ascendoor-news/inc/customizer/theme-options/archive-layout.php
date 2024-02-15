<?php
/**
 * Archive Layout
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'ascendoor-news' ),
		'panel' => 'ascendoor_news_theme_options',
	)
);

// Archive Layout - Grid Style.
$wp_customize->add_setting(
	'ascendoor_news_archive_grid_style',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_archive_grid_style',
	array(
		'label'   => esc_html__( 'Grid Style', 'ascendoor-news' ),
		'section' => 'ascendoor_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'grid-column-2' => __( 'Column 2', 'ascendoor-news' ),
			'grid-column-3' => __( 'Column 3', 'ascendoor-news' ),
		),
	)
);
