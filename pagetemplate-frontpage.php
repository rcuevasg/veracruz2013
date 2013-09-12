<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
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
								 	<div class="col-sm-5 col-md-6 col-lg-5 pull-left">    
                                    <span class='img img-responsive'>
                                   <div class="post-date"><?php the_time( 'j M' ); ?></div>
                                    <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=285&h=175&a=cr' border=0 /></span>
                                    </div>

								 <?php
								 endif;
								 ?>
                                <div class="col-sm-6 col-md-6 col-lg-6 lista-post-home pull-left">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
								</div>
						<div class="cls"></div>
                    <?php 
					endwhile;  //Terminar while de post dentro de BLOG
					wp_reset_query();
					?>
                    <div class="link-style blog-noticias btn btn-default">
                    <a href="#">VER TODAS LAS NOTICIAS</a>
                    </div>
                 </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>