<?php
/**
 * The template for displaying all of the posts.
 *
 * @package WordPress
 * @subpackage rtvhome
 * @since rtvhome 1.0
 */
?>

<?php
	//if there is no posts we show up the 404 error
	if (! have_posts() ) :
	?>
		<div id="post-0" class="post error404 not-found">
			<h1 class="entry-title">No encontramos el contenido que buscas</h1>
			<div class="entry-content">
				Hemos realizado algunos cambios en nuestros portales y seguro movimos a otra ubicaci&oacute;n lo que buscas. Te invitamos a usar nuestro buscador para ver d&oacute;nde esta lo que necesitas.
				<p>
				<?php get_search_form(); ?>
			</div><!-- Fin #entry-content -->
		</div><!-- End #post-0 -->
	<?php
	endif;
?>

<?php 
	while( have_posts() ) : the_post(); 
		
		//If is home page or archive or a search result
		if (is_home() || is_archive() || is_search()) :
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php print "Ir a "; the_title(); ?>" rel="bookmark" ><?php the_title(); ?></a></h1>
				<div class="entry entry-excerpt">
					<?php the_excerpt(); ?>
				</div><!-- End of .entry entry-excerpt -->
			</div><!-- End #post-the_ID() -->
			<?php
		else:
			//Everything else
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php print "Ir a "; the_title(); ?>" rel="bookmark" ><?php the_title(); ?></a></h1>
				<div class="entry entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array('before' => '<div class="page-link">P&aacute;ginas: ',
												'after' => '</div>' )); ?>
				</div><!-- End .entry emtry-content -->
				<?php
				//Let's check if comments are open
				if (comments_open()):
					?>
					<div class="entry-meta">
						<span class="comments-link">
						Hay <?php comments_popup_link('0 comentarios', 'Un comentario', '% comentarios'); ?>
						</span><!-- End span .comments-link -->
						<?php edit_post_link('Editar','<span class="meta-sep">|</span><span class="edit-link">','</span>'); ?>
					</div><!-- End .entry-meta -->
					<?php
				endif;
				?>
			</div><!-- End #post-the_ID() -->
			<?php
		endif;
		
		//If comments are open we'll need the comments template
		if (comments_open()):
			comments_template('', true);
		endif;
		
	endwhile;		
?>