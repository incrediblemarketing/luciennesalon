<div id="gallery-archive" class="row d-flex justify-content-center gallery-archive a1">
	<div class="col-lg-10 col-12">
		<div class="pad-v-md">
			<h1 class="text-center">GALLERY</h1>
			<div class="gallery-flex">
			<?php
				$args = array(
					'post_type' => 'gallery',
					'orderby' => 'menu_order',
					'order'   => 'ASC',
					'posts_per_page' => -1
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) : ?>
					<?php while ( $query->have_posts() ) : $query->the_post(); 
						$children = get_pages( array( 'post_type' => 'gallery', 'child_of' => get_the_ID() ) );

						if (count( $children ) !== 0 ) :  ?>
							<div class="child-page text-center" data-bg="<?php echo get_the_post_thumbnail_url(); ?>">
								<a href="<?php echo get_the_permalink(); ?>">
									<h4><?php echo get_the_title(); ?></h4>
								</a>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php wp_reset_postdata(); 
				endif; ?>
			</div>
		</div>
	</div>
</div>