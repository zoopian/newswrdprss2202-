<?php 
function newstag_custom_style()
{
$header_color = get_theme_mod('newstag_header_overlay_color','rgba(0, 2, 79, 0.7)');
$remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); 
?>
<?php if($remove_header_image_overlay == false ) { ?>
  <style>
  .bs-default .bs-header-main .inner{
    background-color:<?php echo esc_attr($header_color);?>
  }
  </style>
<?php } else { ?>
 <style> 
  .bs-default .bs-header-main .inner{
    background-color: transparent;
  }
 </style>
<?php } } add_action('wp_head','newstag_custom_style',10,0); 