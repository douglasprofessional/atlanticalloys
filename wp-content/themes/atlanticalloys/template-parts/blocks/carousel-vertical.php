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

	$parallax          = get_field( 'enable_parallax' );
	$carousel_vertical = get_field( 'carousel_vertical' );
	$slides            = $carousel_vertical['slides'];

	if ( ! empty( $slides ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<?php echo ! empty( $parallax ) ? '<div class="parallax__window">' : ''; ?>
				<?php echo ! empty( $parallax ) ? '<div class="parallax__body">' : ''; ?>			
					<div class="container">
						<div class="carousel-vertical__content">
							<div class="owl-carousel carousel-vertical__slides">
								<?php $count = 1; foreach ( $slides as $key => $slide ) { ?>
									<div class="item is-style-rounded" style="background-color: <?php echo $slide['background_color']; ?>;">
										<div class="carousel-vertical__columns carousel-vertical__columns--<?php echo $count % 2 != 0 ? 'orientation-left' : 'orientation-right'; ?> is-style-rounded">
											<div class="carousel-vertical__column">
												<img class="carousel-vertical__illustration carousel-vertical__illustration--mobile" src="<?php echo $slide['illustration']['mobile']['url']; ?>" srcset="<?php echo $slide['illustration']['mobile']['url']; ?>" alt="<?php echo $slide['illustration']['mobile']['alt'] ? $slide['illustration']['mobile']['alt'] : $slide['illustration']['mobile']['title']; ?>">
												<img class="carousel-vertical__illustration carousel-vertical__illustration--desktop" src="<?php echo $slide['illustration']['desktop']['url']; ?>" srcset="<?php echo $slide['illustration']['desktop']['url']; ?>" alt="<?php echo $slide['illustration']['desktop']['alt'] ? $slide['illustration']['desktop']['alt'] : $slide['illustration']['desktop']['title']; ?>">
											</div>

											<div class="carousel-vertical__column">
												<?php if ( ! empty( $slide['title']['primary'] ) ) { ?>
													<h2 class="carousel-vertical__title misaligned-title">
														<?php echo $slide['title']['primary']; ?>
														<?php if ( ! empty( $slide['title']['secondary'] ) ) { ?>
															<span><?php echo $slide['title']['secondary']; ?></span>
														<?php } ?>
													</h2>
												<?php } ?>
				
												<?php if ( ! empty( $slide['description'] ) ) { ?>
													<p class="carousel-vertical__description header-description">
														<?php echo $slide['description']; ?>
													</p>
												<?php } ?>
				
												<?php if ( ! empty( $slide['link'] ) ) { ?>
													<a class="carousel-vertical__link button button--arrow-down button--white-outline" href="<?php echo $slide['link']['url']; ?>" title="<?php echo $slide['link']['title']; ?>" target="<?php echo $slide['link']['target']; ?>">
														<?php echo $slide['link']['title']; ?>
													</a>
												<?php } ?>

												<svg class="carousel-vertical__atlantic-outline" width="445" height="378" viewBox="0 0 445 378" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path stroke="currentColor" stroke-miterlimit="10" d="M1.54004 370.326L162.179 0.793945H294.063L443.92 376.488C443.92 376.488 392.094 386.762 337.696 325.165C283.297 263.568 215.545 228.157 108.289 261.012C108.289 261.012 172.944 278.479 171.404 318.496C171.404 318.496 177.565 343.125 107.781 348.778C37.9962 354.431 1.54004 370.326 1.54004 370.326Z"/>
												</svg>
											</div>
										</div>
									</div>
								<?php $count++; } ?>
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
