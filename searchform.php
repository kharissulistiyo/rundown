<?php
/**
 * Searchform for our theme.
 *
 *
 * @since Rundown 1.6.5
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" value="" name="s" id="s" placeholder="<?php echo __('Search', 'awesome'); ?>" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>