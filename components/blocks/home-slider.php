<?php
$type = get_sub_field('slider_type');
$rev = get_sub_field('rev_slider_shortcode');
$textalign = get_sub_field('textarea_align');
$overlayhero = get_sub_field('slight_overlay');
?>
<section class="hero row no-width">
    <div class="col-12 hero-content
    <?php if (!$overlayhero) {
        echo ' no-overlay';
    } ?>
    <?php if ($type == 'Video') {
        echo ' video-overlay';
    } ?>
    <?php if ($type == 'Slider') {
        echo ' hero-slider';
    } ?>
" id="hero" data-bg="<?php echo get_sub_field('slider_bg'); ?>">
        <?php if ($type == 'Video') { ?>
            <video poster="<?php echo get_sub_field('slider_bg'); ?>" id="bgvid" playsinline autoplay muted loop controls>
                <source src="<?php echo get_sub_field('webm_file')['url']; ?>" type="video/webm">
                <source src="<?php echo get_sub_field('mp4_file')['url']; ?>" type="video/mp4">
            </video>
        <?php } elseif ($type == 'Slider') { ?>
            <div class="swiper-container hero-rotator">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('slider')) :
                        while (have_rows('slider')) : the_row();
                            if (get_row_layout() == 'slide') : ?>
                                <div class="swiper-slide
                                                    <?php if (get_sub_field('slide_overlay')) {
                                                        echo 'overlay';
                                                    } ?>" data-bg="<?php echo get_sub_field('background_image'); ?>">
                                    <div class="inner-flex align-items-center <?php echo get_sub_field('slide_row_css'); ?>">
                                        <div class="inner <?php echo get_sub_field('slide_column_css'); ?>">
                                            <div class="info">
                                                <?php echo get_sub_field('slider_slide_content'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        endif;
                    endwhile;
                endif;
                ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="inner <?php echo $textalign; ?>">
        <div class="info <?php echo $textalign; ?>">
            <?php echo get_sub_field('slide_content'); ?>
        </div>
    </div>
    </div>
</section>