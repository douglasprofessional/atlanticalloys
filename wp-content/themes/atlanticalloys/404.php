<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nucleus
 */

 $not_found   = get_field( 'not_found', 'option' );
 $title       = $not_found['title'];
 $subtitle    = $not_found['subtitle'];
 $description = $not_found['description'];

get_header(); ?>

<main class="main main--page-404">
	<section class="page-404 padding-top-150 padding-bottom-80">
		<div class="container">
			<div class="page-404__content">
				<img class="page-404__logo" fetchpriority="high" src="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.svg'; ?>" srcset="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.svg'; ?>" alt="Atlantic Alloys">
				
				<?php if ( ! empty( $title ) ) { ?>
					<h1 class="page-404__title">
						<?php echo $title; ?>
					</h1>
				<?php } ?>
		
				<?php if ( ! empty( $subtitle ) ) { ?>
					<h2 class="page-404__subtitle">
						<?php echo $subtitle; ?>
					</h2>
				<?php } ?>
				
				<?php if ( $description ) { ?>
					<p class="page-404__description">
						<?php echo $description; ?>
					</p>
				<?php } ?>
				
				<div class="page-404__form">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
