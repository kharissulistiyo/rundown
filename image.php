<?php 
/**
 * The template for displaying image attachments
 *
 * @since Rundown 1.6.4
 */
 
 get_header(); ?>
		
		<div id="main">
			
			<div id="content">
			
			<?php while (have_posts()) : the_post(); ?>


				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="post-head">
					
						<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rundown' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
						
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
							<?php if (comments_open()) { comments_popup_link( '  &bull;  <span class="leave-reply">' . __( '0 comment', 'comments number', 'rundown' ) . '</span>', _x( '1 comment', 'comments number', 'rundown' ), _x( '% comments', 'comments number', 'rundown' ) );  } ?>
							
						</div>
					</div>
					
					<div class="entry">
					
						<?php
							/**
							 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
							 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
							 */
							$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
							foreach ( $attachments as $k => $attachment ) {
								if ( $attachment->ID == $post->ID )
									break;
							}
							$k++;
							// If there is more than 1 attachment in a gallery
							if ( count( $attachments ) > 1 ) {
								if ( isset( $attachments[ $k ] ) )
									// get the URL of the next image attachment
									$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
								else
									// or get the URL of the first image attachment
									$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
							} else {
								// or, if there's only 1 image, get the URL of the image
								$next_attachment_url = wp_get_attachment_url();
							}
						?>
						
						<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
						$attachment_size = apply_filters( 'rundown_attachment_size', 848 );
						echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
						?></a>	
													
						<div class="meta2">
							
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( ' Full size (pixel): <a href="%1$s" title="Link to full-size image">%2$s &times; %3$s</a>, Posted in <a href="%4$s" title="Return to %5$s" rel="gallery">%6$s</a>', 'rundown' ),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);
							?>		
							<?php edit_post_link( __( 'Edit', 'rundown' ), '<span class="edit-link">', '</span>' ); ?>	
							
						</div>																
													
						
					</div><!--/.entry-->
					
					<?php comments_template( '', true ); ?>
					
				</div><!--/#post-<?php the_ID(); ?>-->	
				
				<div class="navigation">
						<span class="nav-previous">
						<?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'rundown' ) ); ?></span>
						<span class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'rundown' ) ); ?></span>
				</div>

			<?php endwhile; ?>			
				
			</div><!--/#content-->
			
<?php get_sidebar(); ?>
			
<?php get_footer(); ?>