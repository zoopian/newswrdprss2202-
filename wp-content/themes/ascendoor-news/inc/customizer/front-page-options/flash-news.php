<?php
/**
 * Flash News Section
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_flash_news_section',
	array(
		'panel' => 'ascendoor_news_front_page_options',
		'title' => esc_html__( 'Flash News Section', 'ascendoor-news' ),
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_news_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_news_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'ascendoor-news' ),
			'section'  => 'ascendoor_news_flash_news_section',
			'settings' => 'ascendoor_news_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_news_enable_flash_news_section',
		array(
			'selector' => '#ascendoor_news_flash_news_section .section-link',
			'settings' => 'ascendoor_news_enable_flash_news_section',
		)
	);
}

// Flash News Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_news_flash_news_title',
	array(
		'default'           => __( 'Flash News', 'ascendoor-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_news_flash_news_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_flash_news_section',
		'settings'        => 'ascendoor_news_flash_news_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_news_is_flash_news_section_enabled',
	)
);

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'ascendoor_news_flash_news_speed_controller',
	array(
		'default'           => 300,
		'sanitize_callback' => 'ascendoor_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'ascendoor_news_flash_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'ascendoor-news' ),
		'description'     => esc_html__( 'Note: Default speed value is 300.', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_flash_news_section',
		'settings'        => 'ascendoor_news_flash_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'ascendoor_news_is_flash_news_section_enabled',
	)
);

// Flash News Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_news_flash_news_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_flash_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_flash_news_section',
		'settings'        => 'ascendoor_news_flash_news_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_news_is_flash_news_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-news' ),
			'category' => esc_html__( 'Category', 'ascendoor-news' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Flash News Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_news_flash_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_news_flash_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-news' ), $i ),
			'section'         => 'ascendoor_news_flash_news_section',
			'settings'        => 'ascendoor_news_flash_news_content_post_' . $i,
			'active_callback' => 'ascendoor_news_is_flash_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_news_get_post_choices(),
		)
	);

}

// Flash News Section - Select Category.
$wp_customize->add_setting(
	'ascendoor_news_flash_news_content_category',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_flash_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_flash_news_section',
		'settings'        => 'ascendoor_news_flash_news_content_category',
		'active_callback' => 'ascendoor_news_is_flash_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_news_get_post_cat_choices(),
	)
);
