<?php
/* Template para la categoria Blog */
?>
<?php get_header(); ?>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>
<script type='text/javascript'>
//<![CDATA[
// Botón para Ir Arriba
jQuery.noConflict();
jQuery(document).ready(function() {
	jQuery("#IrArriba").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 1000) {
			jQuery('#IrArriba').fadeIn();
			} else {
			jQuery('#IrArriba').fadeOut();
			}
		});
	jQuery('#IrArriba a').click(function () {
		jQuery('body,html').animate({
		scrollTop: 0
		}, 800);
		return false;
		});
	});

});
//]]> 
</script>
<div id="container">
<div id="content-list" class="container blog-contenedor content-blog">
	<div class="tituloSingleArea">
		<h2>
			<?php
				printf( __( '%s', 'veracruz2013' ),  single_cat_title( '', false )  );
			?>
		</h2>
	</div>
	<div class="back-img"></div>
	<?php
		if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>
	
			<div class="searchHeaderArea col-md-12 col-lg-12">
				<?php //print obtenFechaEspaniol(); ?>
				<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
			</div>
	<?php endif; ?>
	
	<?php  $idCategoria = get_cat_ID(single_cat_title( '', false )); ?>
	
	<div id="popular" class="col-sm-12 col-md-12 col-lg-12 img-responsive">
          <span id="ribonLoMasLeido" class="responsive">
          <span style="display:none;"><?php $url=bloginfo('template_url')."/images/masleido.png"; ?></span>
          <img src="<?php $url; ?>" border="0">
          </span>
			<?php wpp_get_mostpopular("range=all&limit=1&post-type=post&cat=".$idCategoria."&thumbnail_width=1080&thumbnail_height=330"); ?>
        	<div class="time-blog">-<?php the_time( 'j M' ); ?>-</div>
                    <!-- botones redes sociales -->
        	<div class="listadoShareItem">
                            <!-- AddThis Button BEGIN -->
                            <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-center">
                                <a class="addthis_button_facebook iconFacebook"></a>
                                <a class="addthis_button_twitter iconTwitter"></a>
                                <a class="addthis_button_linkedin iconLinkedIn"></a>
                                <a class="addthis_button_pinterest_share iconPinterestBlog"></a>
                                <a class="addthis_button_google_plusone_share iconPlusBlog"></a>
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
                                <!-- AddThis Button END -->
    	  </div>            <!-- Fin botones redes sociales -->
	</div><!-- end #popular -->
		<?php	
			if (have_posts()) :
			//$step = 1; //Variable para llevar el conteo y separar listados grandes de los pequeños
			//$cierraPrimerDiv = false;
			while(have_posts()){ the_post();

					?>
		<div class="claseDecente divNotaListado col-md-4 col-lg-4" style="margin-bottom:3%;">
						<div class="contenedorNota">
						<?php //Obtenemos la url de la imagen destacada
			    		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
			    		$thumbnailsrc = "";
			    		if (!empty($domsxe)) {
				    		$thumbnailsrc = $domsxe->attributes()->src;
				    		//$thumbnailsrc = substr($thumbnailsrc, strrpos($thumbnailsrc, "/wp-"), strlen($thumbnailsrc));
				    	} else {
					    	$urlTema = get_bloginfo('template_url');
					    	$thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
					    }
					   
						if (!empty($thumbnailsrc)):
						?>
			<span class='img img-responsive'>
                <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $urlTb; ?><?php print $thumbnailsrc; ?>&w=380&h=200' border=0 />
                <div class="post-date"><?php the_time( 'j M' ); ?></div>
			</span>
					 <?php
						 endif;
						 ?>
						 <div class="tituloShare">
                         <div class="link-noticia">
						<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
						</div>
						<!-- botones redes sociales -->
                    <div class="listadoShareItem">
                    <!-- AddThis Button BEGIN -->
                       <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                        <span><a class="addthis_button_facebook iconFacebook"></a></span>
                        <span><a class="addthis_button_twitter iconTwitter"></a></span>
                        <span><a class="addthis_button_linkedin iconLinkedIn"></a></span>
                        <span><a class="addthis_button_pinterest_share iconPinterestBlog"></a></span>
                        <span><a class="addthis_button_google_plusone_share iconPlusBlog"></a></span>
                        </div>
                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
                        <!-- AddThis Button END -->
</div>

  				<!-- Fin botones redes sociales -->        				
						 </div><!-- end col-lg-6 -->
						</div><!-- end .contenedorNota -->
					</div><!-- Fin del div featured clearfix -->
					<?php
			
			} //Fin while principal
		
		?>
	</div>
 </div>
		<?php /* Display navigation to next/previous pages when applicable */ 
		if(function_exists('wp_pagenavi')) { 
			//wp_pagenavi( array('query' =>$notas)); 
		}
		
		endif; //Fin de if notas->have_posts
		?>
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation" style="display:none;">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>	
<div id='IrArriba'>
<a href='#Arriba'><span/></a>
</div>
<?php get_footer(); ?>