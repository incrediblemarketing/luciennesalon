<?php
$business_location = get_field('business_locations')[0];
?>
<footer id="footer" class="f1 clearfix container-fluid">
    <?php if (get_field('map_image', 'options')) { ?>
        <div id="map" <?php echo ' data-bg="' . get_field('map_image', 'options') . '"'; ?>></div>
    <?php } ?>
    <div class="row justify-content-center">
        <div class="col-12 col-xl-8 col-md-10">
            <h2 class="text-center"><?php echo get_field('footer_header', 'options'); ?></h2>
            <div class="row contact text-center">
                <div class="col">
                    <h4>Address</h4>
                    <p><a href="<?php echo $business_location['business_url']; ?>" target="_blank"><?php echo $business_location['business_street_address']; ?><br /><?php echo $business_location['business_city_state_zip']; ?></a></p>
                </div>
                <div class="col">
                    <h4>Phone</h4>
                    <p><a href="tel:<?php echo $business_location['business_phone_url']; ?>"><?php echo $business_location['business_phone_display']; ?></a></p>
                </div>
                <?php if ($fsi == 1) : ?>
                    <div class="col">
                        <h4>Follow Us</h4>
                        <?php get_template_part('components/social', 'icons'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true]'); ?>
        </div>
    </div>
</footer><!-- end #footer -->
<div id="footer-bottom" class="container-fluid">
    <div class="row">
        <div class="col copyright">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
        </div>
    </div> <!-- end row -->
</div>