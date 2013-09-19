<?php
/*
Template Name: Semblanza page
*/
?>
<?php get_header(); ?>
<section class="container principalContent" id="content-list">
<div class="col-sm-12 col-md-12 col-lg-12 contenedor-pages">
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="tituloSingleArea">
<h2>
<?php
echo get_the_title();//$post->post_parent
?>
</h2>
</div>
<?php
  $nombre = get_post_meta($post->ID, 'nombre', true);
  $secretaria = get_post_meta($post->ID, 'nombre-dependencia', true);
  if($nombre || $secretaria){
    ?>
    <div class="single-nombre">
    <?php
	echo "$nombre"."<br>"."$secretaria"; 
	?>
    </div>
   <?php }?>

<?php 
$facebook = get_post_meta($post->ID, 'url-facebook', true);
$twitter = get_post_meta($post->ID, 'url-twitter', true);
$youtube = get_post_meta($post->ID, 'url-youtube', true);
$pinterest = get_post_meta($post->ID, 'url-pinterest', true);
$plus = get_post_meta($post->ID, 'url-plus', true);
  if($facebook || $twitter || $youtube || $pinterest || $plus){
?>
<div class="single-siguele">
<span class="titulo-single-redes">Síguele en:</span>
<ul id="single-redes" class="menu">
<?php
  
	  if($facebook){
			  ?>
<li class="iconFacebook">
<a target="_blank" href="<?php echo "$facebook"; ?>">
<span>Facebook</span>
</a>
</li>
		<?php
		  }
	 if($twitter){
	?>
<li class="iconTwitter">
<a target="_blank" href="<?php echo "$twitter"; ?>">
<span>Twitter</span>
</a>
</li>
	<?php	 
	 }
	  if($youtube){
	?>
<li class="iconYoutube">
<a target="_blank" href="<?php echo "$youtube"; ?>">
<span>YouTube</span>
</a>
</li>
	<?php	  	  
		  }
	if($pinterest){
		?>
<li class="iconPinterest">
<a target="_blank" href="<?php echo "$pinterest"; ?>">
<span>Pinterest</span>
</a>
</li>	
		<?php
		}
	  if($plus){
		  ?>
<li class="iconPlus">
<a target="_blank" href="<?php echo "$plus"; ?>">
<span>Pinterest</span>
</a>
</li>		  
		  <?php
		  }
    ?>
</ul>
</div>
<?php }?>
<div class="col-md-12 col-lg-12 post-home">
    <div class='col-sm-5 col-md-4 col-lg-4 pull-left single-img'>
    <?php 
	$imagen = get_post_meta($post->ID, 'imagen', true);
	if($imagen){
	?>	
		<span class='img img-responsive'>
        <img class="img-responsive" src="<?php echo $imagen; ?>?w=250&h=300&a=cr" border=0 />
        </span>
		<?php }
	?>
    </div>
  <div class="entrytext">
   <?php the_content(); ?>
  </div>
</div>
 <?php endwhile; endif; ?>
</div>
</section>
<?php get_footer(); ?>