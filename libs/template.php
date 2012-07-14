<?php 

// Build styles
add_action('wp_head', 'rundown_head', 1);
function rundown_head() { ?>

	<link rel="stylesheet" href="<?php get_template_directory_uri() ; ?>/styles/reset.css" type="text/css" media="screen" />	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	
	<!--[if IE]>
		<link href="<?php get_template_directory_uri() ; ?>/styles/ie.css" rel="stylesheet" type="text/css" />
	<![endif]-->		

<?php }

// Build header content
add_action('rundown_header', 'rundown_header_content');
function rundown_header_content() { ?>

<div id="header">

			<div id="header-inner">
				<h1><a color="<?php echo get_custom_header()->color; ?>" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<p class="description" color="<?php echo get_custom_header()->color; ?>"><?php bloginfo('description');  ?></p>
			</div>
			
			<?php if ( '' != get_header_image() ) : ?>			
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" />			
			<?php else: ?>
				<?php echo ''; ?>
			<?php endif; ?>	
			
			<div id="primarynav">
				<?php rundown_main_menu(); ?>
				<div class="clear"></div>
			</div>
			
</div><!--/#header-->

<?php }

?>