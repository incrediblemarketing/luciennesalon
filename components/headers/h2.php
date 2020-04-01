<header id="header" class="header2">
	<div class="d-flex align-items-center w-100">
		<div class="d-flex w-100 justify-content-between align-items-center">
			<a class="logo align-self-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php get_template_part( 'components/svg/logo' ); ?>
			</a>
			<nav role="navigation" class="align-items-center">
				<?php ubermenu( 'main', array( 'menu' => 2 ) ); ?>
			</nav>
			<?php if ( $hsi == 1 ) { ?>
				<?php get_template_part( 'components/social', 'icons' ); ?>
			<?php } ?>
			<?php get_template_part( 'components/call' ); ?>
		</div>
	</div>
</header>
