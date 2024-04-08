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

	$parallax                = get_field( 'enable_parallax' );
	$illustration_block_text = get_field( 'illustration_block_text' );
	$illustration            = $illustration_block_text['illustration'];
	$title                   = $illustration_block_text['title'];
	$description             = $illustration_block_text['description'];
	$link                    = $illustration_block_text['link'];

	if ( ! empty( $title ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className . ' ' . ( ! empty( $parallax ) ? 'parallax' : '' ) ); ?>">
			<?php echo ! empty( $parallax ) ? '<div class="parallax__window">' : ''; ?>
				<?php echo ! empty( $parallax ) ? '<div class="parallax__body">' : ''; ?>
					<div class="illustration-block-text__content">
						<div class="illustration-block-text__columns">
							<div class="illustration-block-text__column">
								<img fetchpriority="high" class="illustration-block-text__illustration illustration-block-text__illustration--mobile" src="<?php echo $illustration['mobile']['url']; ?>" srcset="<?php echo $illustration['mobile']['url']; ?>" alt="<?php echo $illustration['mobile']['alt'] ? $illustration['mobile']['alt'] : $illustration['mobile']['title']; ?>">
								<img fetchpriority="high" class="illustration-block-text__illustration illustration-block-text__illustration--desktop" src="<?php echo $illustration['desktop']['url']; ?>" srcset="<?php echo $illustration['desktop']['url']; ?>" alt="<?php echo $illustration['desktop']['alt'] ? $illustration['desktop']['alt'] : $illustration['desktop']['title']; ?>">
							</div>

							<div class="illustration-block-text__column">
								<?php if ( ! empty( $title['primary'] ) ) { ?>
									<h2 class="illustration-block-text__title misaligned-title">
										<?php echo $title['primary']; ?>
										<?php if ( ! empty( $title['secondary'] ) ) { ?>
											<span><?php echo $title['secondary']; ?></span>
										<?php } ?>
									</h2>
								<?php } ?>

								<?php if ( ! empty( $description ) ) { ?>
									<p class="illustration-block-text__description header-description">
										<?php echo $description; ?>
									</p>
								<?php } ?>

								<?php if ( ! empty( $link ) ) { ?>
									<a class="illustration-block-text__link button button--arrow-down button--white-outline" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
										<?php echo $link['title']; ?>
									</a>
								<?php } ?>

								<svg class="illustration-block-text__atlantic-outline" width="445" height="378" viewBox="0 0 445 378" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path stroke="currentColor" stroke-miterlimit="10" d="M1.54004 370.326L162.179 0.793945H294.063L443.92 376.488C443.92 376.488 392.094 386.762 337.696 325.165C283.297 263.568 215.545 228.157 108.289 261.012C108.289 261.012 172.944 278.479 171.404 318.496C171.404 318.496 177.565 343.125 107.781 348.778C37.9962 354.431 1.54004 370.326 1.54004 370.326Z"/>
								</svg>
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
