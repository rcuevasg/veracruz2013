<?php get_header(); ?>
<section id="principalContent"  class="container">
<div class="col-md-8 col-lg-8 post-home single-container tamaño-sinlge">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
		$nuestroAlinear = "";
		if($my_metaAling['alinear']!=""){			
			$nuestroAlinear = $my_metaAling['alinear'];
			}else{
				$nuestroAlinear = "cr";
				}

?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( is_front_page() ) { ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } else { ?>	
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } ?>
                <?php 
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
								?>
								 	<div class="arriba">    
                                    <span class='img img-responsive'>
                                   <div class="post-date" style="display:none;"><?php the_time( 'j M' ); ?></div>
                                   <!--<img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=700&h=300&a=<?php echo $nuestroAlinear; ?>' border=0 />-->
                                    <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=700&a=<?php echo $nuestroAlinear; ?>' border=0 /></span>
                                    </div>
									
								 <?php
								 endif;
								 ?>	
                                 <div class="hr"></div>			
					<div class="entry-content col-md-2 col-lg-2 redes-single">
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                        <a class="addthis_button_tweet"></a>
                        <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a>
                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                        </div>
                        <!-- AddThis Button END --> 
					</div><!-- .entry-content -->
                    <div class="col-md-10 col-lg-10 nota-contenido">
						<?php the_content(); ?>
					</div><!-- .entry-content -->				
<?php endwhile; ?>
<div class="hr"></div>			                    
<div class="navposts">
    	<div class="pull-left col-md-4 col-lg-4 col-sm-5 col-xs-6">        	
            <?php previous_post_link('<p>NOTA ANTERIOR</p> &laquo; %link','%title',TRUE); ?>
        </div> 
        <div class="pull-right col-md-4 col-lg-4 col-sm-5 col-xs-6">
            <?php next_post_link('<p>NOTA SIGUIENTE</p> %link &raquo;','%title',TRUE); ?>
        </div>
  </div>
</article><!-- #post-## -->
</div><!-- end .post-home -->
<?php get_sidebar(); ?>
</section><!--#content-single -->
<?php get_footer(); ?>