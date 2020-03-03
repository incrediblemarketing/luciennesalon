<header class="site-nav site-nav-static">
	<div class="d-flex">

		<a class="logo align-self-center" href="<?php echo esc_url(home_url('/')); ?>">
			<?php get_template_part('components/svg/logo'); ?>
		</a>

		<nav role="navigation" class="d-flex justify-content-center flex-1 mx-auto">
			<?php $args = array(
				'theme_location'  => 'header-menu',
				'container'       => false,
				'menu_class'      => 'menu d-flex justify-content-between'
			);
			wp_nav_menu($args); ?>
		</nav>

		<div class="d-flex align-items-center">
			<?php get_template_part('components/call'); ?>
			<?php get_template_part('components/social-icons'); ?>
		</div>

	</div>
</header>
