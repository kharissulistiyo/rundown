<?php 

if ( !is_admin() ) { 
	wp_enqueue_script('jquery');
	wp_enqueue_script('scrollup', RUNDOWN_THEME_DIR.'/libs/js/scrollup.js');	
	wp_enqueue_script( 'comment-reply' ); 
}	

?>