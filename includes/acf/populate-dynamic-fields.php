<?php

// ==================================================
// POST TYPE
// --------------------------------------------------
// set fields with name of `im_dynamic_post_type`
// to be a list of existing post types

function acf_populate_existing_post_types( $field ) {
	$field['choices'] = array();
	$post_types = get_post_types(null, 'objects');
	foreach ( $post_types as $post_type ) {
		$field['choices'][$post_type->name] = $post_type->label;
	}
	return $field;
}
add_filter('acf/load_field/name=im_dynamic_post_type', 'acf_populate_existing_post_types');

// ==================================================
// IMAGE SIZES
// --------------------------------------------------
// set fields with name of `im_dynamic_image_size`
// to be a list of existing thumbnail sizes
// ==================================================
function acf_populate_existing_thumbnail_sizes( $field ) {
	$field['choices'] = array();
	$thumbnail_sizes = get_intermediate_image_sizes();
	foreach ( $thumbnail_sizes as $size ) {
		$field['choices'][$size] = $size;
	}
	return $field;
}
add_filter('acf/load_field/name=im_dynamic_image_size', 'acf_populate_existing_thumbnail_sizes');

// ==================================================
// AVAILABLE BLOCK DEFAULT SOURCE
// --------------------------------------------------
// set fields with name of `im_dynamic_element_default_source`
// to be a list of available Block defaults
// ==================================================
function acf_populate_available_element_defaults( $field ) {
	$field['choices'] = array();
	$field['choices']['global'] = 'Global';

	if (have_rows('custom_block_defaults', 'options')) :
		while(have_rows('custom_block_defaults', 'options')) : the_row();
			$id = get_sub_field('id');
			$label = get_sub_field('label');
			$field['choices'][$id] = $label;
		endwhile;
	endif;

	if (count($field['choices']) == 0) {
		$field['choices'][0] = 'No defaults available';
	}

	return $field;
}
add_filter('acf/load_field/name=im_dynamic_element_default_source', 'acf_populate_available_element_defaults');
