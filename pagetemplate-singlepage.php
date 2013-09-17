<?php
/*
Template Name: Single page
*/
?>
<?php get_header(); ?>
<section class="container principalContent" id="content-list">
<div class="col-sm-12 col-md-12 col-lg-12">
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="tituloSingleArea">
<h2>
<?php
echo get_the_title($post->post_parent);
?>
</h2>
</div>
<?php
  $mykey_values = get_post_custom_values('nombre');
  foreach ( $mykey_values as $key => $value ) {
    ?>
    <div class="single-nombre">
    <?php
	echo "$value"; 
	?>
    </div>
    <?php
  }
?>
<div class="single-nombre">
<span class="titulo-single-redes">Síguele en:</span>
<ul id="single-redes" class="menu">
<?php
  $mykey_valuesRed = get_post_custom_values('redesSociales');
  $conta=0;
  foreach ( $mykey_valuesRed as $keyRed => $valueRed ) {
	  $claseIcon="";
	  $cadenaF="facebook";
	  if(strstr($valueRed,$cadenaF)){
		  	  $claseIcon="iconFacebook";
		  }
	  $cadenaT="twitter";
	  if(strstr($valueRed,$cadenaT)){
		  	  $claseIcon="iconTwitter";
		  }
	  $cadenaY="youtube";
	  if(strstr($valueRed,$cadenaY)){
		  	  $claseIcon="iconYoutube";
		  }
	  $cadenaP="pinterest";
	  if(strstr($valueRed,$cadenaP)){
		  	  $claseIcon="iconPinterest";
		  }
	  $cadenaG="plus";
	  if(strstr($valueRed,$cadenaG)){
		  	  $claseIcon="iconPlus";
		  }
		
	
    ?>
<li class="<?php echo $claseIcon; ?>">
<a target="_blank" href="<?php echo "$valueRed"; ?>">
<span>Facebook</span>
</a>
</li>
    <?php
  }
?>
</ul>
</div>
<div class="col-md-12 col-lg-12 post-home">
    <div class='col-sm-3 col-md-3 col-lg-3 pull-left single-img'>
    <?php the_post_thumbnail(); ?> 
    </div>
  <div class="entrytext">
   <?php the_content(); ?>
  </div>
</div>
 <?php endwhile; endif; ?>
</div>
</section>
<?php get_footer(); ?>