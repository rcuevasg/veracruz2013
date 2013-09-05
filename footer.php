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


	</section><!-- end #principalContent -->
	<footer role="contentinfo" class="col-lg-12">
		<span class='img img-responsive'><img src="<?php bloginfo('template_url') ?>/images/footer_separator.png" border="0" class="img-responsive" /></span>
		
		<div id="footer-content" class="container">
			
			<div id="footerSearchAndSocial" class="row">
			<div id="redesSocialesFooter" class="col-md-6 col-lg-6">
        	<?php
				//Checks if there is something on top-menu
				if (has_nav_menu('redes-sociales-menu')):
				//If so, adds it to the page
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
			/* When we call the dynamic_sidebar() function, it'll spit out
			* the widgets for that widget area. If it instead returns false,
			* then the sidebar simply doesn't exist, so we'll hard-code in
			* some default sidebar stuff just in case.
			*/
			if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<div class="widget-footer col-md-2 col-lg-2">
					<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				<div class="widget-footer col-md-2 col-lg-2">
					<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
				<div class="widget-footer col-md-3 col-lg-3">
					<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
				<div class="widget-footer col-md-3 col-lg-3">
					<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'fifth-footer-widget-area' ) ) : ?>
				<div class="widget-footer col-md-2 col-lg-2">
					<?php dynamic_sidebar( 'fifth-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'direccion-home-widget-area' ) ) : ?>
				<div class="widget-footer container direccionFooter col-md-12 col-lg-12">
					<?php dynamic_sidebar( 'direccion-home-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
		</div>
		
	</footer><!-- footer -->
	
	</section><!-- #main -->
	
	<!-- </div><!-- #page -->
	
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
	</body>
</html>