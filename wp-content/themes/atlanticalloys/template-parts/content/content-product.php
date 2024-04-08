<?php

/**
 * The article template.
 *
 * @author Nucleus LLC
 * @since 1.0.0
 *
 * @package atlanticalloys
 */

namespace WL;

$cpt_product  = get_field( 'cpt_product', get_the_ID() );
$breadcramb   = $cpt_product['breadcramb'];
$table_blocks = $cpt_product['table_blocks'];

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-product__article padding-top-180 padding-bottom-80' ); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<div class="content-product__wrap">
		<header class="content-product__header">
			<div class="container">
				<!-- breadcramb -->
				<div class="content-product__breadcrumbs">
					<?php if ( ! empty( $breadcramb['home'] ) ) { ?>
						<a class="content-product__breadcrumbs-home-products" href="<?php $breadcramb['home']['url']; ?>" title="<?php echo __( 'Produtos', 'atlanticalloys' ); ?>">
							<?php echo __( 'Produtos', 'atlanticalloys' ); ?>
						</a>

						<svg class="content-product__breadcrumbs-separator" xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" viewBox="3.75 7.5 16.5 9">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
						</svg>
					<?php } ?>

					<?php $terms = wp_get_post_terms( get_the_ID(), 'products-category' ); ?>
					<?php if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) { ?>
						<?php foreach ( $terms as $term ) { ?>
							<?php $term_link = get_term_link( $term ); ?>
							<?php if ( ! is_wp_error( $term_link ) ) { ?>
								<a class="content-product__breadcrumbs-terms" href="<?php echo esc_url( $term_link ); ?>" title="<?php echo $term->name; ?>">
									<?php echo $term->name; ?>
								</a>
							<?php } ?>
						<?php } ?>

						<svg class="content-product__breadcrumbs-separator" xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" viewBox="3.75 7.5 16.5 9">
							<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
						</svg>
					<?php } ?>

					<p class="content-product__breadcrumbs-title">
						<?php echo get_the_title(); ?>
					</p>
				</div>

				<h1 class="content-product__title header-title">
					<?php echo get_the_title(); ?>
				</h1>
			</div>
		</header>

		<?php if ( ! empty( $table_blocks ) ) { ?>
			<div class="content-product__content">
				<?php foreach ( $table_blocks as $key => $block ) { ?>
					<div class="content-product__block">
						<?php if ( ! empty( $block['title'] ) ) { ?>
							<h2 class="content-product__block-title">
								<?php echo $block['title']; ?>
							</h2>
						<?php } ?>

						<table class="content-product__block-table">
							<?php $count_header = count( $block['table']['header'] ); ?>
							<tr class="content-product__block-tr content-product__block-tr--header">
								<?php foreach ( $block['table']['header'] as $key => $header ) { ?>
									<th class="content-product__block-th <?php echo $count_header < 3 ? 'content-product__block-th--text-center' : ''; ?>">
										<?php echo $header['c']; ?>
									</th>
								<?php } ?>
							</tr>

							<?php foreach ( $block['table']['body'] as $key => $column ) { ?>
								<tr class="content-product__block-tr content-product__block-tr--body">
									<?php foreach ( $column as $key => $row ) { ?>
										<td class="content-product__block-td <?php echo $count_header < 3 ? 'content-product__block-td--text-center' : ''; ?>">
											<?php echo $row['c']; ?>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</table>
					</div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php
			$taxonomy = 'products-category';
			$terms    = get_terms( $taxonomy );

		if ( ! empty( $terms ) ) {
			?>
				<footer class="content-product__footer">
					<div class="container">
						<div class="content-product__footer-content">
							<h3 class="content-product__footer-title">
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
					</div>
				</footer> 
				<?php
		}
		?>
	</div>
</article>
