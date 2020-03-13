<?php $fsi = get_field( 'footer_social_icons', 'options' ); ?>
<?php $business_location = get_field( 'business_locations', 'options' )[0]; ?>
<?php $map = get_field( 'map_image', 'options' ); ?>

<?php get_template_part( 'components/blocks/instagram-block' ); ?>
</main><!-- end container-fluid -->

<footer id="footer" class="f7 clearfix container-fluid" data-bg="<?php echo get_field( 'background_image', 'options' ); ?>">
	<div class="row justify-content-center footer-wrapper">
		<div class="col-12 col-xl-8 col-md-10">
			<?php if ( ! is_page( 'contact' ) ) : ?>
				<div class="row footer">


					<div class="col-lg-6 footer-contact-form">
						<h4>Contact us</h4>
						<p>Get in touch, we'd love to hear from you</p>
						<?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true]' ); ?>
					</div>
					<!-- CUSTOM -->
					<div class="col-lg-6 footer-contact-info">


						<h4 class="footer-contact-info-headline">Connect with us on social media</h4>

						<div class="footer-contact-info-details">

							<?php if ( $fsi == 1 ) : ?>
								<?php get_template_part( 'components/social-icons' ); ?>
							<?php endif; ?>

						</div>


						<div class="footer-contact-info-address">

							<?php if ( get_field( 'business_locations', 'option' ) ) : ?>
								<?php while ( has_sub_field( 'business_locations', 'option' ) ) : ?>

								<!-- CELL -->
								<div class="cell">

									<h4 class="business-title"><?php echo get_sub_field( 'location_title' ); ?></h4>

									<a href="tel:<?php echo get_sub_field( 'business_phone_url' ); ?>" class="business-phone">
										<?php echo get_sub_field( 'business_phone_display' ); ?>
									</a>

									<a href="<?php echo get_sub_field( 'business_url' ); ?>" target="_blank" class="business-location">
										<?php echo get_sub_field( 'business_street_address' ); ?>
										<?php echo get_sub_field( 'business_city_state_zip' ); ?>
									</a>

								</div>
								<!-- // CELL -->

								<?php endwhile; ?>
							<?php endif; ?>

						</div>


					</div>
					<!-- // CUSTOM -->

				</div>
			<?php endif; ?>
			<div class="footer--nav">
				<?php ubermenu( 'main', array( 'menu' => 3 ) ); ?>
			</div>
			<div class="footer--bottom">
				<?php if ( $fsi == 1 ) : ?>
					<?php get_template_part( 'components/social-icons' ); ?>
				<?php endif; ?>
				<div class="logo__footer">
					<?php get_template_part( 'components/svg/logo' ); ?>
				</div>
				<?php get_template_part( 'components/call' ); ?>
			</div>
			<div class="copyright">
				<p>&copy; <?php echo date( 'Y' ); ?> <?php echo $copyright ?: get_bloginfo(); ?> All rights reserved. | <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms-of-use/">Terms of Use</a> </a>| Digital Marketing By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part( 'components/svg/incredible-marketing' ); ?>Incredible Marketing</a></p>
			</div>
		</div>
	</div>
</footer><!-- end #footer -->
