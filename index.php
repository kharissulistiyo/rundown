<?php

/**
 * The main template file
 *
 * @since Rundown 1.5.2
 */

 get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php get_template_part('content', get_post_format() ); ?>
				
					<?php endwhile; ?>
						
						<div class="navigation">
							<span class="nav-previous"><?php previous_posts_link(__('&larr; Newer Entries', 'rundown', 0)) ?></span>
							<span class="nav-next"><?php next_posts_link(__('Older Entries &rarr;', 'rundown', 0)) ?></span>		
						</div>		

					<?php else : ?>
					
					<div class="not-found">

						<div class="entry">					

						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'rundown' ); ?></p>
						<?php get_search_form(); ?>	
						</div>
					
						<div class="clear"></div>
						
					</div><!--/.not-found-->						
					
				<?php endif; ?>
				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>