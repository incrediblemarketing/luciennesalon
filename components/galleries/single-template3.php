<?php
	global $post;
	$gID = get_the_id();
	$theTitle = get_the_title($gID);
?>
<?php get_header(); ?>
<div id="gallery-archive" class="row d-flex justify-content-center gallery g3">
	<div class="col-lg-10 col-12">
		<div class="pad-v-md">
			<div class="inner-container">
				<h4 class="fancy"><span><?php echo $theTitle; ?> Photos</span></h4>
					<?php 
						$x=1;
						$patients = get_pages( array( 'sort_column' => 'menu_order', 'post_status' => 'publish', 'post_type' => 'gallery', 'parent' => $gID) );
						if(!empty($patients)) { ?>
							<div class="swiper-container gallery-carousel">
								<div class="swiper-wrapper">
									<?php
							foreach($patients as $patient): 
								setup_postdata($patient);
								$images = get_field('gallery_images', $patient->ID);
								$description = get_field('gallery_description', $patient->ID); ?>
								<div class="swiper-slide">
									<div id="im-gallery<?php echo $x; ?>">
										<?php foreach( $images as $image ): ?>
											<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['gallery_thumb']; ?>" data-image="<?php echo $image['sizes']['large']; ?>" data-description="<?php echo $image['description']; ?>">
										<?php endforeach; ?>
									</div>
									<div class="desc">
										<div class="breadcrumb">
											<a href="/gallery/">Gallery</a> / <?php echo $theTitle; ?>
										</div>
										<h2><?php echo get_the_title($patient->ID); ?></h2>
										<hr />
										<?php echo $description; ?>
										<?php 
										$pl = get_field('links_to_procedures', $patient->ID); 
										if( $pl ): ?>
										<hr />
											<h5>Procedure Links:</h5>
											<ul class="procedure-links">
												<?php foreach( $pl as $post): ?>
													<?php setup_postdata($post); ?>
													<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												<?php endforeach; ?>
											</ul>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>
									</div>
								</div>
							<?php $x++;endforeach; ?>
								</div>
								<div class="swiper-button-next">Next Patient</div>
    							<div class="swiper-button-prev">Previous Patient</div>
							</div>
						<?php } else { ?> 
							<?php
								$images = get_field('gallery_images', $gID);
								$description = get_field('gallery_description', $gID);
							?>
							<div class="swiper-slide">
								<div id="im-gallery<?php echo $x; ?>">
									<?php foreach( $images as $image ): ?>
										<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['sizes']['gallery_thumb']; ?>" data-image="<?php echo $image['sizes']['large']; ?>" data-description="<?php echo $image['description']; ?>">
									<?php endforeach; ?>
								</div>
								<div class="desc">
									<div class="breadcrumb">
										<a href="/gallery/">Gallery</a> / <?php echo $theTitle; ?>
									</div>
									<h2><?php echo get_the_title($gID); ?></h2>
									<hr />
									<?php echo $description; ?>
									<?php 
									$pl = get_field('links_to_procedures', $gID); 
									if( $pl ): ?>
									<hr />
										<h5>Procedure Links:</h5>
										<ul class="procedure-links">
											<?php foreach( $pl as $post): ?>
												<?php setup_postdata($post); ?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
											<?php endforeach; ?>
										</ul>
										<?php wp_reset_postdata(); ?>
									<?php endif; ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>