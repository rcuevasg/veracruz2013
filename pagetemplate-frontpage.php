<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
				<section id="principalContent" class="container">
				<section class="col-lg-8 post-home">
						 <?php
						$categoriaBlog = get_category_by_slug('blog');
						$categoriaBlog = $categoriaBlog->term_id;
						$blog_query = new WP_Query('cat=' . $categoriaBlog . '&showposts=3&post_type=post');
						
						while ($blog_query->have_posts()) :
						 	$blog_query->the_post();
						 	$wp_query->in_the_loop = true;
						 ?>
                        <div class="lista-post-home col-lg-12">
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
									<div class="col-md-6">
								 	<span class='img img-responsive'><img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=255&h=160&a=cr' border=0 /></span>
								 	</div>
								 <?php
								 endif;
								 ?>
                            <div class="col-md-6">
                                <div class="post-date"><?php the_time( 'j M' ); ?></div>
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="cls"></div>
                        </div> <!-- Terminar DIV post -->
                    <?php 
					endwhile;  //Terminar while de post dentro de BLOG
					wp_reset_query();
					//if (function_exists('wp_pagenavi')):
						//wp_pagenavi( array( 'query' => $blog_query ) );
					//endif; 
					//PAGINACION
					//
					?>
                 </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>