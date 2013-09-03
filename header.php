<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage rtvhome
 * @since rtvhome 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * boilerplate_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' ); bloginfo('name'); print " | "; bloginfo('description');
		?></title>
			
	    <meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
	    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" /> 
	    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	    
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		

		
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		
			
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js"></script>
	</head>
	<body <?php body_class(); ?>>
	
		<div class="container" id="page">
				
			<header id="header" role="banner">
				
				<section id="topBar" class="container">
				
					
				<hgroup id="site-title" class="col-md-5 col-lg-5 hidden-xs">
					
					<h1 >
					<a href="<?php print home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<span><?php bloginfo( 'name' ); ?></span>
						<img src="<?php bloginfo('template_url') ?>/images/logo.png" border="0" class="img-responsive" />
					</a>
					</h1>
			  
					<h4 ><span><?php bloginfo( 'description' ); ?></span></h4>
					
				</hgroup>
				
				<?php
					/* When we call the dynamic_sidebar() function, it'll spit out
					* the widgets for that widget area. If it instead returns false,
					* then the sidebar simply doesn't exist, so we'll hard-code in
					* some default sidebar stuff just in case.
					*/
					if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>

						<div class="searchHeaderArea col-md-7 col-lg-7 pull-right">
							<?php //print obtenFechaEspaniol(); ?>
							<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
						</div>
					<?php endif; ?>
				
				</section>
				
				<nav id="mainMenu" class="navbar navbar-inverse col-md-12 col-lg-12" role="navigation">
						<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" > 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button> 
						<center><img src="<?php bloginfo('template_url') ?>/images/logo.png" border="0" class="img-responsive visible-xs" /></center>
						</div>
					<?php
					//Checks if there is something on top-menu
					if (has_nav_menu('top-menu')):
						//If so, adds it to the page
						wp_nav_menu(array('menu'=>'Top menu',
										'container'=>'div',
										'container_class'=>'collapse navbar-collapse navbar-ex1-collapse',
										'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>',
										'theme-location'=>'top-menu'));
					endif; 
					?>
				</nav>
				
				<section id="mainCarousel" class="container">
				
				<div id="divCarrusel" class="col-lg-12">

					<div id="carousel-destacados" class="carousel slide col-lg-12" data-interval="2000">

					
					<div class="carousel-inner">
						<?php
						$categoriaSlider = get_category_by_slug('slider');
						$categoriaSlider = $categoriaSlider->term_id;
						      
						 $notasSlider = new WP_Query('cat=' . $categoriaSlider . '&showposts=3&post_type=post');
						 while ($notasSlider->have_posts()) :
						 	$notasSlider->the_post();
						 	$wp_query->in_the_loop = true;
						 	?>
						 	<div class="item active">
						 		<?php //Obtenemos la url de la imagen destacada
					    		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
					    		$thumbnailsrc = "";
					    		if (!empty($domsxe)) {
						    		$thumbnailsrc = $domsxe->attributes()->src;
						    		$thumbnailsrc = substr($thumbnailsrc, strrpos($thumbnailsrc, "/wp-"), strlen($thumbnailsrc));
						    	} else {
							    	$urlTema = get_bloginfo('template_url');
							    	$thumbnailsrc = substr($urlTema, strrpos($urlTema, "/wp-") , strlen($urlTema)) . "/images/imgDefault.png";
							    }
							   
								if (!empty($thumbnailsrc)):
								?>
									<div class="">
								 	<span class='img img-responsive'><img class="img-responsive" src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=1100&h=330' border=0 /></span>
								 	</div>
								 <?php
								 endif;
								 ?>
				
								<div class="carousel-caption">
								<?php
								print "<h4><a href='". get_permalink() ."' title='Ir a ". get_the_title() ."'>" . get_the_title() . "</a></h4>";
								?>
								<a class="btn btn-default read-more" href="<?php print get_permalink(); ?>" title="Leer m&aacute;s de <?php print get_the_title(); ?>">Leer m&aacute;s</a>
								</div>
							</div>
								<?php
							endwhile;
						?>
						
					</div>
					
					<div class="carousel-indicators-wrapper">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
						<div class="border-indicators"></div>
					</div>
					
					</div><!-- end #carousel-destacados -->

				</div><!-- end #divCarrusel -->
				
				</section> <!-- end #mainCarrusel -->
	
			</header>
			

			<section id="main" role="main" class="row">
			
