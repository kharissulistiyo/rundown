<?php
/**
 * The template for displaying Comments
 *
 * @since Rundown 1.6.4
 */
 ?>
<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'rundown'));

	if ( post_password_required() ) { ?>
		<?php _e('This post is password protected. Enter the password to view comments.', 'rundown'); ?>
	<?php
		return;
	}
?>



<div id="comments">

<?php if ( have_comments() ) : ?>
	<h2 id="commenttitle">
		<?php
			printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'rundown' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
	</h2>

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
	 
		<?php if ( is_single() ) { ?>
		
			<span class="comments-off"><?php echo _e('Comments are disabled', 'rundown'); ?></span>
		
		<?php } else {} ?>

	<?php endif; ?>
	
<?php endif; ?>

<?php comment_form(); ?>

</div><!--/#comments-->
