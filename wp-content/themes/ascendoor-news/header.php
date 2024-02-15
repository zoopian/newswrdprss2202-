<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ascendoor News
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site ascendoor-site-wrapper">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ascendoor-news' ); ?></a>
		<div id="loader">
			<div class="loader-container">
				<div id="preloader" class="style-2">
					<div class="dot"></div>
				</div>
			</div>
		</div><!-- #loader -->

		<header id="masthead" class="site-header header-style-3 logo-size-small">
			<div class="top-middle-header-wrapper <?php echo esc_attr( ! empty( get_header_image() ) ? 'ascendoor-header-image' : '' ); ?>" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
				<?php if ( get_theme_mod( 'ascendoor_news_enable_topbar', false ) === true ) : ?>
					<div class="top-header-part">
						<div class="ascendoor-wrapper">
							<div class="top-header-wrapper">
								<div class="top-header-left">
									<div class="date-wrap">
										<i class="far fa-calendar-alt"></i>
										<span><?php echo esc_html( wp_date( 'D, M j, Y' ) ); ?></span>
									</div>
									<div class="top-header-menu">
										<?php
										if ( has_nav_menu( 'secondary' ) ) {
											wp_nav_menu(
												array(
													'theme_location' => 'secondary',
												)
											);
										}
										?>
									</div>
								</div>
								<div class="top-header-right">
									<div class="ramdom-post">
										<?php
										$args              = array(
											'posts_per_page' => 1,
											'post_type' => 'post',
											'ignore_sticky_posts' => true,
											'orderby'   => 'rand',
										);
										$random_post_query = new WP_Query( $args );
										if ( $random_post_query->have_posts() ) {
											while ( $random_post_query->have_posts() ) :
												$random_post_query->the_post();
												?>
												<a href="<?php the_permalink(); ?>" data-title="<?php esc_attr_e( 'View Random Post', 'ascendoor-news' ); ?>">
													<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 100 100">
														<polyline class="line arrow-end top" points="5.6,34.2 33.2,34.4 65.6,66.8 93.4,66.3 "></polyline>
														<polyline class="line arrow-end bottom" points="5.6,66.8 33.2,66.6 65.6,34.2 93.4,34.7 "></polyline>
														<polyline class="line" points="85.9,24.5 95.4,34.2 86.6,43.5 "></polyline>
														<polyline class="line" points="85.9,56.5 95.4,66.2 86.6,75.5 "></polyline>
													</svg>
												</a>
												<?php
											endwhile;
											wp_reset_postdata();
										}
										?>
									</div>
									<div class="social-icons">
										<?php
										if ( has_nav_menu( 'social' ) ) {
											wp_nav_menu(
												array(
													'menu_class'  => 'menu social-links',
													'link_before' => '<span class="screen-reader-text">',
													'link_after'  => '</span>',
													'theme_location' => 'social',
												)
											);
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="middle-header-part">
					<?php
					$ads_image = empty( get_theme_mod( 'ascendoor_news_header_advertisement', '' ) ) ? 'no-image' : ''
					?>
					<div class="ascendoor-wrapper">
						<div class="middle-header-wrapper <?php echo esc_attr( $ads_image ); ?>">
							<div class="site-branding site-logo-left">
								<?php if ( has_custom_logo() ) { ?>
									<div class="site-logo">
										<?php the_custom_logo(); ?>
									</div>
								<?php } ?>
								<div class="site-identity">
									<?php
									if ( is_front_page() && is_home() ) :
										?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php
									else :
										?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php
									endif;
									$ascendoor_news_description = get_bloginfo( 'description', 'display' );
									if ( $ascendoor_news_description || is_customize_preview() ) :
										?>
										<p class="site-description">
											<?php
											echo esc_html( $ascendoor_news_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
											?>
										</p>
									<?php endif; ?>
								</div>
							</div><!-- .site-branding -->
							<?php
							$advertisement     = get_theme_mod( 'ascendoor_news_header_advertisement', '' );
							$advertisement_url = get_theme_mod( 'ascendoor_news_header_advertisement_url', '' );
							if ( ! empty( $advertisement ) ) {
								?>
								<div class="mag-adver-part image">
									<a href="<?php echo esc_url( $advertisement_url ); ?>">
										<img src="<?php echo esc_url( $advertisement ); ?>" alt="<?php esc_attr_e( 'Advertisment Image', 'ascendoor-news' ); ?>">
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-header-part-outer">
				<div class="bottom-header-part">
					<div class="ascendoor-wrapper">
						<div class="bottom-header-wrapper">
							<div class="navigation-part">
								<nav id="site-navigation" class="main-navigation">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
										<span></span>
										<span></span>
										<span></span>
									</button>
									<div class="main-navigation-links">
										<?php
										if ( has_nav_menu( 'primary' ) ) {
											wp_nav_menu(
												array(
													'theme_location' => 'primary',
												)
											);
										}
										?>
									</div>
								</nav><!-- #site-navigation -->
							</div>
							<div class="bottom-header-right-part">
								<div class="header-search">
									<div class="header-search-wrap">
										<a href="#" title="Search" class="header-search-icon">
											<i class="fa-solid fa-search"></i>
										</a>
										<div class="header-search-form">
											<?php get_search_form(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->

		<?php
		if ( ! is_front_page() || is_home() ) {

			if ( is_front_page() ) {
				// Tags Section.
				require get_template_directory() . '/sections/tags-area.php';

				// Flash News.
				require get_template_directory() . '/sections/flash-news.php';

				// Banner Section.
				require get_template_directory() . '/sections/banner.php';
			}

			?>
			<div id="content" class="site-content">
				<div class="ascendoor-wrapper">
					<div class="ascendoor-page">
					<?php } ?>
