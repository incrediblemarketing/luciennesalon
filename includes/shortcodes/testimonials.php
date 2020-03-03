<?php

function shortcode_testimonial($atts)
{
    global $post;

    $args = array(
        'post_type'      => 'testimonial',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
    );

    $testimonial = new WP_Query($args);
    $content = '';
    if ($testimonial->have_posts()) :
        $content .= '<div class="grid__block--testimonial">';
        while ($testimonial->have_posts()) : $testimonial->the_post();
            $content .= '<div class="block__testimonials">';
            $content .= '<h4>' . get_the_title() . '</h4>';
            $content .= get_the_content();
            $content .= '</div>';
        endwhile;
        $content .= '</div>';
        wp_reset_postdata();
    endif;

    return $content;
}
add_shortcode('testimonials', 'shortcode_testimonial');
