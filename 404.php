<?php 

/**
 * The template for displaying 404 pages (Not Found).
 *
 * @since Rundown 1.5.2
 */

get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
				<div id="post-0" class="post error404 not-found">

					<div class="post-head">				
						<h2 class="post-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'rundown' ); ?></h2>
					</div>
					
					
					<div class="entry">

						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'rundown' ); ?></p>
						
						<div style="overflow:hidden;">
							<?php get_search_form(); ?>
						</div>

						<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) ); ?>
						
						<div class="widget">
							<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'rundown' ); ?></h2>
							<ul>
							<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
							</ul>
						</div>			

						<?php
						/* translators: %1$s: smilie */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'rundown' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
						?>

						<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>						
												
						
					</div><!--/.entry-->
					
				</div><!--/#post-0-->	
				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>