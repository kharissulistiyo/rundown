<?php

// Display Post Format Label
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

// Build main menu

function rundown_main_menu() {

	//Build menu for WordPress 3.0 and above
	if(function_exists('wp_nav_menu') && has_nav_menu('main_menu')):
	
		/*
		 Display the Nav menu with:
		  - the slug main_menu
		  - no container element
		  - a menu class of sf-menu
		  - a depth of 2 (main level and first child)
		  - the custom walker defined below, framework_menu_walker
		*/
		
		wp_nav_menu( 
			array( 
				'theme_location' => 'main_menu', 
				'container' => '', 
				'menu_class' => 'sf-menu', 
				'depth' => 4 // 4 menus depth
				)
		);
		
	
		
	
	//Build menu for WP version<3.0
	else:
		echo '<ul class="sf-menu">';
			wp_list_pages('depth=1&title_li=');
		echo '</ul>';
	
	endif;		

}

// Register menu location
if(function_exists('register_nav_menu')):	
	register_nav_menu( 'main_menu', __( 'Main Menu', 'rundown' ));
endif;

// Build searchform
function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );

// Build custom excerpt lenght
function rundown_excerpt($len=20, $trim="&hellip;"){
	$limit = $len+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	$num_words = count($excerpt);
	if($num_words >= $len){
		$last_item=array_pop($excerpt);
	}
	else{
	$trim="";
	}
	$excerpt = implode(" ",$excerpt)."$trim";
	echo $excerpt;

}

// Custom excerpt more
function new_excerpt_more($more) {
       global $post;
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>