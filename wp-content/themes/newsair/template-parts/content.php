<?php
/**
 * The template for displaying the content.
 * @package Newsair
 */
?>
<div class="row">
     <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php 
       while(have_posts()){ the_post(); ?>
        <?php get_template_part('sections/content','data'); ?>
        <?php } ?>
        <div class="col-md-12 text-center d-md-flex justify-content-between">
            <?php //Previous / next page navigation
                $prev_text =  (is_rtl()) ? "right" : "left";
                $next_text =  (is_rtl()) ? "left" : "right";
                
                the_posts_pagination( array(
                        'prev_text'          => '<i class="fas fa-angle-'.$prev_text.'"></i>',
                        'next_text'          => '<i class="fas fa-angle-'.$next_text.'"></i>',
                    ) 
                );
            ?>
            <div class="navigation"><p><?php posts_nav_link(); ?></p></div>
        </div>
    </div>
</div>