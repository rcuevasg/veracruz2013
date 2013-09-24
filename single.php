<?php

get_header(); ?>

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<section id="principalContent"  class="container">
<div class="col-md-8 col-lg-8 post-home single-container">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( is_front_page() ) { ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } else { ?>	
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } ?>
                <?php 
				$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'full'));
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
								 	<div class="arriba">    
                                    <span class='img img-responsive'>
                                   <div class="post-date"><?php the_time( 'j M' ); ?></div>
                                    <img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=700&h=300&a=cr' border=0 /></span>
                                    </div>
									
								 <?php
								 endif;
								 ?>	
                                 <div class="hr"></div>			
					<div class="entry-content col-md-2 col-lg-2">
					<?php include(TEMPLATEPATH . "/includes/shareItemList.php");  ?> 
					</div><!-- .entry-content -->
                    <div class="col-md-10 col-lg-10">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
<div class="navposts">
 <?php if (!get_adjacent_post('', '', true)) : ?>
        <div class="pull-left col-md-4">
        <p>NOTA ANTERIOR</p>
        <?php previous_post_link('&laquo;  %link'); ?>
        </div>
        <div class="pull-right col-md-4">
        <p>NOTA SIGUIENTE</p>
        <?php next_post_link('%link &raquo;'); ?>
        </div>
    <?php else : ?>
        <div class="pull-left col-md-4">
        <p>NOTA ANTERIOR</p>
        <?php previous_post_link('&laquo; %link'); ?>
        </div> 
        <div class="pull-right col-md-4">
        <p>NOTA SIGUIENTE</p>
        <?php next_post_link('%link &raquo;'); ?>
        </div>
</div>
  <?php endif; ?>
</div><!-- end .post-home -->
<?php endwhile; ?>
<?php get_sidebar(); ?>
</section><!--#content-single -->
<?php get_footer(); ?>