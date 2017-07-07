<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function custom_post_types() {
	// Reviews post type
	$reviews_labels = array(
		'add_new'            => _x( 'Add New', 'faq' ),
		'add_new_item'       => __( 'Add New Review' ),
		'all_items'          => __( 'All Reviews' ),
		'edit_item'          => __( 'Edit Review' ),
		'menu_name'          => _x( 'Reviews', 'admin menu' ),
		'name_admin_bar'     => _x( 'Review', 'add new on admin bar' ),
		'name'               => _x( 'Reviews', 'post type general name' ),
		'new_item'           => __( 'New Review' ),
		'not_found'          => __( 'No Reviews found.' ),
		'not_found_in_trash' => __( 'No Reviews found in Trash.' ),
		'parent_item_colon'  => __( 'Parent Review:' ),
		'search_items'       => __( 'Search Reviews' ),
		'singular_name'      => _x( 'Review', 'post type singular name' ),
		'view_item'          => __( 'View Review' ),
	);

	$reviews_args = array(
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'labels'             => $reviews_labels,
		'menu_icon'          => 'dashicons-format-chat',
		'menu_position'      => null,
		'public'             => true,
		'publicly_queryable' => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'reviews'
		),
		'show_ui'            => true,
		'show_in_menu'       => true,
		'supports'           => array(
			'editor',
			'title',
		),
	);

	register_post_type( 'reviews', $reviews_args );
}

add_action( 'init', 'custom_post_types' );
