<?php
/*
Template Name: App page
*/
?>
<?php get_header(); ?>
<section class="container principalContent" id="content-list">
<div class="tituloSingleArea">
<h2>
<?php
echo get_the_title();//$post->post_parent
?>
</h2>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 contenedor-pages">
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="back-img" style="margin-top: 2%"></div>
<br>
<div class="col-md-12 col-lg-12">
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
							<div class="content-normativa">
						 	<span class='img img-responsive'><img class="img-responsive" src='<?php print $thumbnailsrc; ?>' border=0 />
						 	</span>
						 	</div>
						 <?php
						 // <?php bloginfo('template_url') ? >/timthumb.php?src=
						 endif;
						 ?>
  <div class="entrytext" style="margin-top: -2%;">
  	<div class="item-normativa">
   <?php the_content(); ?>
  	</div>
   
   <?php
   	$url = get_post_meta($post->ID, 'url', true);
   	?>
   <center><iframe src="<?php print strip_tags($url); ?>" class="iframe-responsive" width="1000px" style="height:1300px" frameborder="0" ></iframe></center>
   
  </div>
</div>
 <?php endwhile; endif; ?>
</div>
</section>
<div class="border-bottom"></div>
<?php get_footer(); ?>