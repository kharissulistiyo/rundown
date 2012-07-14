<?php

function rundown_comments($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>

						<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
						
							<div id="comment-<?php comment_ID(); ?>" class="comment-content">
							
								<div class="user_info">
									<?php echo get_avatar($comment,$size='70'); ?> <h3><?php comment_author_link()?></h3>			
									<p><span><?php printf(__('%1$s at %2$s', 'rundown'), get_comment_date('F j, Y'), get_comment_time('g:i a')) ?></span></p>
								</div>
								
								<?php echo get_comment_text(); ?>		
							
								<?php if ($comment->comment_approved == '0') : ?>
									<em><?php _e('Your comment is awaiting moderation', 'rundown'); ?></em>
								<?php endif; ?>							
			
								<br/>
								<?php comment_reply_link( array_merge( $args, array('reply_text' => __('Reply', 'rundown'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>	
							</div>	
						</li>	

<?php }
?>