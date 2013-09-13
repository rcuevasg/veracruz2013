<?php
/*
Template Name: Principal page
*/
?>
<?php get_header(); ?>

<section class="container principalContent" id="content-list">
<h1>
<?php
echo get_the_title($post->post_parent);
?>
</h1>
<?php
	$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );

	foreach( $mypages as $page ) {		
		$content = $page->post_content;
		if ( ! $content ) // Check for empty page
			continue;

		$content = strip_tags(apply_filters( 'the_content', $content ));
	?>
    <div class="col-md-6 col-lg-6">
    <?php 
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
								 	<div class="col-sm-4 col-md-4 col-lg-4 pull-left">    
                                    <span class='img img-responsive'>
                                    <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=285&h=175&a=cr' border=0 /></span>
                                    </div>

								 <?php
								 endif;
								 ?>
    <div class="col-sm-7 col-md-7 col-lg-7">
	<h3><?php echo $page->post_title; ?></h3>
		<div class="entry"><?php echo substr($content, 0, 255); ?></div>
        <a href="<?php echo get_page_link( $page->ID ); ?>" class="btn btn-default read-more">Leer más</a>
	
    </div>
    </div>
	<?php
	}	
?>
</section>	
<?php get_footer(); ?>
