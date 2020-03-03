<?php

function im_register_page_sidebar()
{
    register_sidebar(array(
        'name'          => 'Page Sidebar',
        'id'            => 'page_sidebar',
        'before_widget' => '<div class="sidebar-item">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ));
}
add_action('widgets_init', 'im_register_page_sidebar');
