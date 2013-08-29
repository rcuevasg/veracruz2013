<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
				<section>
						 <?php
						$categoriaBlog = get_category_by_slug('blog');
						$categoriaBlog = $categoriaBlog->term_id;
						$blog_query = new WP_Query('cat=' . $categoriaBlog . '&showposts=3&post_type=post');
						
						while ($blog_query->have_posts()) :
						 	$blog_query->the_post();
						 	$wp_query->in_the_loop = true;
						 ?>
                        <div class="post row-fluid mover-der">
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
									<div class="">
								 	<span class='img img-responsive'><img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=255&h=160&a=cr' border=0 /></span>
								 	</div>
								 <?php
								 endif;
								 ?>
                            <div class="post-summary span6">
                                <div class="post-date"><?php the_time( 'j M' ); ?></div>
                                <h1><?php the_title(); ?></h1>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn read-more">Leer Más</a>
                            </div> <!-- Terminar DIV post-summary span6 -->
                        </div> <!-- Terminar DIV post row-fluid mover-der -->
                    <?php 
					endwhile;  //Terminar while de post dentro de BLOG
					wp_reset_query();
					//if (function_exists('wp_pagenavi')):
						//wp_pagenavi( array( 'query' => $blog_query ) );
					//endif; 
					//PAGINACION
					?>
                 </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>