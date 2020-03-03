<?php get_header(); ?>
<?php if (is_singular('procedure')) { ?>
    <?php get_template_part('components/content-page'); ?>
<?php } elseif (is_singular('gallery')) {

    $gallery = get_field('single_gallery_layout', 'options');

    if ($gallery == 's1') :
        get_template_part('components/galleries/single-template1');
    elseif ($gallery == 's2') :
        get_template_part('components/galleries/single-template2');
    elseif ($gallery == 's3') :
        get_template_part('components/galleries/single-template3');
    elseif ($gallery == 's4') :
        get_template_part('components/galleries/single-template4');
    endif;
} else { ?>
    <div class="row justify-content-center section-padding">
        <div class="col-lg-7 col-12">
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('components/post'); ?>

                <?php endwhile; ?>

                <?php get_template_part('components/navigation-single'); ?>

            <?php else : ?>

                <?php get_template_part('components/post-not-found'); ?>

            <?php endif; ?>
        </div>
        <div class="col-lg-3">
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>