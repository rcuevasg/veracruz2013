<?php
/*
Template Name: Dependencias page
*/
?>
<?php get_header(); ?>
<script language="javascript" type="text/javascript">
function doclick(linkea){
	location.href=linkea;
	}
</script>
<section class="container principalContent" id="content-list">
<div class="tituloSingleArea">
<h2>
<?php
echo get_the_title();//$post->post_parent
?>
</h2>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 contenedor-pages">
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="back-img"></div>
<div class="col-md-12 col-lg-12">

					<div class="imagen-dependencias">
					<?php 
						if ( has_post_thumbnail() ) { 
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->post->ID), 'full'); 
						   echo "<img class='img-responsive' src='".$large_image_url[0]."' alt=''>";
						}
					?>    
                    </div>
    <div class="text-dependencias">
<div class="content-dependencia"> <h3><?php echo get_the_title();//$post->post_parent	?></h3></div>
   	<?php the_content(); ?>
<div class="listado-categorias-comunicados col-md-12 col-lg-12">
<table align="center" class="col-md-12 col-lg-12">
<?php
$category_id = get_cat_ID('Dependencias');
//$categories = get_categories('child_of=$category_id'); 	
$args = array(
  'show_option_all'    => '',
  'order' => 'DESC',
  'hide_empty'         => 0,
  'hierarchical'       => 1,
  'exclude'            => '5038', //id category verecruz
  'parent' => $category_id
  );
$categories = get_categories( $args );
foreach ( $categories as $category ) {
	?>
	<div class="categorias-hover">
	<tr class="categorias-hover-tr" onclick="doclick('<?php echo get_category_link( $category->term_id ); ?>')">
	<td class="flecha-verde">&nbsp;</td>
	<td class="link-hover" style="padding-right: 6%; text-align: center; font-size: 1.500em;"><br><?php echo $category->name; ?><br><br></td>
	<td><br><?php echo $category->description; ?><br><br></td>
	</tr>
	</div>
    <?php
	
}
				 
?>
</table>
</div>
  	</div>
</div>
 <?php endwhile; endif; ?>
</div>
</section>
    <div class="border-bottom"></div>
<?php get_footer(); ?>