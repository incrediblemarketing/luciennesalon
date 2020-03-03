<?php

if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'  => 'Incredible Options',
		'menu_title'  => 'Incredible Options',
		'menu_slug'   => 'theme-general-settings',
		'capability'  => 'edit_posts',
		'redirect'    => false,
		'parent_slug' => 'options-general.php',
	));
}
