<?php get_header(); ?>

<div class="row block__blog justify-content-center padding--section">
    <div class="col-lg-7 col-12 sh-col">
        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('components/post-preview'); ?>

            <?php endwhile; ?>

            <?php get_template_part('components/navigation-loop'); ?>

        <?php else : ?>

            <?php get_template_part('components/post-not-found'); ?>

        <?php endif; ?>
    </div>
    <div class="col-lg-3">
        <?php get_sidebar('blog'); ?>
    </div>
</div>

<?php get_footer(); ?>