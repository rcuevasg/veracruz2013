<?php get_header(); ?>
<center>
<?php 
$urlTema = get_bloginfo('template_url');
$thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/confirm.png";
 ?>
 <div style="margin-top:5%; margin-bottom:5%;" class="col-lg-12 col-md-12 col-sm-12">
 <span class="img img-responsive">
 <img class="img-responsive" src="<?php echo $thumbnailsrc; ?>" border=0>
 </span>
 </div>
</center>
<?php get_footer(); ?>