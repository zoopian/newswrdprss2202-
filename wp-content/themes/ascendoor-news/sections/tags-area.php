<?php

if ( ! get_theme_mod( 'ascendoor_news_enable_tags_section', false ) ) {
	return;
}

$section_content          = array();
$section_content['count'] = get_theme_mod( 'ascendoor_news_tags_count', 10 );

$section_content = apply_filters( 'ascendoor_news_tags_section_content', $section_content );

ascendoor_news_render_tags_section( $section_content );

/**
 * Render tags section.
 */
function ascendoor_news_render_tags_section( $section_content ) {
	$title = get_theme_mod( 'ascendoor_news_tags_title', __( '#Tags:', 'ascendoor-news' ) );
	?>
	<section id="ascendoor_news_tags_section" class="tag-section">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_news_section_link( 'ascendoor_news_tags_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="tag-section-wrapper">
				<strong><?php echo esc_html( $title ); ?></strong>
				<ul>
					<?php
					$posttags = get_tags(
						array( 'number' => $section_content['count'] )
					);
					if ( $posttags ) {
						foreach ( $posttags as $tag ) {
							?>
							<li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
							<?php
						}
					}
					?>
				</ul>
			</div>
		</div>
	</section>
	<?php

}

