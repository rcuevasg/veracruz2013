<?php
/*
Template Name: Poderes del estado
*/
?>
<?php get_header(); ?>
    <div id="content-list" class="container blog-contenedor">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $my_meta = get_post_meta($post->ID,'_poderes',true); ?>
        
        <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="back-img"></div>
        <div class="content-poderes">
				<?php 
                if($my_meta!=''){ 
                    foreach($my_meta['poderes'] as $poder){  ?>
                        <div class="item-poder">	
                            <?php if($poder['image_src']!=""){ ?>
                                <img src="<?php echo esc_url($poder['image_src']) ?>" class="img-responsive">
                            <?php } ?>
                            <div class='title-poder'>
                                <?php if($poder['titulo']!=""){ ?>
                                    <?php echo $poder['titulo']; ?>
                                <?php } ?>
                            </div>
                            <div class="descripcion-poder">
                                <?php if($poder['Descripcion']!=""){ ?>
                                    <?php echo $poder['Descripcion']; ?>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                            <?php if($poder['url_poder']!=""){ ?>
                                <center><a href="<?php echo esc_url($poder['url_poder']); ?>" class="read-more" target="_blank">VISITAR SITIO</a></center>
                            <?php } ?>
                        </div>    
                <?php }
                }
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="border-solid"></div>
    </div>
<div class="border-bottom"></div>
<?php get_footer(); ?>