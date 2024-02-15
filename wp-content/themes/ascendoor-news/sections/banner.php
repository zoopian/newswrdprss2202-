<?php
if ( ! get_theme_mod( 'ascendoor_news_enable_banner_section', false ) ) {
	return;
}

$slider_content_ids  = $editor_content_ids = array();
$slider_content_type = get_theme_mod( 'ascendoor_news_banner_slider_content_type', 'post' );
$editor_content_type = get_theme_mod( 'ascendoor_news_editor_pick_content_type', 'post' );

if ( $slider_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'ascendoor_news_banner_slider_content_post_' . $i );
	}
	$slider_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $slider_content_ids ) ) ) {
		$slider_args['post__in'] = array_filter( $slider_content_ids );
		$slider_args['orderby']  = 'post__in';
	} else {
		$slider_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'ascendoor_news_banner_slider_content_category' );
	$slider_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$slider_args = apply_filters( 'ascendoor_news_banner_section_args', $slider_args );

if ( $editor_content_type === 'post' ) {
	for ( $i = 1; $i <= 4; $i++ ) {
		$editor_content_ids[] = get_theme_mod( 'ascendoor_news_editor_pick_content_post_' . $i );
	}
	$editor_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_content_ids ) ) ) {
		$editor_args['post__in'] = array_filter( $editor_content_ids );
		$editor_args['orderby']  = 'post__in';
	} else {
		$editor_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'ascendoor_news_editor_choice_content_category' );
	$editor_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}
$editor_args = apply_filters( 'ascendoor_news_banner_section_args', $editor_args );

ascendoor_news_render_banner_section( $slider_args, $editor_args );

/**
 * Render Banner Section.
 */
function ascendoor_news_render_banner_section( $slider_args, $editor_args ) {
	?>

	<section id="ascendoor_news_banner_section" class="banner-section magazine-frontpage-section banner-section-style-2 banner-grid-slider">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_news_section_link( 'ascendoor_news_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="banner-section-wrapper">
				<div class="slider-part">
					<div class="banner-slider magazine-carousel-slider-navigation">
						<?php
						$banner_slider_query = new WP_Query( $slider_args );
						if ( $banner_slider_query->have_posts() ) {
							while ( $banner_slider_query->have_posts() ) :
								$banner_slider_query->the_post();
								?>
								<div class="mag-post-single banner-grid-single has-image tile-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'full' ); ?>
										</a>
									</div>
									<div class="mag-post-detail">
										<div class="mag-post-category with-background">
											<?php ascendoor_news_categories_list(); ?>
										</div>
										<h3 class="mag-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="mag-post-meta">
											<?php
											ascendoor_news_posted_by();
											ascendoor_news_posted_on();
											?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>

				<?php
				$editor_pick_title = get_theme_mod( 'ascendoor_news_editor_pick_title', __( 'Editor Pick', 'ascendoor-news' ) );
				?>
				<div class="editors-pick-part">
					<?php if ( ! empty( $editor_pick_title ) ) : ?>
						<div class="section-header">
							<h3 class="section-title"><?php echo esc_html( $editor_pick_title ); ?></h3>
						</div>
					<?php endif; ?>
					<div class="editors-pick-wrapper">

						<?php
						$editor_query = new WP_Query( $editor_args );
						if ( $editor_query->have_posts() ) {
							while ( $editor_query->have_posts() ) :
								$editor_query->the_post();
								?>
								<div class="mag-post-single banner-gird-single has-image">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
									</div>
									<div class="mag-post-detail">
										<div class="mag-post-category">
											<?php ascendoor_news_categories_list(); ?>
										</div>
										<h4 class="mag-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>
										<div class="mag-post-meta">
											<?php
											ascendoor_news_posted_by();
											ascendoor_news_posted_on();
											?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php

}
