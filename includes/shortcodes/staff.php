<?php

function shortcode_staff( $atts ) {
	global $post;

	$args = array(
		'post_type'      => 'team_members',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	);

	$staff   = new WP_Query( $args );
	$content = '';
	if ( $staff->have_posts() ) :
		while ( $staff->have_posts() ) :
			$staff->the_post();
			$content .= '<div class="block__team-member">';
			$content .= get_the_post_thumbnail( $post->ID, 'gallery_thumb' );
			$content .= '<h3>' . get_the_title() . '</h3>';
			$content .= get_the_content();
			$content .= '</div>';
		endwhile;
		wp_reset_postdata();
	endif;

	return $content;
}
add_shortcode( 'staff', 'shortcode_staff' );
