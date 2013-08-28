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
				
				<section id="topBar">
					<?php
					/* When we call the dynamic_sidebar() function, it'll spit out
					* the widgets for that widget area. If it instead returns false,
					* then the sidebar simply doesn't exist, so we'll hard-code in
					* some default sidebar stuff just in case.
					*/
					if ( is_active_sidebar( 'weather-widget-area' ) ) : ?>

						<div class="weatherArea">
							<?php //print obtenFechaEspaniol(); ?>
							<?php dynamic_sidebar( 'weather-widget-area' ); ?>
						</div>
					<?php endif; ?>
				</section>
					
				<section id="mainCarousel">
				<hgroup id="site-title">
					
					<?php
					//Checks if there is something on top-menu
					/*if (has_nav_menu('top-menu')):
						//If so, adds it to the page
						wp_nav_menu(array('menu'=>'Top menu',
										'container'=>'div',
										'container-class'=>'top-menu',
										'theme-location'=>'top-menu'));
					endif; */
					?>
				
					<h1>
					<a href="<?php print home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<span><?php bloginfo( 'name' ); ?></span>
					</a>
					</h1>
			  
					<h2><span style="visibility:hidden;"><?php bloginfo( 'description' ); ?></span></h2>
					
				</hgroup>
				</section>
				
				<nav>
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
	
			</header>
			

			<section id="main" role="main" class="row">
			
