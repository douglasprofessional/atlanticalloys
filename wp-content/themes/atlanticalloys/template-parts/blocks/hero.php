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

	if ( ! empty( get_field( 'enable_parallax' ) ) ) {
		$className .= ' section-parallax';
	}

	$hero         = get_field( 'hero' );
	$pretitle     = $hero['pre_title'];
	$title        = $hero['title'];
	$subtitle     = $hero['subtitle'];
	$description  = $hero['description'];
	$link         = $hero['link'];
	$illustration = $hero['illustration'];

	if ( ! empty( $hero ) ) {

		ob_start(); ?>

		<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $className ); ?>">			
			<img fetchpriority="high" id="heroMapLeft" class="hero__map-left" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/hero_map_left.svg" srcset="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/hero_map_left.svg" alt="Atlantic Alloys Hero Section">

			<div class="container">
				<div class="hero__content">
					<?php if ( ! empty( $pretitle ) ) { ?>
						<p class="hero__pretitle header-pretitle" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
							<?php echo $pretitle; ?>
						</p>
					<?php } ?>

					<?php if ( ! empty( $title ) ) { ?>
						<h2 class="hero__title header-title" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
							<?php echo $title; ?>
						</h2>
					<?php } ?>

					<?php if ( ! empty( $subtitle ) ) { ?>
						<p class="hero__subtitle header-subtitle" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
							<?php echo $subtitle; ?>
						</p>
					<?php } ?>

					<?php if ( ! empty( $description ) ) { ?>
						<p class="hero__description header-description" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800">
							<?php echo $description; ?>
						</p>
					<?php } ?>

					<?php if ( ! empty( $link ) ) { ?>
						<a class="hero__link button button--white-outline" data-aos="zoom-out" data-aos-easing="linear" data-aos-duration="800" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>">
							<?php echo $link['title']; ?>
						</a>
					<?php } ?>

					<?php if ( ! empty( $illustration ) ) { ?>
						<div class="hero__gallery">
							<img fetchpriority="high" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="800" src="<?php echo $illustration['url']; ?>" srcset="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt'] ? $illustration['alt'] : $illustration['title']; ?>">
							<img fetchpriority="high" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="750" src="<?php echo $illustration['url']; ?>" srcset="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt'] ? $illustration['alt'] : $illustration['title']; ?>">
							<img fetchpriority="high" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="700" src="<?php echo $illustration['url']; ?>" srcset="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt'] ? $illustration['alt'] : $illustration['title']; ?>">
						</div>
					<?php } ?>
				</div>
			</div>

			<img fetchpriority="high" id="heroMapRight" class="hero__map-right" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/hero_map_right.svg" srcset="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/hero_map_right.svg" alt="Atlantic Alloys Hero Section">
		</section> 
		<?php

		echo ob_get_clean();

	}

endif;
