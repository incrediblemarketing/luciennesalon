<?php $hsi = get_field('header_social_icons', 'option'); ?>

<header id="header" class="header3">

    <div class="header-top">

        <a class="logo align-self-center" href="<?php echo esc_url(home_url('/')); ?>">
            <?php get_template_part('components/svg/logo'); ?>
        </a>

        <div class="header-right">

            <div class="header-right-top">

                <?php if ($hsi == 1) { ?>
                    <?php get_template_part('components/social', 'icons'); ?>
                <?php } ?>
                <?php get_template_part('components/call'); ?>


                <div id="menu-toggle" class="taptap-menu-button-wrapper wp-toolbar-active">

                    <div class="taptap-main-menu-button-two">
                        <div class="taptap-main-menu-button-two-middle"></div>
                    </div>

                </div>



            </div>

            <div class="menu-container"><?php ubermenu('main', array('menu' => 2)); ?></div>


        </div>

    </div>

</header>