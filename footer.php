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

	
	<footer role="contentinfo" class="span12">
		<div id="footer-content" class="row">
		
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
            
            <?php if ( is_active_sidebar( 'buscadorBottom-widget-area' ) ) : ?>
				<div class="widget-footer buscadorBottom">
					<?php dynamic_sidebar( 'buscadorBottom-widget-area' ); ?>
				</div>
			<?php endif; ?>
        
			<?php
			/* When we call the dynamic_sidebar() function, it'll spit out
			* the widgets for that widget area. If it instead returns false,
			* then the sidebar simply doesn't exist, so we'll hard-code in
			* some default sidebar stuff just in case.
			*/
			if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<div class="widget-footer span2">
					<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				<div class="widget-footer span2">
					<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
				<div class="widget-footer span2">
					<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
				<div class="widget-footer span2">
					<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'fifth-footer-widget-area' ) ) : ?>
				<div class="widget-footer span2">
					<?php dynamic_sidebar( 'fifth-footer-widget-area' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'direccion-home-widget-area' ) ) : ?>
				<div class="widget-footer direccionFooter">
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