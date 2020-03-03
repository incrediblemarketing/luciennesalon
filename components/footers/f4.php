<?php $business_location = get_field('business_locations')[0]; ?>
<footer id="footer" class="f4 clearfix">
    <div class="container-fluid">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="row d-flex sh-row">
                    <div class="col-lg-4 col-12 sh-col">
                        <div class="map-container inner box-shadow">
                            <?php if (get_field('map_image', 'options')) { ?>
                                <div id="map" <?php echo ' data-bg="' . get_field('map_image', 'options') . '"'; ?>></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 sh-col">
                        <div class="inner-block">
                            <h3><?php echo get_field('footer_header', 'options') ?: get_bloginfo(); ?></h3>

                            <?php if (get_field('business_locations', 'option')) : ?>

                                <?php while (has_sub_field('business_locations', 'option')) : ?>
                                    <h4><?php echo get_sub_field('location_title'); ?></h4>
                                    <?php if (get_sub_field('business_street_address')) : ?>
                                        <p><a href="<?php echo get_sub_field('business_address_link'); ?>" target="_blank"><?php echo get_sub_field('business_street_address'); ?><br /><?php echo get_sub_field('business_city_state_zip'); ?></a></p>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('business_phone_url')) : ?>
                                        <p>Phone: <a href="tel:<?php echo get_sub_field('business_phone_url'); ?>"><?php echo get_sub_field('business_phone_display'); ?></a></p>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('business_fax')) : ?>
                                        <p>Fax: <?php echo get_sub_field('business_fax'); ?></p>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <?php get_template_part('components/social', 'icons'); ?>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 sh-col">
                        <div class="inner-block">
                            <h3>Contact Us</h3>
                            <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" id="subfooter">
            <div class="col-12 copyright text-center">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
            </div>
        </div>
    </div>
</footer>