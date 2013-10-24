<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage rtvhome
 * @since rtvhome 1.0
 */
?>
</section>
    <footer role="contentinfo" class="col-lg-12">
        <span class='img img-responsive'>
            <img src="<?php bloginfo('template_url') ?>/images/img-barra-palacio.png" border="0" class="img-responsive" />
        </span>
        <div id="footer-content" class="container">
            <div id="footerSearchAndSocial" class="row">
                <div id="redesSocialesFooter" class="col-md-6 col-lg-6">
					<?php
                    if (has_nav_menu('redes-sociales-menu')):
                        wp_nav_menu(array('menu'=>'Redes Sociales menu',
                        'container'=>'div',
                        'container-class'=>'redes-sociales-menu',
                        'theme-location'=>'redes-sociales-menu'));
                    endif;
                    ?>
                </div>
                <?php if ( is_active_sidebar( 'search-footer-widget-area' ) ) : ?>
                    <div class="widget-footer buscadorBottom col-md-6 col-lg-6" >
                    	<?php dynamic_sidebar( 'search-footer-widget-area' ); ?>
                    </div>
                <?php endif; ?>
            </div><!-- end .row -->
			<?php
            if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                <div class="widget-footer col-md-2 col-lg-2 col-sm-2 nav-footer-resp">
                	<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
                <div class="widget-footer col-md-2 col-lg-2 col-sm-2 nav-footer-resp">
                	<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
                <div class="widget-footer col-md-3 col-lg-3 col-sm-3 nav-footer-resp">
                	<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
                <div class="widget-footer col-md-3 col-lg-3 col-sm-3 nav-footer-resp">
                	<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'fifth-footer-widget-area' ) ) : ?>
                <div class="widget-footer col-md-2 col-lg-2 col-sm-2 nav-footer-resp">
                	<?php dynamic_sidebar( 'fifth-footer-widget-area' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'direccion-home-widget-area' ) ) : ?>
                <div class="widget-footer container direccionFooter col-md-12 col-lg-12">
                	<?php dynamic_sidebar( 'direccion-home-widget-area' ); ?>
                </div>
            <?php endif; ?>
        </div><!-- #footer-content -->
        <div class="border-dotted max-width-365 top-20"></div>
        	<?php esc_html(dynamic_sidebar( 'copyright-footer' )); ?>
        <div class="top-43"></div>
    </footer><!-- footer -->
</section><!-- #main -->
<?php
	wp_footer();
?>
</body>
</html>