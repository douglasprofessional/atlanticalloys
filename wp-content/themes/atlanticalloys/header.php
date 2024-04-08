<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nucleus
 */

namespace WL;

get_template_part( 'template-parts/site-header/document-start' );

$site_header = get_field( 'site_header', 'option' );
$mainmenu    = $site_header['mainmenu'];

?>

	<div class="search-overlay">
		<svg id="searchOverlayClose" class="search-overlay__close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
		</svg>

		<div class="search-overlay__content">
			<img class="search-overlay__logo" fetchpriority="high" src="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.svg'; ?>" srcset="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.svg'; ?>" alt="Atlantic Alloys">
					
			<div class="search-overlay__form">
				<?php get_search_form(); ?>
			</div>		
		</div>
	</div>

	<header id="siteHeader" class="site-header" <?php echo is_front_page() ? 'data-aos="fade-down" data-aos-easing="linear" data-aos-duration="800"' : ''; ?>>
		<div class="container">
			<div class="site-header__content">
				<div class="site-header__content-left">
					<svg class="site-header__open-mainmenu" width="70" height="71" viewBox="0 0 70 71" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect y="0.5" width="70" height="70" rx="2" />
						<path d="M26 29.5H44" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M26 35.5H44" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M26 41.5H44" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>

					<a class="site-header__logo" href="/" title="Home">
						<img fetchpriority="high" src="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.svg'; ?>" scrset="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.svg'; ?>" alt="Atlantic Alloys">
					</a>
				</div>

				<div class="site-header__content-right">
					<div class="site-header__lang">
						<span>PT</span>
						
						<svg width="10" height="7" viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 1.5L5 5.5L9 1.5" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>

					<div id="siteHeaderSearch" class="site-header__search">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
							<path d="M11 19.5C15.4183 19.5 19 15.9183 19 11.5C19 7.08172 15.4183 3.5 11 3.5C6.58172 3.5 3 7.08172 3 11.5C3 15.9183 6.58172 19.5 11 19.5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M20.9999 21.5L16.6499 17.15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>

					<a class="site-header__contact button button--blue scroll-to-id" href="#siteFooter" title="<?php echo __( 'Fale conosco', 'atlanticalloys' ); ?>">
						<?php echo __( 'Fale conosco', 'atlanticalloys' ); ?>
					</a>
				</div>
			</div>
		</div>
	</header>

	<div class="mainmenu">
		<div class="mainmenu__columns">
			<div class="mainmenu__column">
				<svg class="mainmenu__close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="14 14 32 32">
					<path d="M45 15L15 45" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M15 15L45 45" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>

				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'mainmenu__container',
							'menu_id'         => 'mainmenuid',
							'menu_class'      => 'mainmenu__list',
						)
					);
					?>
			</div>

			<?php if ( ! empty( $mainmenu['illustration'] ) ) { ?>
				<div class="mainmenu__column">
					<img fetchpriority="high" class="mainmenu__illustration" src="<?php echo $mainmenu['illustration']['url']; ?>" srcset="<?php echo $mainmenu['illustration']['url']; ?>" alt="<?php echo $mainmenu['illustration']['alt'] ? $mainmenu['illustration']['alt'] : $mainmenu['illustration']['title']; ?>">
				</div>
			<?php } ?>
		</div>
	</div>

	<main class="main">
