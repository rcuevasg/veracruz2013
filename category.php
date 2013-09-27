<?php
/* Template para la categoria Blog */
?>

<?php get_header(); ?>


	<div id="content-list" class="container blog-contenedor">
	
	<div class="tituloSingleArea">
		<h2>
			<?php
				printf( __( '%s', 'veracruz2013' ),  single_cat_title( '', false )  );
			?>
		</h2>
	</div>
	<div class="back-img"></div>
	<?php
					
					/* When we call the dynamic_sidebar() function, it'll spit out
					* the widgets for that widget area. If it instead returns false,
					* then the sidebar simply doesn't exist, so we'll hard-code in
					* some default sidebar stuff just in case.
					*/
					if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>

						<div class="searchHeaderArea col-md-12 col-lg-12">
							<?php //print obtenFechaEspaniol(); ?>
							<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
						</div>
					<?php endif; 
						
				
					?>
	
		<?php  $idCategoria = get_cat_ID(single_cat_title( '', false )); ?>
	
		<div id="popular" class="col-sm-12 col-md-12 col-lg-12 img-responsive">
			<span id="ribonLoMasLeido" class="responsive"><img src="<?php bloginfo('template_url') ?>/images/masleido.png" border="0"></span>
			<?php wpp_get_mostpopular("range=all&limit=1&post-type=post&cat=".$idCategoria."&thumbnail_width=1080&thumbnail_height=230"); ?>
			
			<!-- botones redes sociales -->
			<?php include(TEMPLATEPATH . "/includes/shareItemList.php");  ?> 	
			<!-- Fin botones redes sociales -->
		</div><!-- end #popular -->
		<?php
			
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$notas = new WP_Query($query_string . '&posts_per_page=9');
			if ($notas->have_posts()) :
			//$step = 1; //Variable para llevar el conteo y separar listados grandes de los pequeños
			//$cierraPrimerDiv = false;
			while ($notas->have_posts()): $notas->the_post();

					?>
					<div class="divNotaListado col-md-4 col-lg-4">
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
							<div class="">
						 	<span class='img img-responsive'><img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=380&h=200' border=0 />
						 	<div class="post-date"><?php the_time( 'j M' ); ?></div>
						 	</span>
						 	</div>
						 <?php
						 endif;
						 ?>
						 <div class="tituloShare">
						<h5><a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a></h5>
						
						<!-- botones redes sociales -->
								<?php include(TEMPLATEPATH . "/includes/shareItemList.php");  ?> 	
							  <!-- Fin botones redes sociales -->
						<!-- <p><?php //print substr(strip_tags(get_the_content()), 0, 300); ?></p> -->
						
						
						<!-- <span class="bottom">
							<small class="date"><?php print get_the_time('d, M'); ?></small>
        				</span> -->
        				
        				
						 </div><!-- end col-lg-6 -->
						</div><!-- end .contenedorNota -->
						
					</div><!-- Fin del div featured clearfix -->
					
					<?php
			
			endwhile; //Fin while principal
		
		?>
			
		</div>
		
		
		<?php /* Display navigation to next/previous pages when applicable */ 
		if(function_exists('wp_pagenavi')) { 
			wp_pagenavi( array('query' =>$notas)); 
		}
		
		endif; //Fin de if notas->have_posts
		?>


<?php get_footer(); ?>