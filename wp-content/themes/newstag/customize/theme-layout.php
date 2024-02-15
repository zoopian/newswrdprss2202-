<?php  
class Newstag_Custom_Radio_Default_Image_Control extends WP_Customize_Control {
        
    /**
     * Declare the control type.
     *
     * @access public
     * @var string
     */
    public $type = 'radio-image';
    
    public $is_text = false;
    /**
     * Enqueue scripts and styles for the custom control.
     * 
     * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
     * 
     * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
     * at 'customize_controls_print_styles'.
     *
     * @access public
     */

    public function enqueue() {
        wp_enqueue_script( 'jquery-ui-button' );
    }
    
    /**
     * Render the control to be displayed in the Customizer.
     */
    public function render_content() {
        if ( empty( $this->choices ) ) {
            return;
        }           
        // $is_text;
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title">
            <?php echo esc_attr( $this->label ); ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
        </span>
        <div id="input_<?php echo $this->id; ?>" class="custom-radio-control text-center image">
            <?php if ($this->is_text == true ){ ?>
                <?php foreach ( $this->choices as $key => $value ) : ?>
                <label class="radio-button-label"  value="<?php echo esc_attr( $key ); ?>">
                    <input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
                    <span><?php echo esc_html( $value ); ?>
                        <span class="radio-tooltip normal">Unset</span>
                        <span class="radio-tooltip italic">Italic</span>
                        <span class="radio-tooltip none">None</span>
                        <span class="radio-tooltip capitalize">Capitalize</span>
                        <span class="radio-tooltip lowercase">Lowercase</span>
                        <span class="radio-tooltip Uppercase">Uppercase</span>
                    </span>
                </label>
                <?php endforeach; ?>
            <?php } else { ?>
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                    <label for="<?php echo $this->id . $value; ?>">
                        <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                    </label>
                    </input>
                    <?php endforeach; ?>
            <?php } ?> 
        </div>
        <script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
        <?php
    }
}


$wp_customize->add_setting(
    'newstag_content_layout', array(
    'default'           => 'align-content-right',
    'sanitize_callback' => 'newsair_sanitize_radio'
) );

$wp_customize->add_control(
    new Newstag_Custom_Radio_Default_Image_Control( 
        // $wp_customize object
        $wp_customize,
        // $id
        'newstag_content_layout',
        // $args
        array(
            'settings'      => 'newstag_content_layout',
            'section'       => 'site_layout_settings',
            'choices'       => array(
                'align-content-left' => get_template_directory_uri() . '/images/fullwidth-left-sidebar.png',  
                'full-width-content'    => get_template_directory_uri() . '/images/fullwidth.png',
                'align-content-right'    => get_template_directory_uri() . '/images/right-sidebar.png',
                'grid-left-sidebar' => get_template_directory_uri() . '/images/grid-left-sidebar.png',
                'grid-fullwidth' => get_template_directory_uri() . '/images/grid-fullwidth.png',
                'grid-right-sidebar' => get_template_directory_uri() . '/images/grid-right-sidebar.png',
            )
        )
    )
);