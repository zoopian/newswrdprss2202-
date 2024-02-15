<?php
/**
 * Sidebar Position
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'ascendoor-news' ),
		'panel' => 'ascendoor_news_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_news_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ascendoor-news' ),
		'section' => 'ascendoor_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-news' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ascendoor-news' ),
		'section' => 'ascendoor_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-news' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ascendoor-news' ),
		'section' => 'ascendoor_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-news' ),
		),
	)
);
