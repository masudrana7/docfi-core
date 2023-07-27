<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Docfi_Core;
use \RT_Posts;
use DocfiTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'docfi_team'       => array(
		'title'           => __( 'Team Member', 'docfi-core' ),
		'plural_title'    => __( 'Team', 'docfi-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'docfi-core' ),
		),
		'rewrite'         => DocfiTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'docfi_service'  => array(
		'title'           => __( 'Service', 'docfi-core' ),
		'plural_title'    => __( 'Services', 'docfi-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => DocfiTheme::$options['service_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'docfi_docs'  => array(
		'title'           => __( 'Docs', 'docfi-core' ),
		'plural_title'    => __( 'Docs', 'docfi-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => DocfiTheme::$options['docs_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
		'taxonomies' 	  => array( 'post_tag' ),
	),
);

$taxonomies = array(
	'docfi_team_category' => array(
		'title'        => __( 'Team Category', 'docfi-core' ),
		'plural_title' => __( 'Team Categories', 'docfi-core' ),
		'post_types'   => 'docfi_team',
		'rewrite'      => array( 'slug' => DocfiTheme::$options['team_cat_slug'] ),
	),	
	'docfi_service_category' => array(
		'title'        => __( 'Service Category', 'docfi-core' ),
		'plural_title' => __( 'Service Categories', 'docfi-core' ),
		'post_types'   => 'docfi_service',
		'rewrite'      => array( 'slug' => DocfiTheme::$options['service_cat_slug'] ),
	),
	'docfi_docs_category' => array(
		'title'        => __( 'Docs Category', 'docfi-core' ),
		'plural_title' => __( 'Docs Categories', 'docfi-core' ),
		'post_types'   => 'docfi_docs',
		'rewrite'      => array( 'slug' => DocfiTheme::$options['docs_cat_slug'] ),
	),
	'docfi_docs_group' => array(
		'title'        => __( 'Docs Group', 'docfi-core' ),
		'plural_title' => __( 'Docs Groups', 'docfi-core' ),
		'post_types'   => 'docfi_docs',
		// 'rewrite'      => array( 'slug' => DocfiTheme::$options['docs_cat_slug'] ),
	),
);


$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );