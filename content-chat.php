<?php
/**
 * The template for displaying posts in the Chat Post Format on index and archive pages
 *
 * @since Rundown 1.5.3
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-head">
	
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rundown' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
		
		<div class="meta"> 
		
			<?php the_time(get_option('date_format')); ?> <?php echo "|"; ?> <?php _e('by', 'rundown'); ?> <?php the_author(); ?> <?php echo "|"; ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
			
			<span class="post-format <?php echo get_post_format(); ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rundown' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/chat.png" alt="<?php echo get_post_format(); ?>" /></a></span> 									
			
		</div>
	</div>
	
	<div class="entry">
	
		<?php echo get_the_post_thumbnail($id, 'thumbnail', array('class' => 'alignleft'));  /* Get post thumbnail as in WordPress Codex: http://codex.wordpress.org/Function_Reference/get_the_post_thumbnail */	?>
		
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rundown' ) ); ?>
		
		<div class="clear"></div>
		<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rundown'), 'after' => '</div>'));?>
		
		<div class="meta2">
			<?php printf( __(' Category: %1$s', 'rundown'), get_the_category_list( ', ' )); ?> <?php the_tags('| Tags: ', ', ', ''); ?>
			<?php edit_post_link( __( 'Edit', 'rundown' ), '<span class="edit-link">', '</span>' ); ?>
		</div>			
		
	</div><!--/.entry-->
	
</div><!--/#post-<?php the_ID(); ?>-->	