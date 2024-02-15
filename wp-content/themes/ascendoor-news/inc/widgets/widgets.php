<?php

// Posts Grid Widget.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widget.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Posts Small List Widget.
require get_template_directory() . '/inc/widgets/posts-small-list-widget.php';

// Posts Tile and List Widget.
require get_template_directory() . '/inc/widgets/posts-tile-and-list-widget.php';

// Two Column Posts Widget.
require get_template_directory() . '/inc/widgets/two-column-posts-widget.php';

// Posts Carousel Widget.
require get_template_directory() . '/inc/widgets/posts-carousel-widget.php';

// Trending Posts Widget.
require get_template_directory() . '/inc/widgets/trending-posts-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

// Categories Widget.
require get_template_directory() . '/inc/widgets/categories-widget.php';

/**
 * Register Widgets
 */
function ascendoor_news_register_widgets() {

	register_widget( 'Ascendoor_News_Posts_Grid_Widget' );

	register_widget( 'Ascendoor_News_Posts_List_Widget' );

	register_widget( 'Ascendoor_News_Posts_Small_List_Widget' );

	register_widget( 'Ascendoor_News_Posts_Tile_And_List_Widget' );

	register_widget( 'Ascendoor_News_Two_Column_Posts_Widget' );

	register_widget( 'Ascendoor_News_Posts_Carousel_Widget' );

	register_widget( 'Ascendoor_News_Trending_Posts_Widget' );

	register_widget( 'Ascendoor_News_Social_Icons_Widget' );

	register_widget( 'Ascendoor_News_Categories_Widget' );

}
add_action( 'widgets_init', 'ascendoor_news_register_widgets' );
