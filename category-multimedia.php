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
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">	
	$(function() {
		$( '#ri-grid' ).gridrotator( {
			w1024 : { rows : 3, columns : 4 },
			w768 : {rows : 3,columns : 4 },
			w320 : {
				rows : 1,
				columns : 2
			},
			w240 : {
				rows : 1,
				columns : 2
			},
			onhover : true,
			preventClick : true
		} );
	
	});
	$(function() {
    	$( "#tabs" ).tabs();
  	});
	$(document).ready(function(){
		$(".item-video").click(function(){
			var ID = $(this).data('id');
			$.ajax({
			    type: "POST",
				url: "/veracruz/wp-admin/admin-ajax.php", 
				data: {'action':'get_video_ajax', post_id: ID },
				beforeSend:function(data){
                    $('.video-holder').addClass("loader-ajax");
            	},
				success: function(data, textStatus, XMLHttpRequest){
					$('.video-holder').html(data);
				},
				complete:function(){
					setTimeout(function () { $('.video-holder').removeClass("loader-ajax"); }, 2000);
				},
				error: function(data){
					console.log(data.statusText);
				}
			});
		});
		
		//Loading more
		$(".more").click(function(){
			var ID = $(this).attr("id");
			if(ID) {
				$("#more"+ID).html('<img src="moreajax.gif" />');
				$.ajax({
					type: "POST",
					url: "/veracruz/wp-admin/admin-ajax.php",
					data: {'action':'get_more_post', post_id: ID },
					cache: false,
					success: function(html){
						$("div#update").append(html);
						$("#more"+ID).remove(); // removing old more button
					}
				});
			} else {
				$(".morebox").html('The End');// no results
			}
			return false;
		});
		
	});
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
        <li><a href="#fotos" rel="fotos">FOTOS <span class="bg-bottom"></span></a></li>
        <li><a href="#videos" rel="videos">VIDEOS <span class="bg-bottom"></span></a></li>
        <li><a href="#infografias" rel="infografias">INFOGRAFIAS <span class="bg-bottom"></span></a></li>
      </ul>
      <div class="clear"></div>
      <div id="fotos">
          <div id="ri-grid" class="ri-grid ri-grid-size-1 ri-shadow">
            <ul>
            <?php
                $args = array(
                'post_type' => 'post',
                'category_name' => 'fotos',
                'posts_per_page'=> 5,
                );
                $id_attachment=array();
                wp_reset_query(); 
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $args=array('post_type'=>'attachment','post_parent'=>get_the_ID(),'order' => 'ASC', 'orderby' => 'menu_order ID', 'posts_per_page'=>99);
                    $attachments=get_posts($args);
                    if($attachments){
                        foreach($attachments as $attachment){
                            $img_custom=wp_get_attachment_image_src( $attachment->ID, 'img-medios-detacado' );
                            $img_full=wp_get_attachment_image_src( $attachment->ID, 'full' );
                            echo "<li><a href='".$img_full[0]."' rel='prettyPhoto[pp_gal]' title='".$attachment->post_content."'><img src='".$img_custom[0]."' alt='".$attachment->post_excerpt."' /></a></li>";
                        }
                    }wp_reset_query(); 
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
        <?php  $idCategoria = get_cat_ID(single_cat_title( '', false )); ?>
        <?php
            $args = array(
                'post_type' => 'post',
                'category_name' => 'fotos',
                'posts_per_page'=> -1,
            );
            $notas = new WP_Query($args);
            if ($notas->have_posts()) :
            while ($notas->have_posts()): $notas->the_post(); ?>
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
                       
                        if (!empty($thumbnailsrc)): ?>
                            <span class='img img-responsive'>
                                <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $urlTb; ?><?php print $thumbnailsrc; ?>&w=380&h=200' border=0 />
                                <div class="post-date"><?php the_time( 'j M' ); ?></div>
                            </span>
						 <?php endif; ?>
                         <div class="tituloShare">
                             <div class="link-noticia">
                                 <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>">
                                    <?php the_title() ?>
                                 </a>
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
            endif; //Fin de if notas->have_posts
            ?>
      </div>
      <div id="videos">
      		<?php query_posts( 'category_name=videos&order=ASC&posts_per_page=1' ); ?>
				<?php if ( have_posts() ) : ?>
                	<?php while (have_posts()):the_post(); ?>
                        <div class="video-holder">
                            <?php 
								$link = get_post_meta($post->ID, 'Video_youtube' , true); 
							?>
                            <div class="col-md-8 video-container">
                                <?php $pieces=explode("=",$link); ?>
                				<iframe width="598" height="330" src="http://www.youtube.com/embed/<?php echo end($pieces); ?>?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-4 padding-30">
                                <h6 class="date">
                                    <span id="fecha-variable" class="text"><?php the_time( 'j M' ); ?></span>
                                    <span class="border"></span>
                                </h6>
                                <h3 class="titulo"><?php the_title(); ?></h3>
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
            <?php  $idCategoria = get_cat_ID(single_cat_title( '', false )); ?>
            <?php
                $args = array(
                    'post_type' => 'post',
                    'category_name' => 'videos',
                    'posts_per_page'=> 3,
            );
            $notas = new WP_Query($args);
            if ($notas->have_posts()) :
            echo "<div id='update'>";
			while ($notas->have_posts()): $notas->the_post(); ?>
                <div class="divNotaListado col-md-4 col-lg-4 item-video" data-id="<?= $notas->post->ID; ?>">
                    <div class="contenedorNota">
                        <?php 
                        if ( has_post_thumbnail() ): 
						   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'img-single-sidebar'); 
                        endif; ?>
							<div class="item-info">
                                <span class='img img-responsive'>
                                    <img class='img-responsive' src='<?php echo $large_image_url[0] ?>' alt=''>
                                    <div class="post-date">
                                        <?php the_time( 'j M' ); ?>
                                    </div>
                                </span>
                            </div>
                         
                         <div class="tituloShare">
                            <h5>
                                <a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
                            </h5>
                         </div>
                    </div>
                </div>
            <?php endwhile; //Fin while principal
			echo "</div>";
            endif; //Fin de if notas->have_posts
            ?>
            <?php $next_post = get_next_post(true); ?>
            <div id="more<?php echo $next_post->ID; ?>" class="morebox">
                <a href="#" class="more" id="<?php echo $next_post->ID; ?>">more</a>
            </div>
      </div>
      <div id="infografias">
      </div>
    </div>
</div>
<?php get_footer(); ?>