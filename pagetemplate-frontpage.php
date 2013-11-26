<?php
/*
Template Name: Front page
*/
?>
<?php get_header(); ?>
<script language="javascript" type="text/javascript">
	function doclick(linkea){
		location.href=linkea;
	}
	/*valida alto del sidebar*/
	$(window).on( 'load', function(){
		if($('.post-home').height() > $('#sidebar').height()){
			$('.post-home').css('border-right','1px solid #c5c5c5' );
		}else{
			$('#sidebar').css('border-left','1px solid #c5c5c5' );
		}
	});
</script>
<section id="principalContent" class="container">
<div class="col-md-8 col-lg-8 post-home">
<?php
	$categoriaBlog = get_category_by_slug('blog');
	$categoriaBlog = $categoriaBlog->term_id;

	$blog_query = new WP_Query('cat=' . $categoriaBlog . '&showposts=5&post_type=post');//&orderby=menu_order&order=ASC
	while ($blog_query->have_posts()) :
		$blog_query->the_post();
		$wp_query->in_the_loop = true;
		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
		$thumbnailsrc = "";
		$my_metaAling = get_post_meta($post->ID,'_img_alinear',true);
		$nuestroAlinear = "";
		if($my_metaAling['alinear']!=""){			
			$nuestroAlinear = $my_metaAling['alinear'];
			}else{
				$nuestroAlinear = "cr";
				}
			
		if (!empty($domsxe)) {
			$thumbnailsrc = $domsxe->attributes()->src;
			//$thumbnailsrc = substr($thumbnailsrc, strrpos($thumbnailsrc, "/wp-"), strlen($thumbnailsrc));
		} else {
			$urlTema = get_bloginfo('template_url');
			$thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
		}
        if (!empty($thumbnailsrc)):
			$img_data_1000 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=340&h=200";
			$img_data_989 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=660&h=388";
			$img_data_550 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=454&h=239";
			$img_data_310 = get_bloginfo('template_url')."/timthumb.php?src=".$thumbnailsrc."&a=".$nuestroAlinear."&w=310&h=163";
		?>		
              <div class="col-sm-5 col-md-6 col-lg-5 pull-left">    
                <span class='img img-responsive'>
                    <div class="post-date"><?php the_time( 'j M' ); ?></div>
                    <span data-picture data-alt="<?php the_title();?>" class="img img-responsive img-change">
                        <span data-src="<?php echo $img_data_310 ?>"></span>
                        <span data-src="<?php echo $img_data_550 ?>" data-media="(min-width: 550px)"></span>
                     	   <span data-src="<?php echo $img_data_989 ?>" data-media="(min-width: 800px)"></span>
                        <span data-src="<?php echo $img_data_1000 ?>" data-media="(min-width: 990px)"></span> 	
                    </span> 	
                </span>
            </div>
			<?php
        endif;
		?>
		<div class="col-sm-6 col-md-6 col-lg-6 lista-post-home">
            <h3><?php the_title(); ?></h3>
			<?php
			$textoCortar=get_the_excerpt(); 
			echo myTruncate($textoCortar, 160, ' ', '...'); //the_excerpt(); 
			//the_content();
			?>
            <div class="clear"></div>
            <a class="moretag btn btn-default read-more" title="<?php echo get_the_title(); ?>" href="<?php echo get_permalink() ?>">
             Leer m&aacute;s
            </a>
        </div>
        <div class="cls"></div>
    <?php 
    endwhile;  //Terminar while de post dentro de BLOG
    wp_reset_query();
    ?>
    <div class="col-md-6 col-lg-6 col-sm-12 link-style blog-noticias btn btn-default" onClick="doclick('<?php print esc_url(get_category_link($categoriaBlog)) ?>')">
		<?php
            $categoriaBlog = get_category_by_slug('blog');
            $categoriaBlog = $categoriaBlog->term_id;
        ?>
        <a href="<?php print esc_url(get_category_link($categoriaBlog)) ?>">
        	VER TODAS LAS NOTICIAS
        </a>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>