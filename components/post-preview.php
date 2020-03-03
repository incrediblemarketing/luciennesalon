<article id="post-<?php the_ID(); ?>" class="post post-preview">



		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="cell post-image">
				<?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
			</a>
		<?php endif; ?>
	

		<div class="cell post-text-block">

			<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf('Permanent Link to %s', the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
			
			<?php get_template_part('components/post-meta'); ?>
			<?php the_excerpt(); ?>

			<a class="button button-outline button-primary button-white-hover" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf('Permanent Link to %s', the_title_attribute('echo=0')); ?>">
				<span class="button-label">Read more</span>
				<span class="button-icon fal fa-long-arrow-right"></span>
			</a>


			<?php if (current_user_can('editor')) : ?>
				<footer>
					<div class="post-edit"><?php edit_post_link('Edit'); ?></div> 
				</footer>
			<?php endif; ?>


		</div>
		
</article>
