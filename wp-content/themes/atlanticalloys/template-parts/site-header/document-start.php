<?php
/**
 * The template for the start of the html document.
 *
 * @package WordPress
 * @subpackage WL_Theme
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#012036" />

	<?php if ( has_post_thumbnail() ) : ?>
		<meta property="og:image" content="<?php the_post_thumbnail_url( 'xm-thumbnails' ); ?>" />
	<?php else : ?>
		<meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/atlantic_alloys.svg" />
	<?php endif; ?>
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:type" content="<?php get_bloginfo( 'description' ); ?>" />
	<meta property="og:title" content="
	<?php
	if ( get_the_title() == 'Home' ) {
	} elseif ( single_term_title( '', false ) !== null ) {
		echo single_term_title( '', false ) . ' - ';
	} else {
		echo get_the_title() . ' - ';
	}
	?>
	" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() . '/dist/images/atlantic_alloys.png'; ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
	<?php wp_body_open(); ?>
