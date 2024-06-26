<?php

/**
 * atlanticalloys
 *
 * WARNING: This file is part of the atlanticalloys theme. DO NOT edit this file
 * under any circumstances, as the changes will be lost in the case of a theme update.
 * Please do all modifications in the form of a child theme.
 *
 * @since   1.0.0
 * @package WL
 * @author  Nucleus
 * @license GPL-2.0+
 * @link    http://nucleus.eti.br/
 */

namespace WL\Theme;

/**
 * Theme post types.
 *
 * @since  1.0.0
 */
class PostType {

	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ) );
	}

	public function register_post_types() {
		// CPT Products
		$this->register(
			'products',
			'Produtos',
			'Produto',
			array(
				'title',
				'custom-fields',
			),
			17,
			'dashicons-products'
		);
	}

	private function register( $name_cpt, $name_plural, $name_singular, $supports, $menu_position, $dashicons ) {
		$labels = array(
			'name'                  => _x( $name_plural, 'atlanticalloys' ),
			'singular_name'         => _x( $name_singular, 'atlanticalloys' ),
			'menu_name'             => __( $name_plural, 'atlanticalloys' ),
			'name_admin_bar'        => __( $name_plural, 'atlanticalloys' ),
			'archives'              => __( 'Arquivo do ' . $name_singular, 'atlanticalloys' ),
			'attributes'            => __( 'Atributos do ' . $name_singular, 'atlanticalloys' ),
			'parent_item_colon'     => __( $name_singular . ' principal:', 'atlanticalloys' ),
			'all_items'             => __( 'Todos os ' . $name_plural, 'atlanticalloys' ),
			'add_new_item'          => __( 'Adicionar novo ' . $name_singular, 'atlanticalloys' ),
			'add_new'               => __( 'Adicionar novo', 'atlanticalloys' ),
			'new_item'              => __( 'Novo ' . $name_singular, 'atlanticalloys' ),
			'edit_item'             => __( 'Editar ' . $name_singular, 'atlanticalloys' ),
			'update_item'           => __( 'Atualizar ' . $name_singular, 'atlanticalloys' ),
			'view_item'             => __( 'Visualizar ' . $name_singular, 'atlanticalloys' ),
			'view_items'            => __( 'Visualizar ' . $name_singular, 'atlanticalloys' ),
			'search_items'          => __( 'Buscar ' . $name_singular, 'atlanticalloys' ),
			'not_found'             => __( 'Não encontrado', 'atlanticalloys' ),
			'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'atlanticalloys' ),
			'featured_image'        => __( 'Imagem destacada', 'atlanticalloys' ),
			'set_featured_image'    => __( 'Definir imagem do ' . $name_singular, 'atlanticalloys' ),
			'remove_featured_image' => __( 'Remover imagem', 'atlanticalloys' ),
			'use_featured_image'    => __( 'Usar imagem', 'atlanticalloys' ),
			'insert_into_item'      => __( 'Inserir no ' . $name_singular, 'atlanticalloys' ),
			'uploaded_to_this_item' => __( 'Atualizar este ' . $name_singular, 'atlanticalloys' ),
			'items_list'            => __( 'Lista de ' . $name_singular, 'atlanticalloys' ),
			'items_list_navigation' => __( 'Navegação na lista de ' . $name_singular, 'atlanticalloys' ),
			'filter_items_list'     => __( 'Filtrar um $name_singular da lista', 'atlanticalloys' ),
		);
		$args   = array(
			'label'               => __( $name_singular, 'atlanticalloys' ),
			'description'         => __( $name_plural . ' Atlantic Alloys', 'atlanticalloys' ),
			'labels'              => $labels,
			'taxonomies'          => array(),
			'supports'            => $supports,
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => $menu_position,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => true,
			'menu_icon'           => $dashicons,
		);
		register_post_type( $name_cpt, $args );
	}
}
