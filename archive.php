<?php get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
				<?php if (have_posts()) : ?>

					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

					<?php /* If this is a category archive */ if (is_category()) { ?>
						<h2 class="archive-title"><?php _e('Archive for the', 'rundown'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category', 'rundown'); ?></h2>

					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<h2 class="archive-title"><?php _e('Posts Tagged', 'rundown'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>

					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<h2 class="archive-title"><?php _e('Archive for', 'rundown'); ?> <?php the_time('F jS, Y'); ?></h2>

					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h2 class="archive-title"><?php _e('Archive for', 'rundown'); ?> <?php the_time('F, Y'); ?></h2>

					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<h2 class="archive-title"><?php _e('Archive for', 'rundown'); ?> <?php the_time('Y'); ?></h2>

					<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<h2 class="archive-title"><?php _e('Author Archive', 'rundown'); ?></h2>

					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<h2 class="archive-title"><?php _e('Blog Archives', 'rundown'); ?></h2>
					
					<?php } ?>

					<?php while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<div class="post-head">
							<div class="meta"> 
							
								<?php rundown_post_format_label(); ?>  <?php the_time(get_option('date_format')); ?> <?php echo "|"; ?> <?php _e('by', 'rundown'); ?> <?php the_author(); ?> <?php echo "|"; ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
								
							</div>
							<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						</div>
						
						<div class="entry">
							
							<?php 
							
							if ( has_post_format( 'gallery' ) || has_post_format( 'link' ) || has_post_format( 'video' ) || has_post_format('audio') || has_post_format('status') || has_post_format('quote') || has_post_format('chat') || has_post_format('image') || has_post_format('aside') ) {
								the_content();
							}
			
							else{	?>

								<div class="excerpt">
										
									<p><?php rundown_excerpt(150); ?></p>
								
								</div>	
							
							<?php } ?>
							
							<div class="clear"></div>
							
							<div class="meta2"><?php printf( __(' Category: %1$s', 'rundown'), get_the_category_list( ', ' )); ?></div>				
							
						</div><!--/.entry-->
						
						<a class="morelink" href="<?php the_permalink() ?>"><?php _e('read more &rarr;', 'rundown'); ?></a>
						
					</div><!--/.post-->	
				
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