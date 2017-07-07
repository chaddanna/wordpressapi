<?php
/**
 * chaddanna CMB2 metaboxes
 *
 * @package chaddanna
 */
class chad_cmb2_metaboxes {
	// Prefix for metabox field ids uses underscore so it won't show
	// up on the WP custom fields dropdown
	private static $prefix = '_chad_';
	// Initalize cmb2 fields
	public function __construct() {
		add_action( 'cmb2_init', array(
			$this,
			'chad_cmb2_reviews_post_meta'
		));
	}

	// Reviews post Meta Fields
	public static function chad_cmb2_reviews_post_meta() {
    // Set up a meta box
    $chad_reviews_page_box = new_cmb2_box( array(
      'id'            => 'chad_reviews_post_metabox',
      'title'         => __( 'Review Post Meta', 'chad' ),
      'object_types'	=> array( 'post', 'reviews' ), // post type
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
      'show_in_rest'  => true
    ) );

    // Add fields to the box
    $chad_reviews_page_box->add_field( array(
      'name'			=> __( 'Some Text', 'chad' ),
      'desc'			=> 'enter some text',
      'id'				=> self::$prefix . 'review_text',
      'type'			=> 'text'
    ) );
	}
}

new chad_cmb2_metaboxes;
