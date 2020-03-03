<?php $business_location = get_field('business_locations')[0]; ?>
<footer id="footer" class="f6 clearfix container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10 col-md-11">
            <div class="row animated fadeIn delay1 duration2 eds-on-scroll ">
                <div class="col-12 col-xl-4 col-md-5 col-sm-6">
                    <h4>How<br />May We<br />Help You?</h4>
                    <p><?php echo $business_location['business_street_address']; ?><?php echo $business_location['business_city_state_zip']; ?></p>
                    <a href="<?php echo $business_location['business_url']; ?>" class="directions" target="_blank">Get Directions</a>
                </div>
                <div class="col-xl-8 col-md-7 col-sm-6 col-12">
                    <?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true]'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (get_field('map_image', 'options')) { ?>
                        <div id="map" <?php echo ' data-bg="' . get_field('map_image', 'options') . '"'; ?>></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- end #footer -->
<div id="footer-bottom" class="f6-bottom container-fluid">
    <div class="row">
        <div class="col copyright">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
        </div>
    </div> <!-- end row -->
</div>