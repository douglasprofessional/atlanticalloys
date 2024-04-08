<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nucleus
 */

namespace WL;

$footer          = get_field( 'site_footer', 'option' );
$contact_us      = $footer['contact_us'];
$google_map_link = $footer['google_map_link'];
$quick_links     = $footer['quick_links'];
$form            = $footer['form'];

?>
	</main>

	<footer id="siteFooter" class="site-footer">
		<div class="site-footer__content">
			<div class="container">
				<div class="site-footer__columns">
					<div class="site-footer__column">
						<div class="site-footer__vertical">
							<?php if ( ! empty( $contact_us ) || ! empty( $google_map_link ) ) { ?>
								<div class="site-footer__inner-columns">
									<?php if ( ! empty( $contact_us ) ) { ?>
										<div class="site-footer__inner-column">
											<h2 class="site-footer__title">
												<?php echo __( 'Fale conosco', 'atlanticalloys' ); ?>
											</h2>
	
											<ul class="site-footer__contact-us">
												<?php foreach ( $contact_us as $key => $contact ) { ?>
													<?php if ( ! empty( $contact['name'] ) ) { ?>
														<li>
															<h3 class="site-footer__contact-name">
																<?php echo $contact['name']; ?>
															</h3>
	
															<?php if ( ! empty( $contact['tel'] ) ) { ?>
																<a class="site-footer__contact-tel" href="tel:<?php echo str_replace( array( ' ', '.', '-', '(', ')' ), '', $contact['tel'] ); ?>" title="<?php echo $contact['tel']; ?>">
																	<?php echo $contact['tel']; ?>
																</a>
															<?php } ?>
	
															<?php if ( ! empty( $contact['e_mail'] ) ) { ?>
																<a class="site-footer__contact-mail" href="mailto:<?php echo $contact['e_mail']; ?>" title="<?php echo $contact['e_mail']; ?>">
																	<?php echo $contact['e_mail']; ?>
																</a>
															<?php } ?>
														</li>
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									<?php } ?>
	
									<?php if ( ! empty( $google_map_link ) ) { ?>
										<div class="site-footer__inner-column">
											<h2 class="site-footer__title">
												<?php echo __( 'Escritório', 'atlanticalloys' ); ?>
											</h2>
	
											<a class="site-footer__google-map" href="<?php echo $google_map_link['url']; ?>" title="<?php echo $google_map_link['title']; ?>" target="<?php echo $google_map_link['target']; ?>">
												<?php echo $google_map_link['title']; ?>
											</a>
										</div>
									<?php } ?>
								</div>
	
								<hr class="hr hr--blue">
							<?php } ?>
	
							<?php if ( ! empty( $quick_links ) ) { ?>
								<div class="site-footer__inner-columns">
									<div class="site-footer__inner-column">
										<h2 class="site-footer__title">
											<?php echo __( 'Links rápidos', 'atlanticalloys' ); ?>
										</h2>
		
										<ul class="site-footer__quick-links">
											<?php foreach ( $quick_links as $key => $link ) { ?>
												<?php if ( ! empty( $link['link'] ) ) { ?>
													<li>
														<a href="<?php echo $link['link']['url']; ?>" title="<?php echo $link['link']['title']; ?>" target="<?php echo $link['link']['target']; ?>">
															<?php echo $link['link']['title']; ?>
														</a>
													</li>
												<?php } ?>
											<?php } ?>
										</ul>
									</div>
	
									<div class="site-footer__inner-column hidden lg:block"></div>
								</div>
							<?php } ?>
						</div>
					</div>

					<?php if ( ! empty( $form ) ) { ?>
						<div class="site-footer__column">
							<div class="site-footer__vertical site-footer__vertical--form">
								<h2 class="site-footer__title">
									<?php echo __( 'Mande um e-mail', 'atlanticalloys' ); ?>
								</h2>

								<div class="site-footer__form">
									<?php echo do_shortcode( $form ); ?>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="site-footer__column hidden lg:block"></div>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="site-footer__copy">
			<div class="container">
				<p>copyright <?php echo date( 'Y' ) . __( ' © todos os direitos reservados', 'atlanticalloys' ); ?></p>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>

</html>
<?php
