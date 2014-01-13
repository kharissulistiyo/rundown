<?php

require_once('color-picker.php');


/* Create Settings Menu */

add_action( 'admin_menu', 'fillpress_admin_menu' );
function fillpress_admin_menu() {
    add_theme_page( 'Rundown Options', 'Rundown Options', 'manage_options', 'rundown-settings', 'fillpress_options_page' );
}


/* Create Sections and Fields */

add_action( 'admin_init', 'fillpress_admin_init' );
function fillpress_admin_init() {

	/* Register setting */
    register_setting( 'fillpress-group-1', 'rundown_magazine' );
    register_setting( 'fillpress-group-1', 'rundown_excerpt' );
    register_setting( 'fillpress-group-1', 'style_setting' );
	
	
	/* Create setting section */ 
    add_settings_section( 'fillpress-section-one', __('Layout', 'rundown'), 'section_one_callback', 'fillpress-section-1' );
    add_settings_section( 'fillpress-section-two', __('Presentation', 'rundown'), 'section_two_callback', 'fillpress-section-1' );
	
	/* Create fields */
    add_settings_field( 'field-rundown-one', __('Magazine style', 'rundown'), 'rundown_magazine_setting', 'fillpress-section-1', 'fillpress-section-one' );
    add_settings_field( 'field-rundown-two', __('Limit excerpt', 'rundown'), 'rundown_excerpt_setting', 'fillpress-section-1', 'fillpress-section-one' );
    add_settings_field( 'field-rundown-three', __('Style', 'rundown'), 'rundown_style_setting', 'fillpress-section-1', 'fillpress-section-two' );
	

}


/* 
* Callback 
* Contains front end fileds and descriptions
*/
	function section_one_callback() {
		// echo 'Help text of group 1.';
	}
	
	function section_two_callback() {
		// echo 'Help text of group 1.';
	}


	
	
	
	function rundown_magazine_setting(){
	
		$setting = esc_attr( get_option( 'rundown_magazine' ) ); ?>
		<input type="checkbox" name="rundown_magazine" value="1" <?php checked('1', get_option('rundown_magazine')); ?> /> <?php echo __('Enable magazine style.', 'rundown'); ?>
	
	<?php }
	
	function rundown_excerpt_setting(){
	
		$setting = esc_attr( get_option( 'rundown_excerpt' ) );
		echo "<input size='40' class='small-text' type='text' name='rundown_excerpt' value='$setting' />";
		echo __(' Number of words limit.', 'rundown');
	
	}
	
	function rundown_style_setting(){
	
		$radio_items = array(
			'default' => 'Default',
			'classic' => 'Classic',
		);
	
		foreach($radio_items as $key => $value):
		
			$selected = (get_option('style_setting') == $key) ? 'checked="checked"' : '';
			echo "\n\t<label><input type='radio' name='style_setting' value='" . esc_attr($key) . "' $selected/> $value</label><br />";
			
		endforeach;
	
	}
	
	
	
/* Settings callback */
function fillpress_options_page() {
    ?>
    <div class="wrap">
        <h2><?php _e('Rundown Options', 'rundown'); ?></h2>
		
		<?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true'  ) {   ?>
		
			<div id="message" class="updated">
				<p><strong><?php _e('Settings saved.', 'rundown') ?></strong></p>
			</div>
		
		<?php } ?>
		
        <form action="options.php" method="POST">
            <?php settings_fields( 'fillpress-group-1' ); ?>
            <?php do_settings_sections( 'fillpress-section-1' ); ?>
            <?php submit_button(); ?>
        </form>
		
		<div class="plugin-message">
			<p><em><?php _e('Thank you for using Rundown theme. If you need WordPress developer to customize this theme to meet your need or develop your WP-based sites, <a href="http://kharissulistiyono.com/#contact" title="Hire this WordPress theme developer">contact me</a>. Yes, I do freelance works.', 'rundown') ?></em></p>
		</div>		
		
    </div>
    <?php
}	



?>