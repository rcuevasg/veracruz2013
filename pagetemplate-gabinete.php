<?php
/*
Template Name: Gabinete page
*/
?>
<?php get_header(); ?>
<script type="application/javascript">
$( document ).ready(function() {
	$('.item-gabinete').hover(function(e) {
		e.preventDefault();
		$(this).children().find('img').addClass('z_index-2');
		$(this).children().find('h3').addClass('z_index-2-top');
		$(this).find('.gabinete-over').show();
		/*$(this).siblings().find('.read-more').hide();*/
		/*$(this).children().find('.siglas-depencia').hide();*/
	}, function(e) {
		e.preventDefault();
		$(this).children().find('h3').removeClass('z_index-2-top');
		$(this).find('.gabinete-over').hide()/*.animate({height: "0px", width: "0px", opacity: 0}, 800)*/;
		//$(this).siblings().find('.read-more').show();
		/*$(this).children().find('.siglas-depencia').show();*/
		$(this).children().find('img').removeClass('z_index-2');
	})
});
</script>
    <div id="content-list" class="container principalContent">
    <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="back-img"></div>
        <div class="entrytext subirTop">
                    <div class="item-normativa gabineteDesc">
                      <div class="back-img"></div>
                      <p>
                      El Gabinete está conformado por los Titulares de cada una de las Dependencias del Gobierno del Estado de Veracruz. En ejercicio de su función, el Gobernador del Estado es el encargado del nombramiento de los titulares de las dependencias de Gobierno.
                      </p>
                      <div class="back-img"></div>
                     </div>
        </div>
		<?php
			$args = array(
				'post_type' => 'page', 
				'post_parent' => $post->ID, 
				'order' => 'ASC', 
				'posts_per_page' => -1,
			);
            $the_query = new WP_Query($args);
            if ( $the_query->have_posts() ) {
                $cont=1;
			    while ( $the_query->have_posts() ) {
                    $the_query->the_post(); 
					$siglas_dependencia=get_post_meta($the_query->post->ID, 'siglas-dependencia', true);
					$logo_dependencia=get_post_meta($the_query->post->ID, 'logo-dependencia', true);
					$link_dependencia=get_post_meta($the_query->post->ID, 'link-dependencia', true);
                    ?>
					<div class="divNotaGabinete col-md-3 col-lg-3 item-nota">
                    	<?php if($cont%4!=0){ ?>
                        	<div class="item-gabinete">
						<?php }else{ ?>
                        	<div class="item-gabinete mirror">	
                        <?php } ?>
                        	<div class="gabinete-card">
								<?php 
                                if ( has_post_thumbnail() ) { 
                                   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'img-gabinete'); 
                                   echo "<img class='img-gabinete img-responsive' src='".$large_image_url[0]."' alt=''>";
                                }?>
                                <h3><?php the_title(); ?></h3>
                                <?php if(isset($siglas_dependencia) && !empty($siglas_dependencia)){ ?>
                                    <div class="siglas-depencia">
                                        <span><?php echo $siglas_dependencia; ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="gabinete-over">
                                <div class="data-card">
                                	<?php if(isset($logo_dependencia) && !empty($logo_dependencia)){ ?>
                                        <div class="title-secretaria">
                                            <center><?php echo "<img src='$logo_dependencia'>"; ?></center>
                                        </div>
                                    <?php } ?>
                                    <div class="link-dependecia">
                                     	<a href="<?php echo $link_dependencia; ?>"  target="_blank">Visitar sitio ></a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="bg-card-gabinete"></div>
                                <?php 
								$nombreSub = get_the_title();
								if($nombreSub=="Mauricio Audirac Murillo"){
								?>
                                <a href="#" style="display:none;" >SEMBLANZA</a>
								<?php 
								}else{
								?>
                                <a href="<?php the_permalink(); ?>" class="read-more margin-0">SEMBLANZA</a>
                                <?php }?>
                            </div>
                        </div>
                        <center><a href="<?php the_permalink(); ?>" class="read-more margin-0">SEMBLANZA</a></center>
                        <?php if($cont%4==0){ ?>
                        	</div><div class="clear">
						<?php } ?>
                	</div>
			<?php 
				$cont++; }
            }
        ?>
		<?php wp_reset_postdata();?>	
    </div>
    <div class="border-bottom"></div>
<?php get_footer(); ?>