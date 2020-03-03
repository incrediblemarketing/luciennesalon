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

echo '<section class="row procedures block__grid-columns' . $rc . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="' . $c1c . ' ' . $ta  . ' sh-col">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}

if ($title || $content) {
    if ($title) {
        echo '<h2>' . $title . '</h2>';
    }

    if ($content) {
        echo $content;
    }
}

if ($posts) : ?>
    <div class="swiper-container procedure__grid--container">
        <div class="swiper-wrapper grid__procedure--layout">
            <?php foreach ($procedures as $post) :
                setup_postdata($post);
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0]; ?>
                <div class="swiper-slide procedure-card" data-bg="<?php echo $thumb_url; ?>">
                    <!-- <?php echo wp_get_attachment_image($thumb_id, 'full', true); ?> -->
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php echo get_the_title(); ?></h3>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    wp_reset_postdata();
endif;
if ($pad) {
    echo '</div>';
}
echo '</div>';
echo '</section>';
