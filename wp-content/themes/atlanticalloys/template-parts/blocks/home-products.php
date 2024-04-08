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

	$parallax      = get_field( 'enable_parallax' );
	$home_products = get_field( 'home_products' );
	$pretitle      = $home_products['pre_title'];
	$title         = $home_products['title'];
	$subtitle      = $home_products['subtitle'];
	$description   = $home_products['description'];
	$link          = $home_products['link'];

	$taxonomy = 'products-category';
	$terms    = get_terms( $taxonomy );

	if ( ! empty( $terms ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<?php echo ! empty( $parallax ) ? '<div class="parallax__window">' : ''; ?>
				<?php echo ! empty( $parallax ) ? '<div class="parallax__body">' : ''; ?>
					<div class="container">
						<div class="home-products__content">
							<?php if ( ! empty( $pretitle ) ) { ?>
								<p class="home-products__pretitle header-pretitle" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
									<?php echo $pretitle; ?>
								</p>
							<?php } ?>

							<?php if ( ! empty( $title ) ) { ?>
								<h2 class="home-products__title header-title" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
									<?php echo $title; ?>
								</h2>
							<?php } ?>

							<?php if ( ! empty( $subtitle ) ) { ?>
								<p class="home-products__subtitle header-subtitle" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
									<?php echo $subtitle; ?>
								</p>
							<?php } ?>

							<?php if ( ! empty( $description ) ) { ?>
								<p class="home-products__description header-description" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
									<?php echo $description; ?>
								</p>
							<?php } ?>

							<?php if ( ! empty( $link ) ) { ?>
								<a class="home-products__link button button--white-outline" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
									<?php echo $link['title']; ?>
								</a>
							<?php } ?>

							<div class="home-products__terms">
								<?php foreach ( $terms as $key => $term ) { ?>
									<div class="home-products__term" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="800">
										<img fetchpriority="high" class="home-products__term-thumbnail" src="<?php echo get_stylesheet_directory_uri() . '/dist/images/product.webp'; ?>" srcset="<?php echo get_stylesheet_directory_uri() . '/dist/images/product.webp'; ?>" alt="<?php echo $term->name; ?>">
										
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

												$query = new WP_Query( $args );
												?>

											<ul class="home-products__post-list">

												<?php
												while ( $query->have_posts() ) {
													$query->the_post();
													?>
														<li><a class="home-products__post-link" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
															<span><?php echo get_the_title(); ?></span>

															<svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M1 9.5L5 5.5L1 1.5" stroke="currentColor" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</a></li> 
														<?php
												}
												?>

											</ul> 

											<?php wp_reset_postdata(); ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php echo ! empty( $parallax ) ? '</div>' : ''; ?>
			<?php echo ! empty( $parallax ) ? '</div>' : ''; ?>
		</section> 
		<?php

		echo ob_get_clean();

	}

endif;
