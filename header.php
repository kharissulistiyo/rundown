<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @since Rundown 1.6.5
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'rundown' ), max( $paged, $page ) );

	?></title>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="wrapper">
	
	<div id="header">

		<div id="header-inner">
			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<p class="description"><?php bloginfo('description');  ?></p>
		</div>
		
		<?php if ( '' != get_header_image() ) : /* Rundown custom header image */ ?>			
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" />			
		<?php else: endif; ?>
		
		<?php if(has_nav_menu('primary')) { 
			wp_nav_menu( array( 'container_id' => 'primarynav', 'theme_location' => 'primary' ) ); 
			} else {
				echo __('You do not set up custom menu yet. Go to Appearance > Menus', 'rundown');
			}			
		?>
		
		<div class="clear"></div>	
				
	</div><!--/#header-->