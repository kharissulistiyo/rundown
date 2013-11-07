<?php

/**
 * The template for displaying all pages
 *
 * @since Rundown 1.5.3
 */

 get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('content', 'page'); ?>		
			
				<?php endwhile; ?>
				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>