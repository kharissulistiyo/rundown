<?php 
/**
 * The Template for displaying single posts
 *
 * @since Rundown 1.5.3
 */
 
 get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
			<?php while (have_posts()) : the_post(); ?>

			
				<?php get_template_part('content', 'single'); ?>
				
					<div class="navigation">
							<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'rundown' ) ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'rundown' ) ); ?></span>
					</div>

			<?php endwhile; ?>			
			

				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>