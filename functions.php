<?php

add_action( 'after_setup_theme', 'rundown_theme_setup' );

function rundown_theme_setup() {

	global $content_width;

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
		$content_width = 590;

	// Add post formats for WP 3.0 and above
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

	// Add post thumbnail option in post editor
	add_theme_support( 'post-thumbnails' ); 

	// Add automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Add custom background
	add_theme_support( 'custom-background' );
	$defaults = array(
		'default-color' => 'e7e7e7',
		'default-image' => RUNDOWN_THEME_DIR . '/images/bg.png', 
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );

	// Add custom header
	add_theme_support( 'custom-header' );
	$defaultheader = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 980, // Maximum header image width
		'flex-height'            => true,
		'flex-width'             => true,
		'default-text-color'     => '',
		'header-text'            => false,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaultheader );


	// Add custom menu
	add_theme_support( 'menus' );

	// Register Widget
		if(function_exists('register_sidebar')){
			register_sidebar(array(
							'name'          => 'Widget',
							'description'   => 'Your widgets go here',
							'before_widget' => '<div id="%1$s" class="widget">',
							'after_widget'  => '</div>',
							'before_title'  => '<h2>',
							'after_title'   => '</h2>' )
							);
		}
		
	// Add editor style
	add_editor_style( 'styles/editor-style.css' );	

} // after_setup_theme

// Define constants
define('RUNDOWN_THEME_DIR', get_template_directory_uri() );
define('RUNDOWN_LIBS', get_template_directory() . '/libs/');
define('RUNDOWN_FUNCTIONS', get_template_directory() . '/libs/functions/');

// Include template structure
include (RUNDOWN_LIBS . 'template.php');

// Include custom function
include (RUNDOWN_FUNCTIONS . 'custom-function.php');

// Include scripts
include (RUNDOWN_FUNCTIONS . 'enqueue-script.php');

// Include Comment list
include (RUNDOWN_FUNCTIONS .'comment-list.php');


?>