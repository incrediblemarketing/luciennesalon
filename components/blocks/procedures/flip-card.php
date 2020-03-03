<?php
$procedures = get_sub_field('procedures');
$title = get_sub_field('title');
$content = get_sub_field('content');

$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');

echo '<section class="row card-procedures ' . $rc . ' " data-bg="' . $bi . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '" data-bg="' . $bi . '">';
echo '<div class="col-xl-10 col-12' . $c1c . ' ' . $ta . '">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}
if ($title) {
    echo '<h3>' . $title . '</h3>';
}

if ($content) {
    echo $content;
}
foreach ($procedures as $post) :
    setup_postdata($post);
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'postslider_thumb', true);
    $thumb_url = $thumb_url_array[0];
    echo '<div class="card-holder">';
    echo '<div class="card-flipper">';
    echo '<div class="card-top" data-bg="' . $thumb_url . '">';
    echo '<h3>' . get_the_title() . '</h3>';
    echo '</div>';
    echo '<div class="card-back primary-bg">';
    echo '<h4>' . get_the_title() . '</h4>';
    echo get_field('excerpt');
    echo '<a href="' . get_the_permalink() . '" class="btn btn-secondary">Read More</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
endforeach;
wp_reset_postdata();
if ($pad) {
    echo '</div>';
}
echo '</div>';
echo '</section>';
