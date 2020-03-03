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

echo '<section class="row procedures ' . $rc . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="' . $c1c . ' ' . $ta  . ' sh-col">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}

if ($title || $content) {
    echo '<div class="info"><div class="inner">';
    if ($title) {
        echo '<h2>' . $title . '</h2>';
    }

    if ($content) {
        echo $content;
    }
    echo '</div></div>';
}
if ($pad) {
    echo '</div>';
}
echo '</div>';

if ($posts) : ?>
    <div class="swiper-container procedure__grid--container procedure-layout">
        <div class="swiper-wrapper grid__procedure--layout">
            <?php foreach ($procedures as $post) :
                    setup_postdata($post);
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'procedure_sm_thumb', true);
                    $thumb_url = $thumb_url_array[0]; ?>
                <div class="procedure-card swiper-slide">
                    <div class="card-bottom" data-bg="<?php echo $thumb_url; ?>">
                        <h3><?php echo get_the_title(); ?></h3>
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
        <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
    </div>
<?php
    wp_reset_postdata();
endif;
echo '</section>';
