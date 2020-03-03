<?php

	$newerLink = get_previous_posts_link('Newer <i class="far fa-angle-right"></i>');
	$olderLink = get_next_posts_link('<i class="far fa-angle-left"></i> Older');

?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<?php if ( $olderLink || $newerLink ) : ?>

		<nav class="d-flex align-items-center navigation navigation-loop">

			<?php echo $olderLink; ?>
			<?php echo $newerLink; ?>

		</nav>

	<?php endif; ?>

<?php endif; ?>
