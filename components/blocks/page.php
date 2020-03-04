<?php
$content       = get_sub_field( 'column_1_content' );
$rc            = get_sub_field( 'row_class' );
$c1c           = get_sub_field( 'column_1_class' );
$bc            = get_sub_field( 'background_color' );
$fc            = get_sub_field( 'font_color' );
$fs            = get_sub_field( 'font_size' );
$ta            = get_sub_field( 'text_align' );
$pad           = get_sub_field( 'padding' );
$showSidebar   = get_sub_field( 'show_sidebar' );
$featuredImage = get_sub_field( 'featured_image_side' );
$fory          = get_sub_field( 'youtube_or_featured_image' );

if ( $showSidebar == 1 ) {
	$sideC          = get_sub_field( 'sidebar_content' );
	$sideCSS        = get_sub_field( 'sidebar_css' );
	$show_gallery   = get_sub_field( 'show_gallery' );
	$show_top_level = get_sub_field( 'show_top_level_menu' );
	$sidebar_side   = get_sub_field( 'sidebar_side' );
	if ( $show_gallery == 1 ) {
		$gallery_link = get_sub_field( 'gallery_link' );
	}
}

/*
 GET DEFAULTS IF NOTHING WAS SELECTED
				================================================*/
if ( ! $rc ) {
	$rc = get_field( 'row_class', 'options' );
}
if ( ! $c1c ) {
	$c1c = get_field( 'column_1_class', 'options' );
}
if ( ! $bc ) {
	$bc = get_field( 'background_color', 'options' );
}
if ( ! $bg ) {
	$bg = get_field( 'background_page_image', 'option' );
}
if ( ! $fc ) {
	$fc = get_field( 'font_color', 'options' );
}
if ( ! $fs ) {
	$fs = get_field( 'font_size', 'options' );
}
if ( ! $ta ) {
	$ta = get_field( 'text_align', 'options' );
}
if ( ! $pad ) {
	$pad = get_field( 'padding', 'options' );
}

if ( $showSidebar == 1 ) {
	if ( $sidebar_side == true ) {
		echo '<div class="row block__page justify-content-center flex-row-reverse ' . $rc . ' sh-row" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '" data-bg="' . $bg . '">';
	} else {
		echo '<div class="row block__page justify-content-center ' . $rc . ' sh-row" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '" data-bg="' . $bg . '">';
	}
} else {
	echo '<div class="row justify-content-center ' . $rc . ' sh-row" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '" data-bg="' . $bg . '">';
}
if ( $showSidebar == 1 ) {
	echo '<div class="col-lg-8 col-12 content ' . $c1c . ' ' . $ta . ' sh-col">';
} else {
	echo '<div class="col-lg-10 col-12 content ' . $c1c . ' ' . $ta . ' sh-col">';
}
echo '<div class="pad-v-md">';
echo '<h1>' . get_the_title() . '</h1>';
if ( has_post_thumbnail() && ! $fory ) {
	if ( $featuredImage == true ) {
		echo '<div class="img alignleft">';
	} else {
		echo '<div class="img alignright shadow">';
	}
	the_post_thumbnail( 'postslider_thumb', array( 'class' => 'img-responsive' ) );
	echo '</div>';
}
if ( $fory ) {
	$youtubeID = get_sub_field( 'youtube_id' );

	echo '<div class="col-xl-6 col-lg-12 col-md-6 col-12 alignright">';
	echo '<div class="embed-responsive embed-responsive-16by9">';
	echo '<iframe id="featured-video" class="embed-responsive-item" src="//www.youtube.com/embed/' . $youtubeID . '?enablejsapi=1&rel=0" allowfullscreen></iframe>';
	echo '</div>';
	echo '</div>';
}
echo $content;
echo '<div class="clearfix"></div>';
echo '</div>';

echo '</div>'; /*end content*/

if ( $showSidebar == 1 ) {
	if ( $sidebar_side == true ) {
		echo '<div id="sidebar" class="sidebar-left col-lg-3 col-12 ' . $sideCSS . ' sh-col">';
	} else {
		echo '<div id="sidebar" class="sidebar-right col-lg-3 col-12 ' . $sideCSS . ' sh-col">';
	}
	echo '<div class="pad-v-md">';

	dynamic_sidebar( 'page_sidebar' );

	/*Sidebar Page Menu*/
	$showpages = get_sub_field( 'show_page_menu' );
	if ( $showpages == 1 ) {
		$parent = get_sub_field( 'select_parent_page' );
		if ( $parent ) {
			echo '<h5>' . get_the_title( $parent ) . ' Menu</h5>';
			echo '<ul class="sidebar-menu">';
			wp_list_pages(
				array(
					'post_type' => 'page',
					'title_li'  => '',
					'child_of'  => $parent,
					'depth'     => 1,
					'exclude'   => 1054,
				)
			);
			echo '</ul>';
		}
	}


	$showprocedures = get_sub_field( 'show_procedures_menu' );
	$post_ID        = get_the_ID();
	if ( $showprocedures == 1 ) {
		$posttype = get_post_type( $post_ID );
		echo '<div class="sidebar-item">';
		echo '<h5>' . $posttype . 's</h5>';
		echo '<ul class="sidebar-menu">';
		if ( ( wp_get_post_parent_id( $post_ID ) == 0 ) ) {
			wp_list_pages(
				array(
					'post_type' => $posttype,
					'title_li'  => '',
					'depth'     => 1,
					'exclude'   => array(
						'1054',
					),
				)
			);
		} else {
			wp_list_pages(
				array(
					'post_type' => $posttype,
					'title_li'  => '',
					'child_of'  => wp_get_post_parent_id( $post_ID ),
					'depth'     => 1,
					'exclude'   => array(
						'1054',
					),
				)
			);
		}
		echo '</ul>';
		echo '</div>';
	}

	$showtoplevel = get_sub_field( 'show_top_level_menu' );
	$post_ID      = get_the_ID();
	if ( $showtoplevel == 1 ) {
		echo '<div class="sidebar-item">';
		echo '<h5>Pages</h5>';
		echo '<ul class="sidebar-menu">';
		wp_list_pages(
			array(
				'title_li' => '',
				'child_of' => 0,
				'depth'    => 1,
				'exclude'  => '407,1054',
			),
		);
		echo '</ul>';
		echo '</div>';
	}

	$showtestimonials = get_sub_field( 'show_testimonials_rotator' );
	if ( $showtestimonials == 1 ) :
		$testimonials = get_sub_field( 'sidebar_testimonials' );
		echo '<div class="testimonial-container">';
		echo '<h5 class="text-center">Testimonials</h5>';
		if ( $testimonials ) : ?>
			<div class="owl-carousel owl-theme testimonials-rotator">
				<?php foreach ( $testimonials as $post ) : ?>
					<?php setup_postdata( $post ); ?>
					<div class="item">
						<?php the_content(); ?>
						<strong><?php the_title(); ?></strong>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
								wp_reset_postdata();
							endif;
							echo '</div>';
						endif;

						$gallery = get_field( 'turn_onoff_gallery', 'options' );
	if ( $gallery == 1 && $show_gallery == 1 ) {
		echo '<div class="sidebar-gallery">';
		echo '<h5>Gallery</h5>';
		$images = get_field( 'gallery_images', $gallery_link );

		if ( $images ) {
			?>
			<ul class="owl-carousel owl-theme mini-gallery">
				<?php foreach ( $images as $image ) : ?>
					<li class="item"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" /></li>
				<?php endforeach; ?>
			</ul>
		<?php } ?>
		<a href="<?php the_permalink( $gallery_link ); ?>" class="btn btn-primary">View Patient Gallery</a>
		<?php
		echo '</div>';
	}

	if ( $sideC ) {
		echo '<div class="sidebar-content">';
		echo $sideC;
		echo '</div>';
	}

	echo '</div>';
	echo '</div>';
}
echo '</div>';
