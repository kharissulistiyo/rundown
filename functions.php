<?php

/**
 * The template for displaying main functions
 *
 * @since Rundown 1.6.3
 * @update 1.7 
 */

add_action( 'after_setup_theme', 'rundown_theme_setup' );

if ( ! function_exists( 'rundown_theme_setup' ) ) :
function rundown_theme_setup() {

	/* Make Rundown available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'rundown', get_template_directory() . '/languages' );

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) ) $content_width = 595;
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'rundown' ) );		

	// Add post formats for WP 3.0 and above
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

	// Add post thumbnail option in post editor
	add_theme_support( 'post-thumbnails' ); 

	// Add automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Add custom background
	add_theme_support( 'custom-background' );
	
	if(get_option('style_setting') == 'classic'){
		
		
		$defaults = array(
			'default-color' => 'e7e7e7',
			'default-image' => get_template_directory_uri() . '/images/bg.png', 
			'wp-head-callback' => '_custom_background_cb',
			'admin-head-callback' => '',
			'admin-preview-callback' => ''
		);
		
	} else {	
		
	

		$defaults = array(
			'default-color' => 'e7e7e7',
			'wp-head-callback' => '_custom_background_cb',
			'admin-head-callback' => '',
			'admin-preview-callback' => ''
		);
	
	
	}	
	
	add_theme_support( 'custom-background', $defaults );

	// Add custom header
	add_theme_support( 'custom-header' );
	$defaultheader = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 980, // Maximum header image width
		'height'				  => 300, // Maximum header image height	
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
	register_sidebar(array(
		'name'          => 'Widget',
		'description'   => 'Your widgets go here',
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>' )
	);
		
	// Add editor style
	add_editor_style( 'styles/editor-style.css' );	
	
	// Include admin setting
	
	require_once('admin/fillpress.php');
	
	
	global $pagenow;

	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		wp_redirect(admin_url("themes.php?page=rundown-settings"));
	}	
	

} // after_setup_theme


endif;


// IE style

if ( ! function_exists( 'rundown_ie_style' ) ) :

function rundown_ie_style(){ ?>
<!--[if IE]>
	<link href="<?php echo get_template_directory_uri() ; ?>/styles/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->	
<?php }

endif;

add_action('wp_head', 'rundown_ie_style');


// Enqueue script

if ( ! function_exists( 'rundown_scripts_method' ) ) :

function rundown_scripts_method() {

	wp_enqueue_script(
		'rundown-script',
		get_template_directory_uri() . '/script/rundown-script.js',
		array('jquery')
	);
	
	if(get_option('style_setting') == 'classic'){
	
		wp_enqueue_style('skin-classic', get_stylesheet_directory_uri() . '/styles/skin-classic.css', array(), null ); 
	
	}
	
}

endif;

add_action('wp_enqueue_scripts', 'rundown_scripts_method');

// Enqueue comment reply script

if ( ! function_exists( 'rundown_enqueue_comment_reply_script' ) ) :

function rundown_enqueue_comment_reply_script() {
	if ( comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

endif;

add_action( 'comment_form_before', 'rundown_enqueue_comment_reply_script' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
 
if ( ! function_exists( 'rundown_page_menu_args' ) ) : 
 
function rundown_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

endif;

add_filter( 'wp_page_menu_args', 'rundown_page_menu_args' );

// Build searchform

if ( ! function_exists( 'rundown_search_form' ) ) :

function rundown_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}

endif;

add_filter( 'get_search_form', 'rundown_search_form' );

// Display post format icon in single.php

if ( ! function_exists( 'rundown_post_format_label' ) ) :

function rundown_post_format_label() {

	if ( has_post_format( 'video' )) {
	  echo '<span class="post-format video"><img src="'. get_template_directory_uri() .'/images/video.png" alt="video" /></span>';
	}
	if ( has_post_format('audio')) {
		echo '<span class="post-format audio"><img src="'. get_template_directory_uri() .'/images/audio.png" alt="audio" /></span>';
	}
	if ( has_post_format('status')) {
		echo '<span class="post-format status"><img src="'. get_template_directory_uri() .'/images/status.png" alt="status" /></span>';
	}
	if ( has_post_format('quote')) {
		echo '<span class="post-format quote"><img src="'. get_template_directory_uri() .'/images/quote.png" alt="quote" /></span>';
	}
	if ( has_post_format('link')) {
		echo '<span class="post-format link">"><img src="'. get_template_directory_uri() .'/images/link.png" alt="link" /></span>';
	}
	if ( has_post_format('gallery')) {
		echo '<span class="post-format gallery"><img src="'. get_template_directory_uri() .'/images/gallery.png" alt="gallery" /></span>';
	}
	if ( has_post_format('chat')) {
		echo '<span class="post-format chat"><img src="'. get_template_directory_uri() .'/images/chat.png" alt="chat" /></span>';
	}
	if ( has_post_format('image')) {
		echo '<span class="post-format image"><img src="'. get_template_directory_uri() .'/images/image.png" alt="image" /></span>';
	}
	if ( has_post_format('aside')) {
		echo '<span class="post-format aside"><img src="'. get_template_directory_uri() .'/images/aside.png" alt="aside" /></span>';
	}
	else{
		echo '';
	}

}


endif;

// Build comment list


if ( ! function_exists( 'rundown_comments' ) ) :

function rundown_comments($comment, $args, $depth) { 

	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	
		<div id="comment-<?php comment_ID(); ?>" class="comment-content">
		
			<div class="user_info">
				<?php echo get_avatar($comment,$size='70'); ?> <h3><?php comment_author_link()?></h3>			
				<p><span><?php printf(__('%1$s at %2$s', 'rundown'), get_comment_date('F j, Y'), get_comment_time('g:i a')) ?></span></p>
			</div>
			
			<div class="comment-text">
		
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation', 'rundown'); ?></em>
				<?php endif; ?>				
			
				<?php echo get_comment_text(); ?>		
				
				<div class="reply-link">
					<?php comment_reply_link( array_merge( $args, array('reply_text' => __('Reply', 'rundown'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>					
				
			</div>						
		</div>	
	</li>	

<?php }

endif;



// Custom excerpt

if ( ! function_exists( 'rundown_excerpt' ) ) :

function rundown_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt);
  } else {
	$excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

endif;