<section class="post-meta">
	<small>
		<span><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
		<span><i class="fa fa-user"></i> <?php echo get_the_author(); ?></span>
		<span><i class="fa fa-folder-open"></i>
			<?php
				$categories = get_the_category();
				$output = array();
				foreach ($categories as $category) { 
					$category_link = get_category_link($category->ID);
					$output[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
				}
				echo implode(', ', $output);
			?>
		</span>
	</small>
</section>
