<?php get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="post-head">
						<div class="meta">
							<?php rundown_post_format_label(); ?>  <?php the_time(get_option('date_format')); ?> <?php echo "|"; ?> <?php _e('by', 'rundown'); ?> <?php the_author(); ?> <?php echo "|"; ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
						</div>					
						<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					</div>
					
					
					<div class="entry">
		
						<?php the_content(); ?>
						
						<div class="clear"></div>
						<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rundown'), 'after' => '</div>'));?>
						
						<div class="clear"></div>
												
						
					</div><!--/.entry-->
					
						<?php if ( is_single() || is_page() ) {
							comments_template();
						}?>
					
				</div><!--/.post-->	
			
				<?php endwhile; ?>

					<div class="navigation">
							<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'rundown' ) ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'rundown' ) ); ?></span>
					</div>

				<?php else : ?>

					<h2><?php _e('Error 404 - Not Found', 'rundown'); ?></h2>
					<p><?php _e('It seems what you are looking for can not be found.', 'rundown'); ?></p>	

				<?php endif; ?>

			
				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>