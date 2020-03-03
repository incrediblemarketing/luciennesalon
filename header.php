<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body <?php body_class($btnStyle); ?>>
    <?php
    $hl = get_field('header_layout', 'option');
    $hideHeader = get_field('hide_page_header');
    ?>

    <?php
    $header = 'components/headers/' . $hl;
    get_template_part($header); ?>

    <main role="main">
        <?php
        if (!is_front_page() && $hideHeader == 0) {
            $headerImage = get_field('header_image');
            if (!$headerImage) {
                $headerImage = get_field('default_header_image', 'options');
            } ?>
            <div id="page-header" class="row" data-bg="<?php echo $headerImage['sizes']['header_bg']; ?>"></div>
        <?php
    } ?>