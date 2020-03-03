<?php $business_location = get_field('business_locations')[0]; ?>
<footer id="footer" class="f5 clearfix">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-6 col-12 nopad">
                <?php if (get_field('map_image', 'options')) { ?>
                    <div id="map" <?php echo ' data-bg="' . get_field('map_image', 'options') . '"'; ?>></div>
                <?php } ?>
                <div class="slant-footer">
                    <svg viewbox="0 0 160 600" preserveAspectRatio>
                        <polygon points="50,600 160,600 160,0"></polygon>
                    </svg>
                </div>
            </div>
            <div class="info col-lg-6 col-12">
                <h3>Contact Us</h3>
                <div class="flex-info">
                    <p><i class="fas fa-map-marker-alt"></i> <a href="<?php echo $business_location['business_url']; ?>" target="_blank"><?php echo $business_location['business_street_address']; ?><?php echo $business_location['business_city_state_zip']; ?></a></p>
                    <p><i class="fas fa-phone"></i> <a href="tel:<?php echo $business_location['business_phone_url']; ?>"><?php echo $business_location['business_phone_display']; ?></a></p>
                </div>
                <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-12 text-center">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
            </div>
        </div>
    </div>
</footer>