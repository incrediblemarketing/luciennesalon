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

echo '<section class="procedures-slider row ' . $rc . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
//echo '<div class="' . $c1c . ' ' . $ta  . ' sh-col">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}

if ($posts) : ?>


    <?php
    if ($title || $content) {
        echo '<div class="cover hide"></div>';
        if ($title) {
            echo '<h3 class="info">' . $title . '</h3>';
        }

        if ($content) {
            echo $content;
        }
    }
    ?>


    <div class="swiper-container procedures-rotator full-width-slider">


        <div class="swiper-wrapper">

        <?php foreach ($procedures as $post) :

            setup_postdata($post);
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'image_landscape', 'full', false);
            $thumb_url = $thumb_url_array[0];

           // $image = wp_get_attachment_image_src($thumb_id, 'postslider_thumb', 'full', false);

            ?>

            <div class="item swiper-slide" data-bg="<?php echo $thumb_url; ?>">


                <div class="swiper-text-block">









                    <div class="excerpt">

                        <h4><?php the_title(); ?></h4>

                        <?php echo get_field('excerpt'); ?>


                        <a href="<?php the_permalink(); ?>" class="button button-outline button-white button-white-hover">
                            <span class="button-label">Learn more</span>
                            <span class="button-icon fal fa-long-arrow-right"></span>
                        </a>


                    </div>


                </div>


            </div>

        <?php endforeach; ?>

        </div>


        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>


    </div>

    <?php
    wp_reset_postdata();

endif;
if ($pad) {
    echo '</div>';
}
//echo '</div>';
echo '</section>';
