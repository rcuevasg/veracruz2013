<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage rtvhome
 * @since rtvhome 1.0
 */
?>

<aside id="sidebar" class="col-md-4 col-lg-4" >
<center>
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	
	if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>

			<div class="widget-list">
				<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
			</div>
<?php endif; ?>
</center>
</aside>