<?php

/**
 * Active Callbacks
 *
 * @package Ascendoor News
 */

// Theme Options.
function ascendoor_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_news_enable_pagination' )->value() );
}
function ascendoor_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_news_enable_breadcrumb' )->value() );
}

// Tags Options.
function ascendoor_news_is_tags_enabled( $control ) {
	return ( $control->manager->get_Setting( 'ascendoor_news_enable_tags_section' )->value() );
}

// Flash News Section.
function ascendoor_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_news_enable_flash_news_section' )->value() );
}
function ascendoor_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_news_flash_news_content_type' )->value();
	return ( ascendoor_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_news_flash_news_content_type' )->value();
	return ( ascendoor_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Slider Section.
function ascendoor_news_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_news_enable_banner_section' )->value() );
}
function ascendoor_news_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_news_banner_slider_content_type' )->value();
	return ( ascendoor_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_news_is_banner_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_news_banner_slider_content_type' )->value();
	return ( ascendoor_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Editor Pick.
function ascendoor_news_is_editor_pick_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_news_editor_pick_content_type' )->value();
	return ( ascendoor_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_news_is_editor_pick_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_news_editor_pick_content_type' )->value();
	return ( ascendoor_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function ascendoor_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
