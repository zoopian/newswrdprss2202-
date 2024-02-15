<?php
/**
 * Tags Section
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_tags_section',
	array(
		'panel' => 'ascendoor_news_front_page_options',
		'title' => esc_html__( 'Tags Section', 'ascendoor-news' ),
	)
);

// Tags Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_news_enable_tags_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_news_enable_tags_section',
		array(
			'label'    => esc_html__( 'Enable Tags Section', 'ascendoor-news' ),
			'section'  => 'ascendoor_news_tags_section',
			'settings' => 'ascendoor_news_enable_tags_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_news_enable_tags_section',
		array(
			'selector' => '#ascendoor_news_tags_section .section-link',
			'settings' => 'ascendoor_news_enable_tags_section',
		)
	);
}

// Tags Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_news_tags_title',
	array(
		'default'           => __( '#Tags:', 'ascendoor-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_news_tags_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_tags_section',
		'settings'        => 'ascendoor_news_tags_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_news_is_tags_enabled',
	)
);

// Tags Section - Number of Posts.
$wp_customize->add_setting(
	'ascendoor_news_tags_count',
	array(
		'default'           => 10,
		'sanitize_callback' => 'ascendoor_news_sanitize_number_range',
		'validate_callback' => 'ascendoor_news_validate_tags_count',
	)
);

$wp_customize->add_control(
	'ascendoor_news_tags_count',
	array(
		'label'           => esc_html__( 'Number of Tags to Show', 'ascendoor-news' ),
		'description'     => esc_html__( 'Note: Min 1 | Max 10. Please input the valid number and save. Then refresh the page to see the change.', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_tags_section',
		'settings'        => 'ascendoor_news_tags_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 10,
		),
		'active_callback' => 'ascendoor_news_is_tags_enabled',
	)
);
