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
			$img_data_989 = get_bloginfo('template_url')."/timthumb.php?src=http://www.veracruz.gob.mx/wp-content/uploads/2013/11/banner-informe.jpg&w=349";
			$img_data_800 = get_bloginfo('template_url')."/timthumb.php?src=http://www.veracruz.gob.mx/wp-content/uploads/2013/11/banner-informe.jpg&w=675";
			$img_data_550 = get_bloginfo('template_url')."/timthumb.php?src=http://www.veracruz.gob.mx/wp-content/uploads/2013/11/banner-informe.jpg&w=500"; 
		?>
    	<span class='img img-responsive overlay-responsive' style="margin-top:36px;">
            <a href="http://tercerinforme.veracruz.gob.mx/" target="_blank">
                <span data-picture data-alt="Tercer informe de Gobierno" class="img img-responsive img-change">
                    <span data-src="<?php echo $img_data_989; ?>"></span>
                    <span data-src="<?php echo $img_data_550; ?>" data-media="(min-width: 550px)"></span>
                    <span data-src="<?php echo $img_data_800; ?>" data-media="(min-width: 800px)"></span>
                    <span data-src="<?php echo $img_data_989; ?>" data-media="(min-width: 989px)"></span> 	
                </span>
            </a>
        </span> 
        <?php
            if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>
                    <div class="widget-list">
                        <?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
                    </div>
        <?php endif; ?>
    </center>
</aside>