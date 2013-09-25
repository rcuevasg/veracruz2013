<?php
/*
Template Name: Dependencias page
*/
?>
<?php get_header(); ?>
<section class="container principalContent" id="content-list">
<div class="col-sm-12 col-md-12 col-lg-12 contenedor-pages">
<?php if (have_posts()) : while (have_posts()) : the_post();?>
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
    <h3><?php echo get_the_title();//$post->post_parent	?></h3>
   	<?php the_content(); ?>
<div class="listado-categorias-comunicados">
<table align="center">
<?php
$category_id = get_cat_ID('Comunicados');
//$categories = get_categories('child_of=$category_id'); 	
$args = array(
  'show_option_all'    => '',
  'order' => 'DESC',
  'hide_empty'         => 0,
  'hierarchical'       => 1,
  'parent' => $category_id
  );
$categories = get_categories( $args );
foreach ( $categories as $category ) {
	echo '<div class="categorias-hover">';
	echo '<tr class="categorias-hover-tr">';
	echo '<td class="flecha-verde"></td>';
	echo '<td class="link-hover"><br><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br><br></td>';
	echo '<td><br>'.$category->description.'<br><br></td>';
	echo '</tr>';
	echo '</div>';
	
}
				 
?>
</table>
</div>
  	</div>
</div>
 <?php endwhile; endif; ?>
</div>
</section>
<div class="hr"></div>
<?php get_footer(); ?>