<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package atlanticalloys
 */

get_header();
?>

<div class="content-search padding-top-180 padding-bottom-80">

	<?php

	if ( have_posts() ) :
		?>
			<div class="container">		
				<h1 class="content-search__title">
					Palavra-chave: 
					<span>
						<?php echo get_search_query(); ?>
					</span>
				</h1>

				<div class="content-search__content">
					<?php

					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', 'search' );

						endwhile;
					?>
				</div>

				<div class="content-search__pagination">
					<?php
					the_posts_pagination(
						array(
							'prev_text' => __( '&#8249;' ),
							'next_text' => __( '&#8250;' ),
						)
					);
					?>
								
				</div>
			</div> 
			<?php

		else :

			get_template_part( 'template-parts/content/content', 'none' );

		endif;

		?>
	
</div>

<?php
get_footer();
