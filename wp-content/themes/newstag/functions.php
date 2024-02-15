<?php
/**
 * Theme functions and definitions
 *
 * @package Newstag
 */

if ( ! function_exists( 'newstag_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function newstag_enqueue_styles() {
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'newsair-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'newstag-style', get_stylesheet_directory_uri() . '/style.css', array( 'newsair-style-parent' ), '1.0' );
		wp_dequeue_style( 'newsair-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'newstag-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		//wp_enqueue_style( 'newstag-dark', get_template_directory_uri() . '/css/colors/dark.css');

		if(is_rtl()){
		wp_enqueue_style( 'newsair_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'newstag_enqueue_styles', 9999 );

function newstag_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('newstag', get_stylesheet_directory() . '/languages');

require( get_stylesheet_directory() . '/hooks/hook-front-page-main-banner-section.php' );

require( get_stylesheet_directory() . '/customize/customize-theme-style.php' );

require( get_stylesheet_directory() . '/css/custom-style.php' );

require( get_stylesheet_directory() . '/hooks/hook-header-menu-section.php' );

} 
add_action( 'after_setup_theme', 'newstag_theme_setup' );

// custom header Support
            $args = array(
            'default-image'     =>  get_stylesheet_directory_uri() .'/images/head-back.webp',
            'width'         => '1600',
            'height'        => '600',
            'flex-height'       => false,
            'flex-width'        => false,
            'header-text'       => true,
            'default-text-color'    => '000',
            'wp-head-callback'       => 'newsair_header_color',
        );
        add_theme_support( 'custom-header', $args );


if (!function_exists('newstag_get_block')) :
    /**
     *
     *
     * @since Newstag 1.0.0
     *
     */
    function newstag_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('hooks/blocks/block-' . $section, $block);

    }
endif;

function newstag_customize_register($wp_customize) {

require( get_stylesheet_directory() . '/customize/theme-layout.php' );
    $wp_customize->remove_control('newsair_header_overlay_color');
}
add_action('customize_register', 'newstag_customize_register',  1000);