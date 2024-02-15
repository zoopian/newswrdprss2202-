<?php
/**
 * Banner Section
 *
 * @package Ascendoor News
 */

$wp_customize->add_section(
	'ascendoor_news_banner_section',
	array(
		'panel' => 'ascendoor_news_front_page_options',
		'title' => esc_html__( 'Banner Section', 'ascendoor-news' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ascendoor-news' ),
			'section'  => 'ascendoor_news_banner_section',
			'settings' => 'ascendoor_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_news_enable_banner_section',
		array(
			'selector' => '#ascendoor_news_banner_section .section-link',
			'settings' => 'ascendoor_news_enable_banner_section',
		)
	);
}

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'ascendoor_news_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_banner_section',
		'settings'        => 'ascendoor_news_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-news' ),
			'category' => esc_html__( 'Category', 'ascendoor-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_news_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_news_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-news' ), $i ),
			'section'         => 'ascendoor_news_banner_section',
			'settings'        => 'ascendoor_news_banner_slider_content_post_' . $i,
			'active_callback' => 'ascendoor_news_is_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'ascendoor_news_banner_slider_content_category',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_banner_slider_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_banner_section',
		'settings'        => 'ascendoor_news_banner_slider_content_category',
		'active_callback' => 'ascendoor_news_is_banner_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'ascendoor_news_banner_slider_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Ascendoor_News_Customize_Horizontal_Line(
		$wp_customize,
		'ascendoor_news_banner_slider_horizontal_line',
		array(
			'section'         => 'ascendoor_news_banner_section',
			'settings'        => 'ascendoor_news_banner_slider_horizontal_line',
			'active_callback' => 'ascendoor_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Editor Pick Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_news_editor_pick_title',
	array(
		'default'           => __( 'Editor Pick', 'ascendoor-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_news_editor_pick_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_banner_section',
		'settings'        => 'ascendoor_news_editor_pick_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_news_is_banner_section_enabled',
	)
);

// Editor Pick Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_news_editor_pick_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_editor_pick_content_type',
	array(
		'label'           => esc_html__( 'Select Editor Pick Content Type', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_banner_section',
		'settings'        => 'ascendoor_news_editor_pick_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-news' ),
			'category' => esc_html__( 'Category', 'ascendoor-news' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Editor Pick Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_news_editor_pick_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_news_editor_pick_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-news' ), $i ),
			'section'         => 'ascendoor_news_banner_section',
			'settings'        => 'ascendoor_news_editor_pick_content_post_' . $i,
			'active_callback' => 'ascendoor_news_is_editor_pick_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_news_get_post_choices(),
		)
	);

}

// Editor Pick Section - Select Category.
$wp_customize->add_setting(
	'ascendoor_news_editor_pick_content_category',
	array(
		'sanitize_callback' => 'ascendoor_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_news_editor_pick_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-news' ),
		'section'         => 'ascendoor_news_banner_section',
		'settings'        => 'ascendoor_news_editor_pick_content_category',
		'active_callback' => 'ascendoor_news_is_editor_pick_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_news_get_post_cat_choices(),
	)
);
