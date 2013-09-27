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
		$(this).find('.gabinete-over').show().animate({height: "325px", width: "506px", opacity: 1 }, 900);
		$(this).siblings().find('.read-more').hide();
		$(this).children().find('.siglas-depencia').hide();
	}, function(e) {
		e.preventDefault();
		$(this).children().find('h3').removeClass('z_index-2-top');
		$(this).find('.gabinete-over').hide()/*.animate({height: "0px", width: "0px", opacity: 0}, 800)*/;
		$(this).siblings().find('.read-more').show();
		$(this).children().find('.siglas-depencia').show();
		$(this).children().find('img').removeClass('z_index-2');
	})
});
</script>
    <div id="content-list" class="container principalContent">
		<?php
			$args = array('post_type' => 'page', 'post_parent' => $post->ID, 'order' => 'ASC');
            $the_query = new WP_Query($args);
            if ( $the_query->have_posts() ) {
                $cont=1;
			    while ( $the_query->have_posts() ) {
                    $the_query->the_post(); 
					$siglas_dependencia=get_post_meta($the_query->post->ID, 'siglas-dependencia', true);
					$logo_dependencia=get_post_meta($the_query->post->ID, 'logo-dependecia', true);
					$url_twitter=get_post_meta($the_query->post->ID, 'url-twitter', true);
					$url_facebook=get_post_meta($the_query->post->ID, 'url-facebook', true);
                    ?>
					<div class="divNotaGabinete col-md-3 col-lg-3">
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
                                     	Visitar sitio >>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="bg-card-gabinete"></div>
                                <a href="<?php the_permalink(); ?>" class="read-more margin-0">SEMBLANZA</a>
                            </div>
                        </div>
                       <!--<center><a href="<?php the_permalink(); ?>" class="read-more margin-0">SEMBLANZA</a></center>-->
                        <?php if($cont%4==0){ ?>
                        	</div><div class="clear">
						<?php } ?>
                	</div>
			<?php $cont++; }
            }
            wp_reset_postdata();
        ?>
    </div>
    <div class="border-bottom"></div>
<?php get_footer(); ?>