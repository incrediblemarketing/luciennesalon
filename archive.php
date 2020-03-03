<?php if (is_archive('procedure')) : ?>
    <?php get_header(); ?>
    <div class="row block__archive justify-content-center section-padding" data-bg="<?php echo get_field('background_page_image', 'options'); ?>">
        <div class="col-xxl-8 col-lg-10 col-12">
            <h1><?php echo get_the_archive_title(); ?></h1>
            <?php if (have_posts()) : ?>
                <div class="grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="grid-tile">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail($post->ID, 'procedure_thumb'); ?>
                                <h5><?php echo get_the_title(); ?></h5>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php get_footer(); ?>
<?php else : ?>
    <?php get_template_part('index'); ?>
<?php endif; ?>