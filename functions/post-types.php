<?php
//Testimonials
add_action( 'init', 'mosportfolio_testimonials_init' );
function mosportfolio_testimonials_init() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'excavator-template' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'excavator-template' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'excavator-template' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'excavator-template' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'excavator-template' ),
		'add_new_item'       => __( 'Add New Testimonial', 'excavator-template' ),
		'new_item'           => __( 'New Testimonial', 'excavator-template' ),
		'edit_item'          => __( 'Edit Testimonial', 'excavator-template' ),
		'view_item'          => __( 'View Testimonial', 'excavator-template' ),
		'all_items'          => __( 'All Testimonials', 'excavator-template' ),
		'search_items'       => __( 'Search Testimonials', 'excavator-template' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'excavator-template' ),
		'not_found'          => __( 'No Testimonials found.', 'excavator-template' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'excavator-template' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'excavator-template' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon' => 'dashicons-testimonial',
		'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	);

	register_post_type( 'testimonial', $args );
}
//Works
add_action( 'init', 'mosportfolio_works_init' );
function mosportfolio_works_init() {
	$labels = array(
		'name'               => _x( 'Works', 'post type general name', 'excavator-template' ),
		'singular_name'      => _x( 'Work', 'post type singular name', 'excavator-template' ),
		'menu_name'          => _x( 'Works', 'admin menu', 'excavator-template' ),
		'name_admin_bar'     => _x( 'Work', 'add new on admin bar', 'excavator-template' ),
		'add_new'            => _x( 'Add New', 'work', 'excavator-template' ),
		'add_new_item'       => __( 'Add New Work', 'excavator-template' ),
		'new_item'           => __( 'New Work', 'excavator-template' ),
		'edit_item'          => __( 'Edit Work', 'excavator-template' ),
		'view_item'          => __( 'View Work', 'excavator-template' ),
		'all_items'          => __( 'All Works', 'excavator-template' ),
		'search_items'       => __( 'Search Works', 'excavator-template' ),
		'parent_item_colon'  => __( 'Parent Works:', 'excavator-template' ),
		'not_found'          => __( 'No Works found.', 'excavator-template' ),
		'not_found_in_trash' => __( 'No Works found in Trash.', 'excavator-template' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'excavator-template' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'work' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon' => 'dashicons-screenoptions',
		'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
	);

	register_post_type( 'work', $args );
}



add_action( 'after_switch_theme', 'flush_rewrite_rules' );
