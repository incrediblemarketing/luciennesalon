<?php
$posts_category = get_sub_field('posts_category');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$pad = get_sub_field('padding');
if ($posts_category) {
    echo '<section class="row graybg">';
    echo '<div class="col-lg-10 col-lg-offset-lg-1 col-md-12 col-sm-12 col-xs-12 related-posts">';
    if ($pad) {
        echo '<div class="' . $pad . '">';
    }
    echo '<h3>' . get_the_title() . ' Articles</h3>';
    echo '<ul class="owl-carousel owl-theme postsslider">';
    global $post;
    $args = array('posts_per_page' => -1, 'category' => $posts_category, 'post_status' => 'publish',);
    $myposts = get_posts($args);
    foreach ($myposts as $post) :
        setup_postdata($post);
        echo '<li class="item">';
        if (has_post_thumbnail()) { ?>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3 post-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('postslider_thumb'); ?></a></div>
            <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 post-excerpt">
            <?php } else { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 excerpt">
                <?php } ?>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php
                the_excerpt();
                echo '</div>';
                echo '</li>';
            endforeach;
            wp_reset_postdata();
            echo '</ul>';
            if ($pad) {
                echo '</div>';
            }
            echo '</div>';
            echo '</section>';
        }
