<?php

// excerpt_more
function im_excerpt_more($more)
{
    return '&hellip;';
}
add_filter('excerpt_more', 'im_excerpt_more');

function im_previous_posts_link_attributes($attr)
{
    return 'class="ml-auto"';
}
add_filter('previous_posts_link_attributes', 'im_previous_posts_link_attributes');

function im_previous_post_link_attributes($output)
{
    $attr = 'class="ml-auto"';
    return str_replace('<a href=', '<a ' . $attr . ' href=', $output);
}
add_filter('previous_post_link', 'im_previous_post_link_attributes');
function new_excerpt_more($more)
{
    global $post;
    return '<a class="read-more btn btn-primary" href="' . get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter('pre_get_posts', 'top_archives');

function top_archives($query)
{
    if ($query->is_archive('procedure') && !is_admin()) {
        $query->set('post_parent', 0);
        $query->set('order', 'ASC');
        $query->set('orderby', 'menu_order');
    }
    return $query;
}
