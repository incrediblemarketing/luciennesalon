<?php

function im_register_sidebar_blog()
{
	register_sidebar(array(
		'name'          => 'Sidebar Blog',
		'id'            => 'sidebar_blog',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	));
}
add_action('widgets_init', 'im_register_sidebar_blog');
