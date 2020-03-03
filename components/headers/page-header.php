<?php

	$background_image = get_field('page_header_background_image') ?: get_field('header_image', 'options');

	if (is_home()) {
		$page_for_posts = get_option( 'page_for_posts' );
		$background_image = get_field('page_header_background_image', $page_for_posts) ?: get_field('header_image', 'options');
	}

?>

<header
	class="page-header bg-light"
	<?php echo $background_image ? 'data-bg-image="' . $background_image . '"' : ''; ?>
	>
	<h1>
		<?php if (is_front_page()) : ?>
			Front page title
		<?php elseif ( is_home() ) : ?>
			Blog
		<?php elseif ( is_category() ) : ?>
			Category<br><small><?php single_cat_title(); ?></small>
		<?php elseif ( is_archive() ) : ?>
			Archive<br><small><?php the_archive_title(); ?></small>
		<?php elseif ( is_search() ) : ?>
			Search<br><small>
				<?php
					$allsearch = new WP_Query("s=$s&showposts=-1");
					$key = esc_html($s, 1);
					$count = $allsearch->post_count;
					echo $count . ' ';
					_e('results for ', 'responsive');
					_e('<span class="post-search-terms">', 'responsive');
					echo '&ldquo;';
					echo $key;
					echo '&rdquo;';
					_e('</span><!-- end of .post-search-terms -->', 'responsive');
					wp_reset_query();
				?>
			</small>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
	</h1>
</header>
