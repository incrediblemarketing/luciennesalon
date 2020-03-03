<?php $business_location = get_field('business_locations')[0]; ?>
<footer id="footer" class="f3 clearfix">
    <div class="row">
        <?php if (get_field('map_image', 'options')) { ?>
            <div id="map" <?php echo ' data-bg="' . get_field('map_image', 'options') . '"'; ?>></div>
        <?php } ?>
        <div class="col-lg-4 col-md-5 offset-md-7 col-xs-12 col-bg pad-sm">
            <h3>Contact Us</h3>
            <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
        </div>
    </div>
    <div class="row footer-bg justify-content-center">
        <div class="col-md-10 col-sm-12 col-xs-12 pad-v-sm">
            <div class="row">
                <div class="col">
                    <h3><?php echo get_field('footer_header', 'options') ?: get_bloginfo(); ?>
                    </h3>
                    <p><i class="fas fa-phone squared" aria-hidden="true"></i><a href="tel:<?php echo $business_location['business_phone_url']; ?>">
                            <?php echo $business_location['business_phone_display']; ?></a></p>
                    <p><i class="fas fa-envelope squared" aria-hidden="true"></i><a href="mailto:<?php echo $business_location['business_email_address']; ?>" target="_top">Contact Us</a></p>
                    <p><i class="fas fa-home squared" aria-hidden="true"></i><a href="<?php echo $business_location['business_url']; ?>" target="_blank">
                            <?php echo $business_location['business_street_address']; ?><?php echo $business_location['business_city_state_zip']; ?></a></p>
                    <p><i class="far fa-calendar-alt squared" aria-hidden="true"></i><a href="/contact/" target="_blank">Book an Appointment</a></p>
                </div>
                <div class="col">
                    <h4 class="line-right"><span>Follow Us</span></h4>
                    <?php get_template_part('components/social', 'icons'); ?>

                    <h4 class="line-right mt-3 pad-v-xs"><span>Newsletter</span></h4>
                    <?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
                </div>
                <div class="col blog-roll">
                    <h4 class="line-right"><span>Latest News</span></h4>
                    <?php $the_query = new WP_Query('posts_per_page=3');

                    while ($the_query->have_posts()) : $the_query->the_post();
                        ?><div class="row">
                            <div class="col mb-3"><a href="<?php the_permalink() ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'alignleft')); ?></a>
                                <a href="<?php the_permalink() ?>" class="blog-header"><?php the_title(); ?></a>
                                <div class="excerpt">
                                    <?php echo incredible_custom_excerpts(7); ?></div>
                            </div>
                        </div><?php endwhile;
                        wp_reset_postdata();
                        ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row footer-bg">
        <div class="col text-center">
            <div class="copyright">
                <p>&copy;
                    <?php echo date('Y');
                    ?><?php echo $copyright ?: get_bloginfo(); ?>| Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
            </div>
        </div>
    </div>
</footer>