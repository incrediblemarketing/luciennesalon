<?php get_header();

$gallery = get_field('gallery_archive_layout', 'options');

if ($gallery == 'g1') :
    get_template_part('components/galleries/archive-template1');
elseif ($gallery == 'g2') :
    get_template_part('components/galleries/archive-template2');
elseif ($gallery == 'g3') :
    get_template_part('components/galleries/archive-template3');
endif;

get_footer();
