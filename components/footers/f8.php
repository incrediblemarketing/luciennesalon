<?php $business_location = get_field('business_locations', 'options')[0]; ?>

<footer id="footer" class="f8 clearfix container-fluid  <?php if (is_page('contact-us')) : echo 'page__contact';
                                                        endif; ?> " data-bg="<?php echo get_field('footer_background', 'options'); ?>">
    <div class="row justify-content-center">
        <?php if (!is_page('contact-us')) : ?>
            <div class="col-xl-2 col-md-10 col-12 svg-holder">
                <?php get_template_part('components/svg/logo'); ?>
            </div>
            <div class="col-xl-2 col-md-5 col-sm-7 block__info">
                <h4>Visit Us</h4>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $business_location['business_street_address']; ?>, <?php echo $business_location['business_city_state_zip']; ?><br />
                    <a href="<?php echo $business_location['business_url']; ?>" class="directions" target="_blank">Get Directions / View map <i class="fal fa-long-arrow-right"></i></a></p>
                <p><i class="fas fa-phone"></i> <a href="tel:<?php echo $business_location['business_phone_url']; ?>"><?php echo $business_location['business_phone_display']; ?></a></p>
                <p><i class="fas fa-fax"></i> <?php echo $business_location['business_fax']; ?></p>
                <p><i class="fas fa-envelope"></i> <?php echo $business_location['business_email_address']; ?></p>
                <?php get_template_part('components/social', 'icons'); ?>
            </div>
            <div class="col-xl-2 col-md-5 col-sm-5 block__links">
                <h4>Quick Links</h4>
                <?php
                wp_nav_menu(array(
                    'menu'   => 'Footer Menu'
                ));
                ?>
            </div>
            <div class="col-xl-4 col-md-10 col-12">
                <h4>Contact Us</h4>
                <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
            </div>
        <?php endif; ?>
        <div class="copyright col-12">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $copyright ?: get_bloginfo(); ?> | Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part('components/svg/incredible-marketing'); ?>Incredible Marketing</a></p>
        </div>
    </div>
</footer><!-- end #footer -->