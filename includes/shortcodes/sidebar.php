<?php

function shortcode_sidebar($atts) {
	ob_start();
	$a = shortcode_atts( array(
		'location' => null
	), $atts );

	get_sidebar($a['location']);

	return ob_get_clean();
}
add_shortcode('sidebar', 'shortcode_sidebar');
