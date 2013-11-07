<?php
/**
 * The template for displaying content in the single.php template
 *
 * @since Rundown 1.6.2
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-head">
		<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>	
		<div class="meta">
			<?php
				printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'rundown' ),
					esc_url( get_permalink() ), 
					esc_attr( get_the_time() ), 
					esc_attr( get_the_date( 'c' ) ), 
					esc_html( get_the_date() ), 
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
					esc_attr( sprintf( __( 'View all posts by %s', 'rundown' ), get_the_author() ) ), 
					get_the_author() 
				);
			?>
			<?php if(comments_open()){ echo "&bull; "; } if (comments_open()) { comments_popup_link( '<span class="leave-reply">' . __( '0 comment', 'comments number', 'rundown' ) . '</span>', _x( '1 comment', 'comments number', 'rundown' ), _x( '% comments', 'comments number', 'rundown' ) );  } ?>
			<?php rundown_post_format_label(); ?>
		</div>					
	</div>
	
	
	<div class="entry">

		<?php the_content(); ?>

		<?php if ( has_post_format('gallery')) { ?>	
			<div class="clear"></div>
			<span class="previous-image-link"><?php previous_image_link(); ?></span>
			<span class="next-image-link"><?php next_image_link(); ?></span>
		<?php } ?>
		
		<div class="clear"></div>
		<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'rundown'), 'after' => '</div>'));?>
		
		<div class="meta2">
			<?php printf( __(' Category: %1$s', 'rundown'), get_the_category_list( ', ' )); ?> <?php the_tags('| Tags: ', ', ', ''); ?>
			<?php edit_post_link( __( 'Edit', 'rundown' ), '<span class="edit-link">', '</span>' ); ?>
		</div>	
								
		
	</div><!--/.entry-->
	
		<?php comments_template( '', true ); ?>
	
</div><!--/#post-<?php the_ID(); ?>-->	