<?php
/* Template para la categoria Blog */
?>
<?php get_header(); ?>
<?php $miID=get_the_ID(); ?>
<script src='<?php bloginfo('template_url')?>/js/jquery.min-1.7.1.js' type='text/javascript'></script>
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
<div id="content-list" class="container blog-contenedor content-blog blogBuscador">
<?php 
$nombreCategoria = single_cat_title("", false);
?>
	<div class="tituloSingleArea">
		<h2>
			<?php
				printf( __( '%s', 'veracruz2013' ),  single_cat_title( '', false )  );
			?>
		</h2>
	</div>
	<div class="back-img"></div>
	<?php
	if($nombreCategoria == "Blog" || $nombreCategoria == "Destacados"){
		if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>
	
			<div class="searchHeaderArea col-md-12 col-lg-12">
				<?php //print obtenFechaEspaniol(); ?>
				<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
			</div>
	<?php 
	endif; 
	}
	?>
	<div id="popular" class="col-sm-12 col-md-12 col-lg-12 img-responsive">
          <span id="ribonLoMasLeido" class="responsive">
          		<img src="<?php echo bloginfo('template_url')."/images/masleido.png"; ?>" border="0">
          </span>        
		
         <?php
		 		
		 	//$category = get_the_category_by_ID(get_query_var( 'cat' )); 
			/*$category=get_cat_slug(get_query_var( 'cat' ));
			$get_id_array = get_post_destacado($category);
			$my_metaAling_destacado = get_post_meta($get_id_array,'_img_alinear',true);
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($get_id_array), 'full');
			if($my_metaAling_destacado['alinear']!=""){			
				$nuestroAlinear = $my_metaAling_destacado['alinear'];
			}else{
				$nuestroAlinear = "cr";
			}*/
			$category = get_cat_slug(get_query_var( 'cat' ));
			$sticky = get_option( 'sticky_posts' );
			$args = array(
				'posts_per_page' => 1,
				'post__in'  => $sticky,
				'ignore_sticky_posts' => 1,
				'category_name' => $category
			);
			$my_query = new WP_Query($args); if( $my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post(); 
				$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
				$nuestroAlinear = "";
				if($my_metaAling['alinear']!=""){			
					$nuestroAlinear = $my_metaAling['alinear'];
				}else{
					$nuestroAlinear = "cr";
				}
				?>
				<?php if ( has_post_thumbnail() ) { 
				   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($my_query->ID), 'full'); ?>
				   <img class="img-responsive img-destacada" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php echo $large_image_url[0]; ?>&w=1080&h=330&a=<?php echo $nuestroAlinear; ?>' border=0 />
				<?php 
					} 
				?>
                <div class="time-blog"><?php the_time( 'j M' ); ?></div>
                <span class="border gray"></span>
                <p class="p-destacados" style="font-size: 1.214em !important;"><a href="<?php echo the_permalink(); ?>" style="text-decoration:none;"><?php the_title() ?></a></p>
			<?php  endwhile; }  wp_reset_query(); ?>
        <!-- botones redes sociales -->
        <div class="listadoShareItem border-top">
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
	if(($nombreCategoria == "Gobernador") || ($nombreCategoria == "STPSP") || ($nombreCategoria == "SSP") || ($nombreCategoria == "SS") || ($nombreCategoria == "SIOP") || ($nombreCategoria == "SEV") || ($nombreCategoria == "SEGOB") || ($nombreCategoria == "SEFIPLAN") || ($nombreCategoria == "SEDESOL") || ($nombreCategoria == "SEDEMA") || ($nombreCategoria == "SEDECOP") || ($nombreCategoria == "SEDARPA") || ($nombreCategoria == "SECTUR") || ($nombreCategoria == "PROGOB") || ($nombreCategoria == "PGJ") || ($nombreCategoria == "PC") || ($nombreCategoria == "DIF") || ($nombreCategoria == "CGE") || ($nombreCategoria == "CGCS") || ($nombreCategoria == "Estado del Tiempo")){
		?>
        <div class="searchHeaderArea col-md-12 col-lg-12" style="overflow:auto">
        	<div class="col-lg-8 col-md-8 encuentraComunicado">
            <span style="display:block; font-family: 'GandhiSans'; color: #3c3c3b; font-size: 1.214em;">Encuentra tu comunicado: </span>
            </div>
            <div class="col-lg-4 col-md-4">
			<?php include('searchformComunicado.php'); ?>
            </div>
        </div>
		<?php } ?>
		<?php
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$sticky = get_option( 'sticky_posts' );
			$args = array(
				'category_name' => $category,
				'ignore_sticky_posts' => 1,
				'post__not_in' => $sticky,
				'paged' => $paged
				//'orderby' => 'menu_order',
				//'order' => 'ASC'
			);
			$my_query = new WP_Query($args);
			$contadorPost=0;
			if ($my_query->have_posts()) :
			//$step = 1; //Variable para llevar el conteo y separar listados grandes de los pequeños
			//$cierraPrimerDiv = false;
			echo "<div id='content-nota'>";
			while($my_query->have_posts()){ $my_query->the_post();
			$contadorPost++;
			$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
			$nuestroAlinear = "";
			if($my_metaAling['alinear']!=""){			
				$nuestroAlinear = $my_metaAling['alinear'];
			}else{
				$nuestroAlinear = "cr";
			}
			?>

		<div class="claseDecente divNotaListado col-md-4 col-lg-4 item-nota" style="margin-bottom:1.8%;"> <!--style="margin-bottom:1%;"-->
						<div class="contenedorNota">
						<?php //Obtenemos la url de la imagen destacada
			    		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
			    		$thumbnailsrc = "";
			    		if (!empty($domsxe)) {
				    		$thumbnailsrc = $domsxe->attributes()->src;
				    		//$thumbnailsrc = substr($thumbnailsrc, strrpos($thumbnailsrc, "/wp-"), strlen($thumbnailsrc));
				    	} else {
					    	$urlTema = get_bloginfo('template_url');
					    	$thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
					    }
				    
						if (!empty($thumbnailsrc)):
						$img_data_1000 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=340&h=200";
						$img_data_989 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=660&h=388";
						$img_data_550 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=454&h=239";
						$img_data_310 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=310&h=163";
						
						?>
                        <span class='img img-responsive overlay-responsive'>
                        	<?php $category = get_cat_slug_by_id($notas->post->ID); ?>
                            <a href="<?php the_permalink() ?>" class="over-<?php echo $category ?>">
                                <div class="overlay-<?php echo $category ?>"></div>
                                <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                    <span data-src="<?php echo $img_data_310 ?>"></span>
                                    <span data-src="<?php echo $img_data_550 ?>" data-media="(min-width: 550px)"></span>
                                       <span data-src="<?php echo $img_data_989 ?>" data-media="(min-width: 800px)"></span>
                                    <span data-src="<?php echo $img_data_1000 ?>" data-media="(min-width: 990px)"></span> 	
                                </span>
                                <div class="post-date"><?php the_time( 'j M' ); ?></div>
                            </a>
                        </span> 
					    <?php
						 endif;
						 ?>
						 <div class="tituloShare">
                         <div class="link-noticia">
						<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>" style="text-decoration:none;">
							<?php 
							$textoCortar=get_the_title();
							echo myTruncate($textoCortar, 65, ' ', ''); 
							?>
                        </a>
						</div>
						<!-- botones redes sociales -->
                    <div class="listadoShareItem">
                    <!-- AddThis Button BEGIN -->
                       <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                        <span><a class="addthis_button_facebook iconFacebook"></a></span>
                        <span style="margin-top: 2%;"><a class="addthis_button_twitter iconTwitter"></a></span>
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
		echo "</div>";
		?>
	</div>
 </div>
		<?php 
		/* Display navigation to next/previous pages when applicable */ 
		endif; //Fin de if notas->have_posts
		//wp_pagenavi();
		?>
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation" style="display:none;">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div> <!-- #nav-below -->
<?php endif; ?>	
<div id='IrArriba'>
<a href='#Arriba'><span/></a>
</div>
<?php get_footer(); ?>