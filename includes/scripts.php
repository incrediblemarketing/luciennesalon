<?php

function im_register_scripts()
{
    // Comment in/out the gsap plugins you wish to use.
    $gsap_plugins = array(
        // 'all.js',
        // 'AttrPlugin.js',
        // 'BezierPlugin.js',
        // 'ColorPropsPlugin.js',
        // 'CSSPlugin.js',
        // 'CSSRulePlugin.js',
        // 'DirectionalRotationPlugin.js',
        // 'Draggable.js',
        // 'EaselPlugin.js',
        // 'EasePack.js',
        // 'EndArrayPlugin.js',
        // 'ModifiersPlugin.js',
        // 'PixiPlugin.js',
        // 'RoundPropsPlugin.js',
        // 'ScrollToPlugin.js',
        // 'TextPlugin.js',
        // 'TimelineLite.js',
        // 'TimelineMax.js',
        // 'TweenLite.js',
        // 'TweenMax.js'
        // 'TweenMaxBase.js'
    );

    foreach ($gsap_plugins as $gsap_plugin) {
        wp_enqueue_script('gsap-' . str_replace('.js', '', $gsap_plugin), get_template_directory_uri() . '/assets/dist/plugins/gsap/' . $gsap_plugin, array('main'), false);
    }

    wp_register_script('swiper', get_template_directory_uri() . '/assets/dist/plugins/swiper/js/swiper.min.js', '', '', true);
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js');
    wp_register_script('swiper', get_template_directory_uri() . '/assets/dist/plugins/swiper/js/swiper.min.js', '', '', true);
    wp_register_script('tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js', '', '', true);
    wp_register_script('scrollmagic', get_template_directory_uri() . '/assets/dist/plugins/scrollmagic/ScrollMagic.min.js', '', '', true);
    wp_register_script('scrollanimation', get_template_directory_uri() . '/assets/dist/plugins/scrollmagic/plugins/animation.gsap.min.js', '', '', true);
    wp_register_script('scrollindicator', get_template_directory_uri() . '/assets/dist/plugins/scrollmagic/plugins/debug.addIndicators.min.js', '', '', true);
    wp_register_script('modernizr', get_template_directory_uri() . '/assets/dist/plugins/modernizr-3.0.0.min.js');
    wp_register_script('plugins', get_template_directory_uri() . '/assets/dist/js/plugins.min.js', array('jquery'), false);
    wp_register_script('main', get_template_directory_uri() . '/assets/dist/js/main.min.js', array('plugins'), false);
}
add_action('wp_enqueue_scripts', 'im_register_scripts');

function im_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('swiper');
    wp_enqueue_script('tweenmax');
    wp_enqueue_script('scrollmagic');
    wp_enqueue_script('scrollanimation');
    // wp_enqueue_script('scrollindicator');
    wp_enqueue_script('modernizr');
    wp_enqueue_script('plugins');
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'im_enqueue_scripts');
