<?php
	global $post;
	$children = get_pages( array( 'post_type' => 'gallery', 'child_of' => $post->ID, 'sort_order' => 'asc', 'sort_column' => 'menu_order' ) );
	
	if (count( $children ) > 0 ) : 
		if ( $children ) : ?>
		<div class="row d-flex justify-content-center gallery g2">
			<div class="col-sm-10 col-12">
				<div class="pad-v-md">
					<h1 class="text-center"><?php echo the_title(); ?></h1>
					<p class="small text-center">* Individual results will vary. Click to view all pictures from each patient.</p>
					<div class="swiper-container gallery-carousel">
						<div class="swiper-wrapper">
							<?php foreach ( $children as $pages ) : ?>
						  	<div class="swiper-slide">
								<div class="row justify-content-center gallery-content">
									 <div class="col-lg-6 col-12">
										<?php 
											$images = get_field('gallery_images', $pages->ID); 
											$description = get_field('gallery_description', $pages->ID); 
											$counter = 0;

											if( $images  ): 
												foreach( $images as $image ): ?>
													<?php if($counter % 2 === 0) :?>
														<div class="ba-link item">
															<div><img src="<?php echo $image['url']; ?>" /><h5>BEFORE</h5></div>
													<?php else : ?>
															<div><img src="<?php echo $image['url']; ?>" /><h5>AFTER</h5></div>
														</div>
													<?php endif; 
													$counter++;
												endforeach; 
											endif; 
										 ?>
									</div>
									<div class="col-lg-6 col-12">
										<a href="/gallery/" class="btn btn-secondary">Back to Main Gallery</a>
										<?php echo '<h3>'.get_the_title($pages->ID).'</h3>'; ?>
										<div class="gallery-description"><?php echo $description ?></div>
									</div>
								</div>
							</div>
							 <?php endforeach;?>
						</div>
						<div class="swiper-button-next"></div>
    					<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</div>
          <?php
      	endif;
	endif;
?>