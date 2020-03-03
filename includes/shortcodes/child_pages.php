<?php

function shortcode_child_pages($atts) {
	ob_start();
	get_template_part('components/navigation-child-pages');
	return ob_get_clean();
}
add_shortcode('child_pages', 'shortcode_child_pages');
