<?php
/* Template para la categoria Blog */
?>
<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<noscript>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fallback.css" />
</noscript>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.26633.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.gridrotator.js"></script>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">	
	$(function() {
		$( '#ri-grid' ).gridrotator( {
			w1024 : { rows : 3, columns : 3 },
			w768 : {rows : 3,columns : 3},
			w320 : {
				rows : 3,
				columns : 3
			},
			w240 : {
				rows : 3,
				columns : 3
			},
			preventClick : false,
			onhover: false
		} );
	
	});
	$(function() {
    	$( "#tabs" ).tabs();
  	});
	$(document).ready(function(){
		$(document).on('click','.item-video',function(){
			var ID = $(this).data('id');
			$.ajax({
			    type: "POST",
				url: "<?php echo get_bloginfo('url') ?>/wp-admin/admin-ajax.php", 
				data: {'action':'get_video_ajax', post_id: ID },
				beforeSend:function(data){
                    $('.video-holder').addClass("loader-ajax");
            	},
				success: function(data, textStatus, XMLHttpRequest){
					$('.video-holder').html(data);
				},
				complete:function(){
					setTimeout(function () { $('.video-holder').removeClass("loader-ajax"); }, 2000);
					var div=$(".video-holder").offset().top;
					var masheader=div-75+'px';
					var top = $('.video-holder');
					$('html, body').animate({
						scrollTop: masheader
					},1000);
				
					return false;
				},
				error: function(data){
					console.log(data.statusText);
				}
			});
		});
		$(document).on('click','li.item-gallery',function(event){
			event.preventDefault();
			var ID  = $(this).children().data('id');
			$.ajax({
			    type: "POST",
				url: "<?php echo get_bloginfo('url') ?>/wp-admin/admin-ajax.php", 
				data: {'action':'get_images_gallery', post_id: ID },
				dataType: 'json',
				beforeSend:function(data){
                   $('.overlay-gallery').css("display","block");
            	},
				success: function(data, textStatus, XMLHttpRequest){
					var api_images =new Array();
						api_images = data.images;
					var api_title =new Array();
						api_title = data.title;
					$.prettyPhoto.open(api_images, api_title);
				},
				complete: function(){
					$('.overlay-gallery').css("display","none");
				},
				error: function(data){
					console.log(data.statusText);
				}
			});
		});	
		$(document).on('click','.pretty-img',function(event){
			event.preventDefault();
			var ID  = $(this).find('a').data('id');
			if (!$(this).hasClass("active")){
				$(".active").removeClass("active");
				$(this).addClass("active");
			}
			$.ajax({
			    type: "POST",
				url: "<?php echo get_bloginfo('url') ?>/wp-admin/admin-ajax.php", 
				data: {'action':'get_images_gallery', post_id: ID },
				dataType: 'json',
				beforeSend:function(data){
                   $('.active').children('.overlay-gallery-nota').css("display","block");
            	},
				success: function(data, textStatus, XMLHttpRequest){
					var api_images =new Array();
					var api_images = data.images;
					var api_title =new Array();
						api_title = data.title;
					$.prettyPhoto.open(api_images, api_title);
				},
				complete: function(){
					$('.active').children('.overlay-gallery-nota').css("display","none");
				},
				error: function(data){
					console.log(data.images);
				}
			});
		});
	});
	
	/* paginacion por tabs*/
	/*var tab_current = "#fotos";
	$(document).ready(function(){
		$(document).on('click','.ui-tabs-nav li a',function(){
			tab_current = $(this).attr('href');
		});
	});
	$(window).scroll(function(){
		if(tab_current == '#fotos'){  
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){  
				$( "#pbd-alp-load-posts2 a" ).trigger( "click" );
			}
		}else if(tab_current == '#videos'){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){  
				$( "#pbd-alp-load-posts a" ).trigger( "click" );
			}
		}else if(tab_current == '#infografias'){
			if  ($(window).scrollTop() == $(document).height() - $(window).height()){  
				$( "#pbd-alp-load-posts3 a" ).trigger( "click" );
			}
		}
	});*/
	
</script>
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
<div id="content-list" class="container blog-contenedor">
	<div class="tituloSingleArea">
        <h2>
            <?php
                printf( __( '%s', 'veracruz2013' ),  single_cat_title( '', false )  );
            ?>
        </h2>
    </div>
    <div class="back-img"></div>
    <div id="tabs">
      <ul>
        <li><a href="#fotos">FOTOS <span class="bg-bottom"></span></a></li>
        <li><a href="#videos">VIDEOS <span class="bg-bottom"></span></a></li>
        <li><a href="#infografias">INFOGRAFÍAS <span class="bg-bottom"></span></a></li>
      </ul>
      <div class="clear"></div>
      <div class="border-dotted-grey"></div>
      <div id="fotos">
          <div id="ri-grid" class="ri-grid ri-grid-size-1 ri-shadow">
            <div class="overlay-gallery"></div>
            <ul>
            <?php
                $args = array(
                'post_type' => 'post',
                'category_name' => 'fotos',
                'posts_per_page'=> 50,
                );
                $id_attachment=array();
                wp_reset_query(); 
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) {
                    $query->the_post();
					if ( has_post_thumbnail() ) { 
					   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query->post->ID), 'full'); 
					   $large_image_url = urlencode($large_image_url[0]);
					?>
					<li class="item-gallery">
                        <a data-id="<?php echo $query->post->ID ?>" class="over-infografia">
                       
                            <img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php echo $large_image_url; ?>&w=533&h=266' alt='<?php echo $attachment->post_excerpt; ?>' />
                        </a>
					</li> 
                    <?php
					}
					wp_reset_query(); 
                }
            ?>
            </ul>
        </div>
        <?php
        if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>
            <div class="searchHeaderArea col-md-12 col-lg-12">
                <?php //print obtenFechaEspaniol(); ?>
                <?php dynamic_sidebar( 'buscador-widget-area' ); ?>
            </div>
        <?php endif; ?>
        <div class="border-dotted-grey"></div>
        <?php  $idCategoria = get_cat_ID(single_cat_title( '', false )); ?>
        <?php
			$paged2 = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'category_name' => 'fotos',
                'posts_per_page'=> 6,
				'paged' => $paged2
            );
            $notas = new WP_Query($args);
            if ($notas->have_posts()) :
			echo "<div id='content-fotos'>";
            while ($notas->have_posts()): $notas->the_post(); 
				$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
				$nuestroAlinear = "";
				if($my_metaAling['alinear']!=""){			
					$nuestroAlinear = $my_metaAling['alinear'];
				}else{
					$nuestroAlinear = "cr";
				}
			 ?>
                <div class="divNotaListado col-md-4 col-lg-4 item-foto" style="margin-bottom:1.8%;">
                	<div class="contenedorNota">
						<?php
                        $domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
                        $thumbnailsrc = "";
                        if (!empty($domsxe)) {
                            $thumbnailsrc = $domsxe->attributes()->src;
                        } else {
                            $urlTema = get_bloginfo('template_url');
                            $thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
                        }
                        if (!empty($thumbnailsrc)): 
						   $img_data_1000 = get_bloginfo('template_url')."/timthumb.php?src=".urlencode($thumbnailsrc)."&a=".$nuestroAlinear."&w=340&h=200";
						   $img_data_989 = get_bloginfo('template_url')."/timthumb.php?src=".urlencode($thumbnailsrc)."&a=".$nuestroAlinear."&w=660&h=388";
						   $img_data_550 = get_bloginfo('template_url')."/timthumb.php?src=".urlencode($thumbnailsrc)."&a=".$nuestroAlinear."&w=454&h=239";
						   $img_data_310 = get_bloginfo('template_url')."/timthumb.php?src=".urlencode($thumbnailsrc)."&a=".$nuestroAlinear."&w=310&h=163";
						   ?>
                            <span class='img img-responsive'>
                                <div class="pretty-img">
                                		<div class="overlay-gallery-nota"></div>
                                    <a  class="over-foto" data-id="<?php echo $notas->post->ID ?>">
                                    	<div class="overlay-foto"></div>
                                        <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                            <span data-src="<?php echo $img_data_310 ?>"></span>
                                            <span data-src="<?php echo $img_data_550 ?>" data-media="(min-width: 550px)"></span>
                                            <span data-src="<?php echo $img_data_989 ?>" data-media="(min-width: 800px)"></span>
                                            <span data-src="<?php echo $img_data_1000 ?>" data-media="(min-width: 990px)"></span> 	
                                        </span>		
                                    </a>
                                    <div class="post-date">
                                        <?php the_time( 'j M' ); ?>
                                    </div>
                                </div>
                            </span>
						 <?php endif; ?>
                         <div class="tituloShare">
                             <div class="link-noticia">
                                 <div class="pretty-img">
                                     <a class="title" title="<?php the_title() ?>" style="text-decoration:none;" data-id="<?php echo $notas->post->ID ?>">
                                        <?php 
                                            $textoCortar=get_the_title();
                                            echo myTruncate($textoCortar, 65, ' ', ''); 
                                            ?>
                                     </a>
                                 </div>
                             </div>
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
	                     </div>
                	</div><!-- end .contenedorNota -->
				</div><!-- Fin del div featured clearfix -->
            <?php endwhile; //Fin while principal
			echo "</div>"; ?>
            <?php if (  $notas->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
			<?php endif; ?>	
			
			<?php 
            wp_reset_query();
			endif;
			?>
      </div>
      <div id="videos">
      		<?php 
			$sticky = get_option( 'sticky_posts' );
			$args = array(
				'posts_per_page' => 1,
				'post__in'  => $sticky,
				'ignore_sticky_posts' => 1,
				'category_name' => 'videos'
			); 
			?>
      		<?php $my_query = new WP_Query($args); ?>
				<?php if ( $my_query->have_posts() ) : ?>
                	<?php while ($my_query->have_posts()):$my_query->the_post(); ?>
                        <div class="video-holder">
                            <?php 
								//Video_youtube
								$link = get_post_meta($post->ID, 'youtube-link' , true); 
							?>
                            <div class="col-md-8 video-container">
                                <?php $pieces=explode("=",$link); ?>
                				<iframe width="598" height="330" src="http://www.youtube.com/embed/<?php echo $link; ?>?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-4 padding-30">
                                <h6 class="date">
                                    <span id="fecha-variable" class="text"><?php the_time( 'j M' ); ?></span>
                                    <span class="border"></span>
                                </h6>
                                <h3 class="titulo" style="cursor:default;"><?php the_title(); ?></h3>
                                <div id="contenido">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                <?php endwhile; endif; ?>
            <div class="clear"></div>
			<?php wp_reset_query(); ?>
			<?php
            if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>
                <div class="searchHeaderArea col-md-12 col-lg-12 sin-top">
                    <?php dynamic_sidebar( 'buscador-widget-area' ); ?>
                </div>
            <?php endif; ?>
            <?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$sticky = get_option( 'sticky_posts' );
			$args = array(
				'category_name' => 'videos',
				'ignore_sticky_posts' => 1,
				'post__not_in' => $sticky,
				'paged' => $paged,
				'posts_per_page' => 6
			);
            $notas = new WP_Query($args);
            if ($notas->have_posts()) :
            echo "<div id='content-videos'>";
			while ($notas->have_posts()): $notas->the_post(); 
			$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
			$nuestroAlinear = "";
			if($my_metaAling['alinear']!=""){			
				$nuestroAlinear = $my_metaAling['alinear'];
			}else{
				$nuestroAlinear = "cr";
			}
			?>
                <div class="divNotaListado col-md-4 col-lg-4 item-video" data-id="<?php echo  $notas->post->ID; ?>" style="margin-bottom:1.8%;">
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
                                <a class="over-video">
                                <div class="overlay-video"></div>
                                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                        <span data-src="<?php echo $img_data_310 ?>"></span>
                                        <span data-src="<?php echo $img_data_550 ?>" data-media="(min-width: 550px)"></span>
                                        <span data-src="<?php echo $img_data_989 ?>" data-media="(min-width: 800px)"></span>
                                        <span data-src="<?php echo $img_data_1000 ?>" data-media="(min-width: 990px)"></span> 	
                                    </span>
                                </a>
                                <div class="post-date"><?php the_time( 'j M' ); ?></div>
                            </span>
                         <?php endif; ?>
                         <div class="tituloShare">
                            <div class="link-noticia">
                                 <a class="title" title="<?php the_title() ?>" style="text-decoration:none; cursor:default;">
                                    <?php 
										$textoCortar=get_the_title();
										echo myTruncate($textoCortar, 65, ' ', ''); 
									?>
                                 </a>
                             </div>
                            <div class="listadoShareItem">
                                 <!-- AddThis Button BEGIN -->
                                 <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                                     <span><a class="addthis_button_facebook iconFacebook" fb:like:href="<?php echo get_permalink(); ?>"></a></span>
                                     <span><a class="addthis_button_twitter iconTwitter" tw:url="<?php echo get_permalink(); ?>"></a></span>
                                     <span><a class="addthis_button_linkedin iconLinkedIn" addthis:url=" <?php echo get_permalink(); ?>"></a></span>
                                     <span><a class="addthis_button_pinterest_share iconPinterestBlog" addthis:url=" <?php echo get_permalink(); ?>"></a></span>
                                     <span><a class="addthis_button_google_plusone_share iconPlusBlog" addthis:url=" <?php echo get_permalink(); ?>"></a></span>
                                 </div>
                                
                                 <!-- AddThis Button END -->
        					 </div>
                         </div>
                    </div>
                </div>
            <?php endwhile; //Fin while principal
			wp_reset_query();
			echo "</div>";
            endif; //Fin de if notas->have_posts
            ?>
      </div>
      <div id="infografias">
        	<?php  //$idCategoria = get_cat_ID(single_cat_title( '', false ));  print_r($idCategoria);?>
            <div id="popular" class="col-sm-12 col-md-12 col-lg-12 img-responsive">
               <!-- <span id="ribonLoMasLeido" class="responsive">
                  <span style="display:none;"><?php $url=get_bloginfo('template_url')."/images/masleido.png"; ?></span>
                  <img src="<?php echo $url; ?>" border="0">
                </span> -->
                <?php 
				$sticky = get_option( 'sticky_posts' );
				$args = array(
					'posts_per_page' => 1,
					'post__in'  => $sticky,
					'ignore_sticky_posts' => 1,
					'category_name' => 'infografias'
				); 
				$notas = new WP_Query($args);	
                if ($notas->have_posts()) : 
					while($notas->have_posts()){ $notas->the_post(); 
						if ( has_post_thumbnail() ) { 
						   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 
						   echo "<img class='img-responsive' src='".$large_image_url[0]."' alt=''>";
						}
					} 
                endif; wp_reset_query(); ?>
                <div class="clear"></div>
                <!-- botones redes sociales -->
                <div class="listadoShareItem">
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
              	</div><!-- Fin botones redes sociales -->
                <?php
				if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>
					<div class="searchHeaderArea col-md-12 col-lg-12 sin-top">
						<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
					</div>
				<?php endif; ?>
            </div><!-- end #popular -->
			<?php
				$paged3 = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$sticky = get_option( 'sticky_posts' );
				$args = array(
					'category_name' => 'infografias',
					'ignore_sticky_posts' => 1,
					'post__not_in' => $sticky,
					'paged' => $paged3,
					'posts_per_page' => 6
				);
				$notas = new WP_Query($args);	
                if ($notas->have_posts()) : 
				echo "<div id='content-infografias'>";
					while($notas->have_posts()){ $notas->the_post(); 
					$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
					$nuestroAlinear = "";
					if($my_metaAling['alinear']!=""){			
						$nuestroAlinear = $my_metaAling['alinear'];
					}else{
						$nuestroAlinear = "cr";
					}	
					?>
                        <div class="divNotaListado col-md-4 col-lg-4 item-infografia" style="margin-bottom:1.8%;">
                            <div class="contenedorNota">
								<?php //Obtenemos la url de la imagen destacada
                                $domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
                                $thumbnailsrc = "";
                                if (!empty($domsxe)) {
                                    $thumbnailsrc = $domsxe->attributes()->src;
                                } else {
                                    $urlTema = get_bloginfo('template_url');
                                    $thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
                                }
                               
                                if (!empty($thumbnailsrc)): 
									$img_data_1000 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=340";
									$img_data_989 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=660";
									$img_data_550 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=454";
									$img_data_310 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=310";
									$img_data_lightbox = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=900";
									?>
                                    <span class='img img-responsive overlay-responsive'>
                                        <a href="<?php echo $img_data_lightbox; ?>" class="over-infografia" rel='prettyPhoto'>
                                        	<div class="overlay-infografia"></div>
                                           <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                                                <span data-src="<?php echo $img_data_310 ?>"></span>
                                                <span data-src="<?php echo $img_data_550 ?>" data-media="(min-width: 550px)"></span>
                                                <span data-src="<?php echo $img_data_989 ?>" data-media="(min-width: 800px)"></span>
                                                <span data-src="<?php echo $img_data_1000 ?>" data-media="(min-width: 990px)"></span> 	
                                           </span>
                                        </a>
                                        <div class="post-date"><?php the_time( 'j M' ); ?></div>
                                    </span>
								 <?php endif; ?>
                                 <div class="tituloShare">
                                     <div class="link-noticia">
                                     	<a href="<?php echo $img_data_lightbox; ?>" title="<?php the_title() ?>" class="title over-infografia" rel='prettyPhoto'>
											<?php 
												$textoCortar=get_the_content();
												echo myTruncate($textoCortar, 65, ' ', ''); 
											?>
                                        </a>
                                     </div>
                                    <!-- botones redes sociales -->
                                    <div class="listadoShareItem">
                                    <!-- AddThis Button BEGIN -->
                                       <div class="addthis_toolbox addthis_default_style addthis_32x32_style move-left">
                                           <a class="addthis_button_facebook iconFacebook"></a>
                                           <a class="addthis_button_twitter iconTwitter"></a>
                                           <a class="addthis_button_linkedin iconLinkedIn"></a>
                                           <a class="addthis_button_pinterest_share iconPinterestBlog"></a>
                                           <a class="addthis_button_google_plusone_share iconPlusBlog"></a>
                                       </div>
                                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
                                        <!-- AddThis Button END -->
                         		 	</div>
                                 </div><!-- end col-lg-6 -->
                            </div><!-- end .contenedorNota -->
                        </div><!-- Fin del div featured clearfix -->
                    <?php
                    } 
					echo "</div>";  ?>
					 <?php if (  $notas->max_num_pages > 1 ) : ?>
                        <div id="nav-below" class="navigation">
                            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
                            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
                        </div><!-- #nav-below -->
                    <?php endif; ?>		
                	
				<?php endif; //Fin de if notas->have_posts
                ?>
      </div>
    </div>
</div>
<div id='IrArriba'>
<a href='#Arriba'><span/></a>
</div>
<?php get_footer(); ?>