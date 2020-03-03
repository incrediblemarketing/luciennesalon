<?php
$business_location = get_field('business_locations')[0];
?>
<div id="footer-top" class="clearfix container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-12">
            <div class="row">
                <?php
                $the_query = new WP_Query('posts_per_page=2');

                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-sm-6">
                        <a href="<?php the_permalink() ?>" class="alignleft"><?php the_post_thumbnail(); ?></a>
                        <a href="<?php the_permalink() ?>" class="blog-header"><?php the_title(); ?></a>
                        <p>By <span class="primary-text"><?php echo get_the_author(); ?></span> | <?php echo get_the_date(); ?></p>
                        <?php the_excerpt(); ?>
                    </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</div>
<footer id="footer" class="f2 clearfix container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12 col-12">
            <div class="col-12">
                <h3 class="text-center"><?php get_field('footer_header', 'options'); ?></h3>
            </div>
            <div class="row contact">
                <div class="col-sm-6 col-12">
                    <?php if (get_field('map_image', 'options')) { ?>
                        <div id="map" <?php echo ' data-bg="' . get_field('map_image', 'options') . '"'; ?>></div>
                    <?php } ?>
                </div>
                <div class="col-sm-6 col-12">
                    <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
                </div>
            </div>
            <div class="row">
                <?php if ($fsi == 1) : ?>
                    <?php get_template_part('components/social', 'icons'); ?>
                <?php endif; ?>
                <div class="copyright text-center">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- end #footer -->