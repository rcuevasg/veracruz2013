<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: '<div id="social" class="addthis_toolbox addthis_default_style" addthis:url=""> <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a> <a class="addthis_button_pinterest_share"></a> <a class="addthis_button_google_plusone_share"></a> <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a><br><br></div>',
		changepicturecallback: function(){ var addthis_share = $('#fullResImage, #pp_full_res iframe').attr('src'); show_url_social(addthis_share); addthis.toolbox("#social"); },
		//ajaxcallback: function() { var addthis_share = $('#fullResImage, #pp_full_res iframe').attr('src'); show_url_social(addthis_share); addthis.toolbox("#social");}
	});
});
function show_url_social(url){
	$('#social').attr('addthis:url', url);	
}
</script>


				<section id="principalContent" class="container">
				<div class="col-md-8 col-lg-8 post-home">
						 <?php
						$categoriaBlog = get_category_by_slug('blog');
						$categoriaBlog = $categoriaBlog->term_id;
						$blog_query = new WP_Query('cat=' . $categoriaBlog . '&showposts=3&post_type=post');
						
						while ($blog_query->have_posts()) :
						 	$blog_query->the_post();
						 	$wp_query->in_the_loop = true;
						 ?>
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
								 	<div class="col-sm-5 col-md-6 col-lg-5 pull-left arriba">    
                                    <span class='img img-responsive'>
                                   <div class="post-date"><?php the_time( 'j M' ); ?></div>
                                    <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=285&h=175&a=cr' border=0 /></span>
                                    </div>

								 <?php
								 endif;
								 ?>
                                <div class="col-sm-6 col-md-6 col-lg-6 lista-post-home">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
								</div>
						<div class="cls"></div>
                    <?php 
					endwhile;  //Terminar while de post dentro de BLOG
					wp_reset_query();
					?>
                    <div class="link-style blog-noticias btn btn-default">
                    <?php
                    	$categoriaBlog = get_category_by_slug('blog');
						$categoriaBlog = $categoriaBlog->term_id;
                    ?>
                    <a href="<?php print esc_url(get_category_link($categoriaBlog)) ?>">VER TODAS LAS NOTICIAS</a>
                    </div>
                 </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>