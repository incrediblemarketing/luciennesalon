<?php $hsi = get_field( 'header_social_icons', 'option' ); ?>
<header id="header" class="header1">
	<div class="header-top d-flex align-items-center justify-content-between">
		<div class="header-left">
			<?php if ( $hsi == 1 ) : ?>
				<?php get_template_part( 'components/social', 'icons' ); ?>
			<?php endif; ?>
		</div>
		<a class="logo align-self-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php get_template_part( 'components/svg/logo' ); ?>
		</a>
		<div class="header-right">
			<?php get_template_part( 'components/call' ); ?>
		</div>
	</div>
	<nav role="navigation" class="d-flex justify-content-center">
			<?php ubermenu( 'main', array( 'theme_location' => 'header-menu' ) ); ?>
	</nav>
</header>
