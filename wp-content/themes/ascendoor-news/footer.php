<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ascendoor News
 */

?>
<?php if ( ! is_front_page() || is_home() ) { ?>
	</div>
	</div>
	</div><!-- #content -->
<?php } ?>

</div><!-- #page -->

<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) ) : ?>
		<div class="site-footer-top">
			<div class="ascendoor-wrapper">
				<div class="footer-widgets-wrapper three-column-1">
					<?php for ( $i = 1; $i <= 3; $i++ ) { ?>
						<div class="footer-widget-single">
							<?php dynamic_sidebar( 'footer-widget-' . $i ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div><!-- .footer-top -->
	<?php endif; ?>
	<div class="site-footer-bottom">
		<div class="ascendoor-wrapper">
			<div class="site-footer-bottom-wrapper style-1">
				<div class="site-info">
					<?php
					/**
					 * Hook: ascendoor_news_footer_copyright.
					 *
					 * @hooked - ascendoor_news_output_footer_copyright_content - 10
					 */
					do_action( 'ascendoor_news_footer_copyright' );
					?>
				</div><!-- .site-info -->
				<div class="social-icons">
					<?php
					if ( has_nav_menu( 'social' ) ) {
						wp_nav_menu(
							array(
								'menu_class'     => 'menu social-links',
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
								'theme_location' => 'social',
							)
						);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<?php
$is_scroll_top_active = get_theme_mod( 'ascendoor_news_scroll_top', true );
if ( $is_scroll_top_active ) :
	?>
	<a href="#" id="scroll-to-top" class="magazine-scroll-to-top all-device">
		<i class="fa-solid fa-chevron-up"></i>
		<div class="progress-wrap">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
			</svg>
		</div>
	</a>
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>
