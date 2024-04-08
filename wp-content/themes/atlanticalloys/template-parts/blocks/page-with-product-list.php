<?php

if ( get_field( 'disabled' ) ) {
	return; // Does not display if block is disabled
}

$block_id = $block['id'];

// Preview render (must add 'endif' to the very end of the file)
if ( isset( $block['data']['preview_image_help'] ) ) :
	echo '<img src="' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
else :

	// Create class attribute allowing for custom "className" and "align" values.
	$className = basename( __FILE__, '.php' );
	if ( ! empty( $block['className'] ) ) {
		$className .= ' ' . $block['className'];
	}
	if ( ! empty( $block['align'] ) ) {
		$className .= ' align' . $block['align'];
	}

	if ( get_field( 'padding_top' ) ) {
		$className .= ' ' . get_field( 'padding_top' );
	}

	if ( get_field( 'padding_bottom' ) ) {
		$className .= ' ' . get_field( 'padding_bottom' );
	}

	if ( get_field( 'mobile-only' ) ) {
		$className .= ' mobile-only';
	}

	if ( get_field( 'desktop-only' ) ) {
		$className .= ' desktop-only';
	}

	if ( get_field( 'equalize-columns' ) ) {
		$className .= ' equalize-columns';
	}

	if ( get_field( 'no-arrow' ) ) {
		$className .= ' no-arrow';
	}

	if ( ! empty( get_field( 'theme_colors' ) ) ) {
		$className .= ' ' . get_field( 'theme_colors' );
	} else {
		$className .= ' is-theme-light';
	}

	$pwpl          = get_field( 'page_with_product_list' );
	$wysiwyg       = $pwpl['wysiwyg'];
	$banner        = $pwpl['banner'];
	$list_products = $pwpl['list_products'];

	if ( ! empty( $pwpl ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<div class="container">
				<div class="page-with-product-list__content">
					<h2 class="page-with-product-list__title header-title">
						<?php echo get_the_title(); ?>
					</h2>

					<div class="page-with-product-list__group">
						<?php if ( ! empty( $wysiwyg ) ) { ?>
							<div class="page-with-product-list__wysiwyg">
								<?php echo $wysiwyg; ?>
							</div>
						<?php } ?>
	
						<?php if ( ! empty( $banner ) ) { ?>
							<img fetchpriority="high" class="page-with-product-list__banner" src="<?php echo $banner['url']; ?>" srcset="<?php echo $banner['url']; ?>" alt="<?php echo get_the_title(); ?>">
						<?php } ?>
					</div>

					<?php
						$taxonomy = 'products-category';
						$terms    = get_terms( $taxonomy );

					if ( $list_products && ! empty( $terms ) ) {
						?>
							<div class="page-with-product-list__list-content">
								<h3 class="page-with-product-list__list-title">
									<?php echo __( 'Outros produtos que podem lhe interessar', 'atlanticalloys' ); ?>
								</h3>

								<div class="home-products__terms">
									<?php foreach ( $terms as $key => $term ) { ?>
										<div class="home-products__term">
											<div class="home-products__term-posts">
												<h2 class="home-products__term-title">
													<?php echo $term->name; ?>
												</h2>

												<?php
													$args = array(
														'post_type' => 'products',
														'tax_query' => array(
															array(
																'taxonomy' => $taxonomy,
																'field' => 'slug',
																'terms' => $term->slug,
															),
														),
													);
													?>

												<?php $query = new \WP_Query( $args ); ?>

												<ul class="home-products__post-list">
													<?php while ( $query->have_posts() ) { ?>
														<?php $query->the_post(); ?>
														<li><a class="home-products__post-link" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
															<span><?php echo get_the_title(); ?></span>

															<svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M1 9.5L5 5.5L1 1.5" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a></li> 
													<?php } ?>
												</ul> 

												<?php wp_reset_postdata(); ?>
											</div>
										</div>
									<?php } ?>
								</div>
							</div> 
							<?php
					}
					?>
				</div>
			</div>
		</section> 
		<?php

		echo ob_get_clean();

	}

endif;
