<?php
/*
Template Name: Link Page
*/
?>

<?php get_header(); ?>
    <div id="content-list" class="container blog-contenedor">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $my_meta = get_post_meta($post->ID,'_normativa_gaceta',true);?>
        <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="back-img"></div>
        <div class="content-normativa">
                <div class="item-normativa">
                    <?php if($my_meta!=''){ ?>	
						<?php if($my_meta['image_src']!=""){ ?>
                            <img src="<?php echo esc_url($my_meta['image_src']) ?>" class="img-responsive">
                        <?php } ?>
		               	<div class="clear"></div>
                        <?php the_content(); ?>
                        <div class="clear"></div>
                        <br><br>
                        <?php if($my_meta['descripcion_normativa_gaceta']!=""){ ?>
                            <p class="bottom-23" style="font-style:italic;"><?php echo esc_html($my_meta['descripcion_normativa_gaceta']); ?></p>
                        <?php } ?>
                        <div class="clear"></div>
                        <?php if($my_meta['url_normativa_gaceta']!=""){ ?>
                            <center><a href="<?php echo esc_url($my_meta['url_normativa_gaceta']); ?>" class="read-more" target="_blank">VISITAR SITIO</a></center>
                        <?php } ?>
                    <?php } ?>
                </div>    
            
        <?php endwhile; // end of the loop. ?>
        </div>
        <div class="border-solid"></div>
    </div>
    <div class="border-bottom"></div>
<?php get_footer(); ?>