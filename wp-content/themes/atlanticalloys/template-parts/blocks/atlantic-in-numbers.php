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

	$parallax            = get_field( 'enable_parallax' );
	$atlantic_in_numbers = get_field( 'atlantic_in_numbers' );
	$title               = $atlantic_in_numbers['title'];
	$cards               = $atlantic_in_numbers['cards'];

	if ( ! empty( $atlantic_in_numbers['cards'] ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<?php echo ! empty( $parallax ) ? '<div class="parallax__window">' : ''; ?>
				<?php echo ! empty( $parallax ) ? '<div class="parallax__body">' : ''; ?>			
					<div class="container">
						<div class="atlantic-in-numbers__content">
							<?php if ( ! empty( $title ) ) { ?>
								<h2 class="atlantic-in-numbers__title">
									<?php echo $title; ?>
								</h2>
							<?php } ?>

							<div class="atlantic-in-numbers__cards">
								<?php foreach ( $atlantic_in_numbers['cards'] as $key => $card ) { ?>
									<div class="atlantic-in-numbers__card">
										<?php if ( ! empty( $card['title'] ) ) { ?>
											<h3 class="atlantic-in-numbers__card-title">
												<?php echo $card['title']; ?>
											</h3>

											<?php if ( ! empty( $card['title'] ) && ! empty( $card['description'] ) ) { ?>
												<span class="atlantic-in-numbers__card-dot">•</span>
											<?php } ?>

											<?php if ( ! empty( $card['description'] ) ) { ?>
												<p class="atlantic-in-numbers__card-description">
													<?php echo $card['description']; ?>
												</p>
											<?php } ?>								
										<?php } ?>								
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
