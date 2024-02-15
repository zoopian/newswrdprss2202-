<?php
/**
 * Front Page Options
 *
 * @package Ascendoor News
 */

$wp_customize->add_panel(
	'ascendoor_news_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'ascendoor-news' ),
		'priority' => 130,
	)
);

// Tags Section.
require get_template_directory() . '/inc/customizer/front-page-options/tags-area.php';

// Flash News Section.
require get_template_directory() . '/inc/customizer/front-page-options/flash-news.php';

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';
