<?php
/*
Template Name: Principal page
*/
?>
<?php get_header(); ?>
<section class="container principalContent">
<div class="tituloPrincipal">
<h1>
<?php the_post_thumbnail(array(250,150)); ?> 
<?php
echo $padre=get_the_title($post->post_parent);
?>
</h1>
</div>
<div class="hr"></div>
<?php
$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );

$contador = count($mypages);
	foreach( $mypages as $page ) {
		$nombreparent = get_the_title($page->post_parent);

		$content = $page->post_content;
		if ( ! $content) // Check for empty page
			continue;
		
		$content = strip_tags(apply_filters( 'the_content', $content ));
if(	$nombreparent==$padre){
	?>
    
    <div class="col-md-6 col-lg-4 contenedor-pages">
    <div class="contenedor-loop">
    <?php 
	$domsxe = simplexml_load_string(get_the_post_thumbnail($page->ID, 'medium'));
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
								 	<div class="contenedor-imagen arriba">
                                    <span class="img img-responsive">
                                    <br>    
                                    <img class="img-responsive" src='<?php print $thumbnailsrc; ?>' border='0' /></span>
                                    </div>

								 <?php
								 //<?php bloginfo('template_url'); ? >/timthumb.php?src=
								 endif;
								 ?>
    <div class="contenedor-paginas post-page-child">
    <br>
	<h3><?php echo $page->post_title; ?></h3>
		<div class="entry"><?php echo substr($content, 0, 100); ?></div>
        <a href="<?php echo get_page_link( $page->ID ); ?>" class="btn btn-default read-more">Ver más</a>
    </div>
    </div>
    </div>
	<?php
}

	}	

?>
</section>	
<?php get_footer(); ?>