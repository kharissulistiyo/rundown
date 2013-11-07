<?php

/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since Rundown 1.5.2
 */

get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
				<?php if (have_posts()) : ?>
				
					<h2 class="archive-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'rundown' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'rundown' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'rundown' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'rundown' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'rundown' ) ) . '</span>' ); ?>
						<?php elseif ( is_category() ) : ?>
							<?php printf( __( 'Category Archives: %s', 'rundown' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
						<?php elseif ( is_tag() ) : ?>
							<?php printf( __( 'Tag Archives: %s', 'rundown' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'rundown' ); ?>
						<?php endif; ?>			
					</h2>

					<?php while (have_posts()) : the_post(); ?>

						<?php get_template_part('content', get_post_format() ); ?>
				
					<?php endwhile; ?>

						<div class="navigation">
							<span class="nav-previous"><?php previous_posts_link('&larr; Newer Entries', 0) ?></span>
							<span class="nav-next"><?php next_posts_link('Older Entries &rarr;', 0) ?></span>		
						</div>	

					<?php else : ?>

					<h2><?php _e('Error 404 - Not Found', 'rundown'); ?></h2>
					<p><?php _e('It seems what you are looking for can not be found.', 'rundown'); ?></p>	

				<?php endif; ?>	
				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>