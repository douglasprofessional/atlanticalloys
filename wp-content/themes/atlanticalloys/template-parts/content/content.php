<?php
/**
 * Template part for displaying blog article
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package atlanticalloys
 */

 namespace WL;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-blog__article' ); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<header class="content-blog__header">
		<div class="container">
			<h1 class="content-blog__title">
				<?php echo get_the_title(); ?>
			</h1>

			<div class="content-blog__infos">
				<p class="content-blog__date">
					<?php echo get_the_date(); ?>
				</p>
			</div>
		</div>
	</header>

	<div class="content-blog__content">
		<div class="container">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="content-blog__post-thumbnail">
					<?php echo get_the_post_thumbnail( get_the_ID() ); ?>
				</div>						
			<?php } ?>

			<div class="content-blog__post-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<footer class="content-blog__footer">
		<div class="container"></div>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
