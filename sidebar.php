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
            if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>
                    <div class="widget-list">
                        <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
                    </div>
        <?php endif; ?>
        <div class="link-style">
        	<a href="#">ATENCIÓN CIUDADANA</a>
        </div>
        <div class="link-style ">
        	<a href="#">MULTIMEDIA</a>
        </div>
    </center>
</aside>