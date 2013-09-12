<?php
/* Template para la categoria Blog */
?>

<?php get_header(); ?>


	<div id="content-list" class="container">
		<?php
			$idCategoria = get_cat_ID(single_cat_title( '', false ));
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$notas = new WP_Query($query_string . '&posts_per_page=10');
			if ($notas->have_posts()) :
			//$step = 1; //Variable para llevar el conteo y separar listados grandes de los pequeños
			//$cierraPrimerDiv = false;
			while ($notas->have_posts()): $notas->the_post();

					?>
					<div class="divNotaListado col-md-4 col-lg-4">
						
						<?php //Obtenemos la url de la imagen destacada
			    		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
			    		$thumbnailsrc = "";
			    		if (!empty($domsxe)) {
				    		$thumbnailsrc = $domsxe->attributes()->src;
				    		$thumbnailsrc = substr($thumbnailsrc, strrpos($thumbnailsrc, "/wp-"), strlen($thumbnailsrc));
				    	} else {
					    	$urlTema = get_bloginfo('template_url');
					    	$thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
					    }
					   
						if (!empty($thumbnailsrc)):
						?>
							<div class="col-sm-7 col-md-4 col-lg-4">
						 	<span class='img img-responsive'><img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=289&h=160' border=0 /></span>
						 	</div>
						 <?php
						 endif;
						 ?>
						 <div class="col-md-8 col-lg-8">
						<h2><a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a></h2>
						<!-- <p><?php //print substr(strip_tags(get_the_content()), 0, 300); ?></p> -->
						
						<span class="bottom">
							<small class="date"><?php print get_the_time('d M, Y'); ?></small>
        				</span>
        				
        				<span class="resumen">
        					<?php print substr(strip_tags(get_the_content()), 0, 200) . " ..." ?>
        				</span>
        				
        				<a class="linkLeerMas" href='<?php print get_permalink() ?>' title='Continuar leyendo <?php get_the_title() ?>'>Leer la nota</a>
        				
						 </div><!-- end col-lg-6 -->
        				
        				<hr class="notaSeparador">
						
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