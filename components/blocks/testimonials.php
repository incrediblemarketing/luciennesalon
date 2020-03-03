<?php
$testimonials = get_sub_field('testimonials');
$title = get_sub_field('title');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$bi = get_sub_field('background_image');
$bd = get_sub_field('background_design');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');

echo '<section class="row sh-row testimonials no-overflow ' . $rc . '" data-bg="' . $bi . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="col-12 ' . $c1c . ' ' . $ta  . ' sh-col">';
if ($pad) {
    echo '<div class="' . $pad . ' ' . $bd . '">';
}
if ($title) {
    echo '<h3><span>' . $title . '</span></h3>';
}
if ($posts) : ?>
    <div class="swiper-container testimonials-rotator">
        <div class="swiper-wrapper">
            <?php foreach ($testimonials as $post) : ?>
                <?php setup_postdata($post); ?>
                <div class="swiper-slide">
                    <?php if ($bd === 'simple') {
                        the_post_thumbnail('thumbnail');
                    } ?>
                    <?php the_content(); ?>
                    <strong><?php the_title(); ?></strong>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php
    wp_reset_postdata();
endif;
if ($pad) {
    echo '</div>';
}
echo '</div>';
echo '</section>';
