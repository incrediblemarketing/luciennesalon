<?php

function shortcode_reusable_block($atts) {
	ob_start();
	$a = shortcode_atts( array(
		'id' => null
	), $atts );

	if (have_rows('reusable_blocks', 'options')) :
		while ( have_rows('reusable_blocks', 'options') ) : the_row();
			$id = get_sub_field('id');
			if ($a['id'] == $id) {
				echo get_template_part('components/blocks');
			}
		endwhile;
	endif;
	return ob_get_clean();
}
add_shortcode('reusable_block', 'shortcode_reusable_block');
