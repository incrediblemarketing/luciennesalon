<div class="row justify-content-center gallery g4" data-bg="<?php echo get_field('background_page_image', 'option'); ?>">
    <div class="col-sm-10 col-12">
        <div class="pad-v-md">
            <h1 class="text-center"><?php echo the_title(); ?></h1>
            <p class="small text-center">* Individual results will vary.</p>
            <?php
            $images = get_field('gallery_images'); ?>
            <div class="swiper-container single-gallery">
                <div class="swiper-wrapper">
                    <?php
                    $counter = 0;
                    if ($images) : ?>
                        <?php foreach ($images as $image) : ?>
                            <?php if ($counter % 2 === 0) : ?>
                                <div class="ba-link item swiper-slide">
                                    <img src="<?php echo $image['url']; ?>" />
                                <?php else : ?>
                                    <img src="<?php echo $image['url']; ?>" />
                                </div>
                            <?php endif; ?>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
                <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
            </div>
        </div>
    </div>
</div>