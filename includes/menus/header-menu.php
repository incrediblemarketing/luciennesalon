<?php

function im_register_header_menu() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
		)
	);
}
add_action( 'init', 'im_register_header_menu' );
