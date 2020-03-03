<div id="gallery-archive" class="row d-flex justify-content-center gallery-archive a2">
	<div class="col-lg-10 col-12">
		<div class="pad-v-md">
			<div class="inner-container">
				<h4 class="fancy"><span>Gallery Photos</span></h4>
				<div class="swiper-container gallery-carousel-archive">
					<div class="swiper-wrapper">
				<?php
					global $post;
					$args = array( 'posts_per_page' => -1, 'post_type' => 'gallery', 'post_status' => 'publish', 'parent' => 0 );
					$myposts = get_pages( $args );
					foreach ( $myposts as $post ) : 
						setup_postdata( $post ); ?>
						<div class="swiper-slide">
							<div class="item">                                
								<?php $bg = get_the_post_thumbnail_url( $post->ID, 'postslider_thumb' );
								if($bg){
									echo '<img src="'.$bg.'" />';
								} ?>
								<h3><?php the_title(); ?></h3>

								<div class="child-pages">
									<?php
									$args = array(
										'post_type'      => 'gallery',
										'posts_per_page' => -1,
										'post_parent' => $post->ID,
										'order'          => 'ASC',
										'orderby'        => 'menu_order'

									 );
									$parent = new WP_Query( $args );
									if ( $parent->have_posts() ) : ?>
										<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endforeach;
						wp_reset_postdata(); ?>
					</div>
					<div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
    				<div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
				</div>
			</div>
		</div>
	</div>
</div>