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

	$parallax     = get_field( 'enable_parallax' );
	$grid_cards   = get_field( 'grid_cards' );
	$illustration = $grid_cards['illustration'];
	$cards        = $grid_cards['cards'];

	if ( ! empty( $cards ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<?php echo ! empty( $parallax ) ? '<div class="parallax__window">' : ''; ?>
				<?php echo ! empty( $parallax ) ? '<div class="parallax__body">' : ''; ?>			
					<div class="container">
						<div class="grid-cards__content">
							<div class="grid-cards__columns">
								<div class="grid-cards__column">
									<div class="grid-cards__cards">
										<?php foreach ( $cards as $key => $card ) { ?>
											<?php if ( ! empty( $card['link'] ) ) { ?>
												<a class="grid-cards__card-link" href="<?php echo $card['link']['url']; ?>" title="<?php echo $card['link']['title']; ?>" target="<?php echo $card['link']['target']; ?>">
											<?php } ?>
											<div class="grid-cards__card">
												<?php if ( ! empty( $card['pretitle'] ) ) { ?>
													<p class="grid-cards__card-pretitle">
														<?php echo $card['pretitle']; ?>
													</p>
												<?php } ?>
				
												<div class="grid-cards__card-group">
													<?php if ( ! empty( $card['title'] ) ) { ?>
														<h2 class="grid-cards__card-title">
															<?php echo $card['title']; ?>
														</h2>
													<?php } ?>
					
													<?php if ( ! empty( $card['description'] ) ) { ?>
														<p class="grid-cards__card-description">
															<?php echo $card['description']; ?>
														</p>
													<?php } ?>
												</div>
											</div>
											<?php if ( ! empty( $card['link'] ) ) { ?>
												</a>
											<?php } ?>
										<?php } ?>
				
										<?php if ( ! empty( $illustration ) ) { ?>
											<img loading="lazy" class="grid-cards__card-illustration" src="<?php echo $illustration['url']; ?>" srcset="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt'] ? $illustration['alt'] : $illustration['title']; ?>">
										<?php } ?>
									</div>
								</div>

								<div class="grid-cards__column">
									<?php if ( ! empty( $illustration ) ) { ?>
										<img loading="lazy" class="grid-cards__illustration" src="<?php echo $illustration['url']; ?>" srcset="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt'] ? $illustration['alt'] : $illustration['title']; ?>">
									<?php } ?>
								</div>
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
