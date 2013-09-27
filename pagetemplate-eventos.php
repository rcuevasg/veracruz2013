<?php
/*
Template Name: Eventos especiales
*/
?>
<?php get_header(); ?>
    <div id="content-list" class="container ">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $my_meta = get_post_meta($post->ID,'_eventos',true); ?>
        <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="back-img"></div>
        <div class="content-eventos">
				<div class="img-tumb">
					<?php 
						if ( has_post_thumbnail() ) { 
						   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'full'); 
						   echo "<img class='img-evento img-responsive' src='".$large_image_url[0]."' alt=''>";
						}
					?>
                </div>
                <table>
				<?php 
                if($my_meta!=''){ 
                    foreach($my_meta['eventos'] as $evento){  ?>
                        <tr>                  
                            <td class="col-xs-6 col-sm-4 col-lg-4">
                            	<?php if($evento['image_src']!=""){ ?>
                                	<img src="<?php echo esc_url($evento['image_src']) ?>" class="img-responsive">
                            	<?php } ?>
                            </td>
                            <td class="col-xs-12 col-md-8">
                                <div class='title-evento'>
                                <?php if($evento['name_evento']!=""){ ?>
                                    <?php echo $evento['name_evento']; ?>
                                <?php } ?>
                                <?php if($evento['url_evento']!=""){ ?>
                                    <a href="<?php echo esc_url($evento['url_evento']); ?>" class="read-more" target="_blank">VISITAR SITIO</a>
                                <?php } ?>
                                </div>
                            </td>
                        </tr>
                <?php }
                }
                ?>
                </table>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
<?php get_footer(); ?>