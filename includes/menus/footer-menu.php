<?php

function im_register_footer_menu() {
	register_nav_menus(
		array(
			'footer-menu' => __( 'Footer Menu' ),
		)
	);
}
add_action( 'init', 'im_register_footer_menu' );
