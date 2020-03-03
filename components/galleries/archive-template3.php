<div id="gallery-archive" class="row d-flex justify-content-center gallery-archive a2" data-bg="<?php echo get_field('background_page_image', 'options'); ?>">
    <div class="col-lg-10 col-12">
        <div class="pad-v-md">
            <div class="inner-container">
                <h1 class="fancy"><span>Gallery Photos</span></h1>
                <div class="swiper-container gallery-carousel-archive">
                    <div class="swiper-wrapper">
                        <?php
                        global $post;
                        $args = array('posts_per_page' => -1, 'post_type' => 'gallery', 'post_status' => 'publish', 'parent' => 0);
                        $myposts = get_pages($args);
                        foreach ($myposts as $post) :
                            setup_postdata($post); ?>
                            <div class="swiper-slide">
                                <div class="item">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php $bg = get_the_post_thumbnail_url($post->ID, 'procedure_sm_thumb');
                                            if ($bg) {
                                                echo '<img src="' . $bg . '" />';
                                            } ?>
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                    <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
                    <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>