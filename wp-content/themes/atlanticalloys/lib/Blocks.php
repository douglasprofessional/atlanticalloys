<?php

namespace WL\Theme;

class Blocks {
	public function ready() {
		add_action( 'acf/init', array( $this, 'my_acf_blocks_init' ) );
	}

	function my_acf_blocks_init() {
		if ( function_exists( 'acf_register_block_type' ) ) {
			acf_register_block_type(
				array(
					'name'            => 'get-started',
					'title'           => __( 'Get Started' ),
					'description'     => __( 'Start: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/get-started.php',
					'category'        => 'common',
					'icon'            => 'table-col-before',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/get-started.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'hero',
					'title'           => __( 'Hero' ),
					'description'     => __( 'Hero: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/hero.php',
					'category'        => 'common',
					'icon'            => 'cover-image',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/hero.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'carousel-vertical',
					'title'           => __( 'Carousel Vertical' ),
					'description'     => __( 'Carousel Vertical: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/carousel-vertical.php',
					'category'        => 'common',
					'icon'            => 'slides',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/carousel-vertical.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'grid-cards',
					'title'           => __( 'Grid Cards' ),
					'description'     => __( 'Grid Cards: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/grid-cards.php',
					'category'        => 'common',
					'icon'            => 'grid-view',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/grid-cards.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'atlantic-in-numbers',
					'title'           => __( 'Atlantic In Numbers' ),
					'description'     => __( 'Atlantic In Numbers: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/atlantic-in-numbers.php',
					'category'        => 'common',
					'icon'            => 'grid-view',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/atlantic-in-numbers.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'texts-and-carousel',
					'title'           => __( 'Textos + Carrossel' ),
					'description'     => __( 'Textos + Carrossel: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/texts-and-carousel.php',
					'category'        => 'common',
					'icon'            => 'grid-view',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/texts-and-carousel.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'illustration-block-text',
					'title'           => __( 'Ilustração mais bloco de texto' ),
					'description'     => __( 'Ilustração mais bloco de texto: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/illustration-block-text.php',
					'category'        => 'common',
					'icon'            => 'welcome-widgets-menus',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/illustration-block-text.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'home-products',
					'title'           => __( 'Home de Produtos' ),
					'description'     => __( 'Home de Produtos: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/home-products.php',
					'category'        => 'common',
					'icon'            => 'products',
					'post_types'      => array( 'page', 'post' ), // 'modal'...
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/home-products.png',
							),
						),
					),
				)
			);

			acf_register_block_type(
				array(
					'name'            => 'page-with-product-list',
					'title'           => __( 'Página com lista de produtos' ),
					'description'     => __( 'Página com lista de produtos: ACF/Gutemberg block, by Nucleus' ),
					'render_template' => '/template-parts/blocks/page-with-product-list.php',
					'category'        => 'common',
					'icon'            => 'welcome-widgets-menus',
					'post_types'      => array( 'page' ),
					'mode'            => 'edit',
					'example'         => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/thumbnail/page-with-product-list.png',
							),
						),
					),
				)
			);
		}
	}
}
