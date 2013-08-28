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

	<div id="enLinea">
	
	<?php if ( is_active_sidebar( 'tvmas-home-widget-area' ) ) : ?>
			<div class="onLine dashedVertical">
				<?php dynamic_sidebar( 'tvmas-home-widget-area' ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'radiomas-home-widget-area' ) ) : ?>
			<div class="onLine" >
				<?php dynamic_sidebar( 'radiomas-home-widget-area' ); ?>
			</div>
		<?php endif; ?>
	
	</div> <!-- Fin #enLinea -->
	
	<div id="lastWidgetHome">
	
	<?php if ( is_active_sidebar( 'sintonizanos-home-widget-area' ) ) : ?>
			<div class="onLine dashedVertical">
				<?php dynamic_sidebar( 'sintonizanos-home-widget-area' ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'boletinencuesta-home-widget-area' ) ) : ?>
			<div class="onLine encuestaNewsletter" >
				<div id="innerContainer">
				<?php dynamic_sidebar( 'boletinencuesta-home-widget-area' ); ?>
				</div><!-- Fin #innerContainer -->
			</div>
		<?php endif; ?>
	
	</div> <!-- Fin #lastWidgetHome -->

	
	<footer role="contentinfo" class="span12">
		<div id="footer-content" class="row">
		
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
			
			
			<?php
				//Checks if there is something on top-menu
				if (has_nav_menu('bottom-menu')):
				//If so, adds it to the page
				wp_nav_menu(array('menu'=>'Bottom menu',
								'container'=>'div',
								'container-class'=>'bottom-menu',
								'theme-location'=>'bottom-menu'));
				endif;
			?>
			
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