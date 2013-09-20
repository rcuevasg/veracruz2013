<?php
/*
Template Name: Normativa Vigente
*/
?>

<?php get_header(); ?>
    <div id="content-list" class="container ">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $my_meta = get_post_meta($post->ID,'_normativa',true); ?>
        <div class="tituloSingleArea">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="content-poderes">
			<?php if($my_meta!=''){ ?>
                <div class="item-poder">	
                    <div class="clear"></div>
                    <?php if($poder['url_normativa']!=""){ ?>
                        <center><a href="<?php echo esc_url($poder['url_normativa']); ?>" class="read-more" target="_blank">VISITAR SITIO</a></center>
                    <?php } ?>
                </div>    
            <?php } ?>
        <?php endwhile; // end of the loop. ?>
        </div>
        <div class="border-solid"></div>
    </div>
<?php get_footer(); ?>