<?php 
// Adding customizer home page setting
function newstag_style_customizer( $wp_customize ){

//Theme Background Color
$wp_customize->add_setting(
    'newstag_header_overlay_color', array( 'sanitize_callback' => 'newsair_sanitize_alpha_color','default' => 'rgba(0, 2, 79, 0.7)',
    
) );
$wp_customize->add_control(new Newsair_Customize_Alpha_Color_Control( $wp_customize,'newstag_header_overlay_color', array(
   	'label'      => __('Background Color', 'newstag' ),
    'palette' => true,
    'section' => 'header_image',
    'active_callback'   => function( $setting ) {
			if ( $setting->manager->get_setting( 'remove_header_image_overlay' )->value() == false ) {
				return true;
			}
			return false;
    	}
	)
) );
}

add_action( 'customize_register', 'newstag_style_customizer' );