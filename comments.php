<?php
/**
 * The template for displaying Comments
 *
 * @package WordPress
 * @subpackage Rundown
 * @since Rundown 1.0
 */
 ?>
<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!'));

	if ( post_password_required() ) { ?>
		<?php _e('This post is password protected. Enter the password to view comments.', 'rundown'); ?>
	<?php
		return;
	}
?>



<div id="comments">

<?php if ( have_comments() ) : ?>
	
	<h2 class="commenttitle"><?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'rundown' )); ?></h2>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments('callback=rundown_comments'); ?>
	</ol>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p class="closed-comment"><?php _e('Comments are closed.', 'rundown'); ?></p>

	<?php endif; ?>
	
<?php endif; ?>

<?php comment_form(); ?>

</div><!--/#comments-->
