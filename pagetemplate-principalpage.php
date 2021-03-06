<?php
/*
Template Name: Principal page
*/
?>
<?php get_header(); ?>
<div class="clear"></div>
<div class="contine-principales">
<section class="container principalContent contenedorTituloPrincipal">
<div class="tituloPrincipal">
<h1>
<span><?php the_post_thumbnail(array(250,150)); ?> </span>
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

		$content = $page->post_excerpt;
		if ( ! $content) // Check for empty page
			continue;
		
		//$content = strip_tags(apply_filters( 'the_excerpt', $content ));
if(	$nombreparent==$padre){
	?>
    
    <div class="col-md-6 col-lg-4 contenedor-pages" style="margin-top:0%;">
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
		<div class="entry">
		<?php 
		echo myTruncate($content, 80, ' ', ' '); //the_excerpt(); 
		//echo substr($content, 0, 80)."..."; 
		?></div>
        <?php 
		$pageActual=$page->post_title;
		if($pageActual=="Educación"){
			?>
			<a href="http://www.sev.gob.mx/" target="_blank" class="btn btn-default read-more">Ver más</a>
			<?php }else if($pageActual=="Oficina Virtual de Hacienda"){
				?>
                <a href="http://ovh.veracruz.gob.mx/ovh/index.jsp" target="_blank" class="btn btn-default read-more">Ver más</a>
                <?php
			}else{
		?>
        <a href="<?php echo get_page_link( $page->ID ); ?>" class="btn btn-default read-more">Ver más</a>
        <?php } ?>
    </div>
    </div>
    </div>
	<?php
}

	}	

?>
</section>	
</div>
<div class="hr"></div>
<?php get_footer(); ?>