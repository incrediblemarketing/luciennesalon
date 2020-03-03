<article id="post-<?php the_ID(); ?>" class="post post-article">


	<?php if (has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-image">
			<?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
		</a>
	<?php endif; ?>


	<h1 class="post-title"><?php the_title(); ?></h1>
	

	<div class="post-text-block">
		<?php get_template_part('components/post-meta'); ?>
		<?php the_content(); ?>
	</div>


	<?php if (current_user_can('editor')) : ?>
		<footer>
			<div class="post-edit"><?php edit_post_link('Edit'); ?></div> 
		</footer>
	<?php endif; ?>
		

</article>
