<?php

get_header(); ?>

<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

<div id="content">


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( is_front_page() ) { ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } else { ?>	
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } ?>
					<div class="entry-content">
						<!-- extracto -->
                    	<h2 class="excerpt"><?php $pbasExtracto = strip_tags(get_the_excerpt()); ?>
                        <?php print substr($pbasExtracto, 0, strpos($pbasExtracto, "Leer m&aacute;s")); ?><span></span></h2>
                        <!-- /extracto -->
                        
						<?php the_content(); ?>
						
						<?php edit_post_link( __( 'Editar', 'rtvhome' ), '', '' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

<?php endwhile; ?>

</div><!--#content-->

<?php //get_sidebar(); ?>

<?php get_footer(); ?>