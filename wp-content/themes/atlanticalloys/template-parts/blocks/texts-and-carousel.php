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

	$parallax           = get_field( 'enable_parallax' );
	$texts_and_carousel = get_field( 'texts_and_carousel' );
	$pretitle           = $texts_and_carousel['pre_title'];
	$title              = $texts_and_carousel['title'];
	$subtitle           = $texts_and_carousel['subtitle'];
	$description        = $texts_and_carousel['description'];
	$link               = $texts_and_carousel['link'];
	$info               = $texts_and_carousel['info'];
	$history            = $texts_and_carousel['history'];

	if ( ! empty( $title ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<?php echo ! empty( $parallax ) ? '<div class="parallax__window">' : ''; ?>
				<?php echo ! empty( $parallax ) ? '<div class="parallax__body">' : ''; ?>
					<div class="container">
						<div class="texts-and-carousel__content">
							<?php if ( ! empty( $pretitle ) ) { ?>
								<p class="texts-and-carousel__pretitle header-pretitle">
									<?php echo $pretitle; ?>
								</p>
							<?php } ?>

							<?php if ( ! empty( $title ) ) { ?>
								<h2 class="texts-and-carousel__title header-title">
									<?php echo $title; ?>
								</h2>
							<?php } ?>

							<?php if ( ! empty( $subtitle ) ) { ?>
								<p class="texts-and-carousel__subtitle header-subtitle">
									<?php echo $subtitle; ?>
								</p>
							<?php } ?>

							<?php if ( ! empty( $description ) ) { ?>
								<p class="texts-and-carousel__description header-description">
									<?php echo $description; ?>
								</p>
							<?php } ?>

							<?php if ( ! empty( $link ) ) { ?>
								<a class="texts-and-carousel__link button button--white-outline" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
									<?php echo $link['title']; ?>
								</a>
							<?php } ?>

							<div class="texts-and-carousel__columns">
								<div class="texts-and-carousel__column">
									<div class="texts-and-carousel__info">
										<?php if ( ! empty( $info['title'] ) ) { ?>
											<h3 class="texts-and-carousel__info-title misaligned-title">
												<?php echo $info['title']['primary']; ?>
												<?php if ( ! empty( $info['title']['secondary'] ) ) { ?>
													<span><?php echo $info['title']['secondary']; ?></span>
												<?php } ?>
											</h3>
										<?php } ?>

										<?php if ( ! empty( $info['title'] ) ) { ?>
											<p class="texts-and-carousel__info-description">
												<?php echo $info['description']; ?>
											</p>
										<?php } ?>
									</div>
								</div>

								<div class="texts-and-carousel__column"></div>

								<div class="texts-and-carousel__column">
									<div class="texts-and-carousel__history">
										<?php if ( ! empty( $history['title'] ) ) { ?>
											<h3 class="texts-and-carousel__history-title misaligned-title">
												<?php echo $history['title']['primary']; ?>
												<?php if ( ! empty( $history['title']['secondary'] ) ) { ?>
													<span><?php echo $history['title']['secondary']; ?></span>
												<?php } ?>
											</h3>
										<?php } ?>

										<?php if ( ! empty( $history['periods'] ) ) { ?>
											<div class="owl-carousel texts-and-carousel__owl-carousel">
												<?php foreach ( $history['periods'] as $key => $period ) { ?>
													<div class="item">
														<?php if ( ! empty( $period['title'] ) ) { ?>
															<h4 class="texts-and-carousel__period-title">
																<?php echo $period['title']; ?>
															</h4>
														<?php } ?>

														<?php if ( ! empty( $period['description'] ) ) { ?>
															<p class="texts-and-carousel__period-description">
																<?php echo $period['description']; ?>
															</p>
														<?php } ?>
													</div>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
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
