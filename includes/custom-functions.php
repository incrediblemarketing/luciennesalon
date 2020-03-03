<?php

function im_is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function im_archive_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
}

add_filter('get_the_archive_title', 'im_archive_title');

function get_top_level_id()
{
    $ancestors = get_ancestors(get_the_ID(), 'page');

    $top_level_id = end($ancestors);
    if (!$top_level_id) :
        $top_level_id = get_the_ID();
    endif;

    return $top_level_id;
}

function get_child_page_menu($top_level_id = null, $current_page_id = null)
{

    if (!$top_level_id) {
        $top_level_id = get_top_level_id();
    }
    if (!$current_page_id) {
        $current_page_id = get_the_ID();
    }

    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => $top_level_id,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
    );

    $parent = new WP_Query($args);

    $html = '';

    if ($parent->have_posts()) {

        $html .= '<ul>';

        while ($parent->have_posts()) {
            $parent->the_post();
            $html .= get_the_ID() == $current_page_id ? '<li class="current-menu-item">' : '<li>';
            $html .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
            $html .= get_child_page_menu(get_the_ID(), $current_page_id);
            $html .= '</li>';
        }

        $html .= '</ul>';
    }
    wp_reset_query();

    return $html;
}

function get_background_video($bg_object)
{
    ob_start();
    $bg_image = isset($bg_object['image']['sizes']['large']) ? $bg_object['image']['sizes']['large'] : '';
    $has_video_background = isset($bg_object['video_background']) ? $bg_object['video_background'] : '';
    $video_object = isset($bg_object['video']) ? $bg_object['video'] : null;
    ?>
    <?php if ($has_video_background) : ?>
        <?php if ($video_object['mp4'] || $video_object['ogv'] || $video_object['webm']) : ?>
            <div class="bg-video">
                <video <?php echo $bg_image ? 'poster="' . $bg_image['sizes']['large'] . '"' : ''; ?> playsinline autoplay muted loop>
                    <?php foreach ($video_object as $file_type => $file) : ?>
                        <?php if (!empty($file)) : ?>
                            <source src="<?php echo $file['url']; ?>" type="video/<?php echo $file_type; ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </video>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php
        return ob_get_clean();
    }

    function get_block_class($block, $defaults, $element = 'block')
    {

        $result_class = array();
        $default_class = array();
        $this_class = explode(' ', $block['class']);
        $default_method = isset($defaults['method']) ? $defaults['method'] : 0;
        $default_source = isset($defaults['im_dynamic_element_default_source']) ? $defaults['im_dynamic_element_default_source'] : 0;

        if ('global' == $default_source) {
            $default_class = explode(' ', get_field('global_block_defaults', 'options')[$element]['class']);
        } else {
            if (have_rows('custom_block_defaults', 'options')) {
                while (have_rows('custom_block_defaults', 'options')) {
                    the_row();
                    if ($default_source == get_sub_field('id')) {
                        $default_class = explode(' ', get_sub_field($element)['class']);
                    }
                }
            }
        }

        // merge or replace default_class with this_class depending on method
        switch ($default_method) {
            case 'use':
                $result_class = $default_class;
                break;
            case 'merge':
                $result_class = array_unique(array_merge($default_class, $this_class));
                break;
            default:
                $result_class = $this_class;
        }

        return implode(' ', $result_class);
    }

    function get_block_content_class($block, $defaults)
    {
        return get_block_class($block, $defaults, 'block_content');
    }

    function get_block_video($block, $defaults, $element = 'block')
    {
        $default_method = isset($defaults['method']) ? $defaults['method'] : 0;
        $default_source = isset($defaults['im_dynamic_element_default_source']) ? $defaults['im_dynamic_element_default_source'] : 0;
        $this_bg_object = isset($block['background']) ? $block['background'] : null;
        $default_bg_object = array();
        $result_bg_object = array();

        if ('global' == $default_source) {
            $default_bg_object = get_field('global_block_defaults', 'options')[$element]['background'];
        } else {
            if (have_rows('custom_block_defaults', 'options')) {
                while (have_rows('custom_block_defaults', 'options')) {
                    the_row();
                    if ($default_source == get_sub_field('id')) {
                        $default_bg_object = get_sub_field($element)['background'];
                    }
                }
            }
        }

        switch ($default_method) {
            case 'use':
                $result_bg_object = $default_bg_object;
                break;
            default:
                $result_bg_object = $this_bg_object;
        }

        return get_background_video($result_bg_object);
    }

    function get_block_content_video($block, $defaults)
    {
        return get_block_video($block, $defaults, 'block_content');
    }

    function get_block_bg_color($block, $defaults, $element = 'block')
    {
        $default_method = isset($defaults['method']) ? $defaults['method'] : 0;
        $default_source = isset($defaults['im_dynamic_element_default_source']) ? $defaults['im_dynamic_element_default_source'] : 0;
        $this_bg_color = isset($block['background']['color']) ? $block['background']['color'] : null;
        $default_bg_color = '';
        $result_bg_color = '';

        if ('global' == $default_source) {
            $default_bg_color = get_field('global_block_defaults', 'options')[$element]['background']['color'];
        } else {
            if (have_rows('custom_block_defaults', 'options')) {
                while (have_rows('custom_block_defaults', 'options')) {
                    the_row();
                    if ($default_source == get_sub_field('id')) {
                        $default_bg_color = get_sub_field($element)['background']['color'];
                    }
                }
            }
        }

        switch ($default_method) {
            case 'use':
                $result_bg_color = $default_bg_color;
                break;
            default:
                $result_bg_color = $this_bg_color;
        }

        return $result_bg_color;
    }

    function get_block_content_bg_color($block, $defaults)
    {
        return get_block_bg_color($block, $defaults, 'block_content');
    }

    function get_block_bg_image($block, $defaults, $element = 'block')
    {
        $default_method = isset($defaults['method']) ? $defaults['method'] : 0;
        $default_source = isset($defaults['im_dynamic_element_default_source']) ? $defaults['im_dynamic_element_default_source'] : 0;
        $this_bg_image = isset($block['background']['image']) ? $block['background']['image'] : null;
        $default_bg_image = '';
        $result_bg_image = '';

        if ('global' == $default_source) {
            $default_bg_image = get_field('global_block_defaults', 'options')[$element]['background']['image'];
        } else {
            if (have_rows('custom_block_defaults', 'options')) {
                while (have_rows('custom_block_defaults', 'options')) {
                    the_row();
                    if ($default_source == get_sub_field('id')) {
                        $default_bg_image = get_sub_field($element)['background']['image'];
                    }
                }
            }
        }

        switch ($default_method) {
            case 'use':
                $result_bg_image = $default_bg_image;
                break;
            default:
                $result_bg_image = $this_bg_image;
        }

        return $result_bg_image;
    }

    function get_block_content_bg_image($block, $defaults)
    {
        return get_block_bg_image($block, $defaults, 'block_content');
    }


    function enqueue_slider_assets()
    {
        wp_enqueue_style('swiper');
        wp_enqueue_script('swiper');
    }
    function move_page_admin_menu_item()
    {
        global $menu;

        foreach ($menu as $key => $value) {
            if ('edit.php?post_type=page' == $value[2]) {
                $oldkey = $key;
            }
        }

        $newkey = 4; // use whatever index gets you the position you want
        // if this key is in use you will write over a menu item!
        $menu[$newkey] = $menu[$oldkey];
        $menu[$oldkey] = array();
    }
    add_action('admin_menu', 'move_page_admin_menu_item');

    function show_staff()
    {
        global $post;

        $args = array(
            'post_status' => 'publish',
            'post_type' => 'team_member',
            'posts_per_page' => -1

        );

        $staff = new WP_query($args);

        if ($staff->have_posts()) :
            $output = '';
            while ($staff->have_posts()) : $staff->the_post();
                $output .= '
						<div class="team-member">
							' . get_the_post_thumbnail($post_id, 'full', array('class' => 'alignleft')) . '
							<h3>' . get_the_title() . '</h3>
							<h5>' . get_field('position') . '</h5>
							<p>' . get_the_content() . '</p>
						</div>
					';
            endwhile;
        endif;
        wp_reset_postdata();
        return $output;
    }
    add_shortcode('our-staff', 'show_staff');

    function show_testimonials()
    {
        global $post;

        $args = array(
            'post_status' => 'publish',
            'post_type' => 'testimonial',
            'orderby'   => 'rand',
            'posts_per_page' => 15

        );

        $testimonials = new WP_query($args);

        if ($testimonials->have_posts()) :
            $output = '';
            while ($testimonials->have_posts()) : $testimonials->the_post();
                $output .= '
						<div class="testimonial text-center">
							<p>' . get_the_content() . '</p>
							<h4>' . get_the_title() . '</h4>
						</div>
					';
            endwhile;
        endif;
        wp_reset_postdata();
        return $output;
    }
    add_shortcode('our-testimonials', 'show_testimonials');

    function incredible_custom_excerpts($limit)
    {
        return wp_trim_words(get_the_excerpt(), $limit, '...');
    }

    function my_custom_fonts()
    {
        echo '<style>
      .acf-field-5a2060c1a5184 > .acf-label{display:none;}
      .acf-field-5a2060c1a5184 > .acf-input{width:100% !important;}
      .acf-field-5a2060c1a5184 > .acf-field:before{width:100% !important;}
    </style>';
    }


    // set zipcode to certain field
    add_action('acf/input/admin_footer', 'my_acf_get_address_zipcode');

    function my_acf_get_address_zipcode()
    {
        ?>
                    <script type="text/javascript">
                        (function($) {
                            acf.add_action('google_map_change', function(latlng, $map, $field) {
                                acf.fields.google_map.geocoder.geocode({
                                    'latLng': latlng
                                }, function(results, status) {
                                    var address = results[0].address_components;

                                    var streetnumber = address[0].long_name; //street number
                                    var streetname = address[1].long_name; //street name
                                    var city = address[2].long_name; //city
                                    var county = address[3].long_name; //county
                                    var state = address[4].long_name; //state
                                    var country = address[5].long_name; //country
                                    var zip = address[6].long_name; //zip
                                    var extZip = address[7].long_name; //Extended Zip -xxxx

                                    $("#acf-field_5a2060c1a5184-0-field_5a205d62d9e1c").val(streetnumber + ' ' + streetname);
                                    $("#acf-field_5a2060c1a5184-0-field_5a205d55d9e1b").val(state);
                                    $("#acf-field_5a2060c1a5184-0-field_5a205d45d9e1a").val(county);
                                    $("#acf-field_5a2060c1a5184-0-field_5a205d6cd9e1d").val(zip + '-' + extZip);

                                });

                            });

                        })(jQuery);
                    </script>
                <?php
                }
