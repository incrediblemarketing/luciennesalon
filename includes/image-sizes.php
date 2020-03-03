<?php

add_image_size('header_bg', 1920, 300, true);
add_image_size('procedure_thumb', 320, 320, true);
add_image_size('procedure_sm_thumb', 480, 429, true);
add_image_size('featured_thumb', 480, 350, true);
add_image_size('parent_thumb', 650, 650, true);
add_image_size('gallery_thumb', 365, 365, true);
add_image_size('postslider_thumb', 480, 650, true);
add_image_size('image_landscape', 1920, 1280, true);

function my_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'header_bg' => __('Header Background'),
        'procedure_thumb' => __('Procedure Thumbnail'),
        'procedure_sm_thumb' => __('Small Procedure Thumbnail'),
        'featured_thumb' => __('Featured Thumbnail'),
        'parent_thumb' => __('Parent Thumbnail'),
        'gallery_thumb' => __('Gallery Thumbnail'),
        'postslider_thumb' => __('Post Slider Thumbnail'),
        'image_landscape' => __('Image Landscape')
    ));
}
add_filter('image_size_names_choose', 'my_custom_sizes');
