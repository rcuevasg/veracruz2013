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
    <title>
        <?php
            wp_title( '|', true, 'right' ); bloginfo('name'); bloginfo('description');
        ?>
    </title>
    <meta charset="UTF-8">
    <meta content="<?php bloginfo( 'html_type' ) ?>; charset=<?php bloginfo( 'charset' ) ?>" http-equiv="Content-Type" />
    <meta name="description" content="Portal Oficial del Gobierno del Estado de Veracruz">
    <meta name="keywords" content="veraruz, gobierno, javier duarte, adelante, desarrollo, progreso">
    <meta name="author" content="Departamento de Servicios Electrónicos Multicanal - Gobierno Electrónico">
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
    <!--//netdna.bootstrapcdn.com/bootstrap/3.0.0-wip/js/bootstrap.min.js-->
<script src="<?php bloginfo('template_url')?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url')?>/picturefill-master/picturefill.js"></script>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50bb6a904ee20c54"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
			social_tools: '<div id="social" class="addthis_toolbox addthis_default_style" addthis:url=""> <a class="addthis_button_facebook"></a> <a class="addthis_button_twitter"></a> <a class="addthis_button_pinterest_share"></a> <a class="addthis_button_google_plusone_share"></a> <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a><br><br></div>',
			changepicturecallback: function(){ var addthis_share = $('#fullResImage, #pp_full_res iframe').attr('src'); show_url_social(addthis_share); addthis.toolbox("#social"); },
			//ajaxcallback: function() { var addthis_share = $('#fullResImage, #pp_full_res iframe').attr('src'); show_url_social(addthis_share); addthis.toolbox("#social");}
		});
	});
	function show_url_social(url){
		$('#social').attr('addthis:url', url);	
	}
	$(document).ready(function(){
		$( ".navbar-nav  > li " ).mouseover(function() {
			if($(this).find(".sub-menu").length){
				if (!$(this).hasClass("active-sub")){
					$(".active-sub").removeClass("active-sub");
					$(this).addClass("active-sub");
				}
			}
		}).mouseout(function() {
			$(".active-sub").removeClass("active-sub");
		});
	});
</script>
</head>
	<body <?php body_class(); ?>>
		<div class="cover"></div>
        <div class="container" id="page">
			<header id="header" role="banner">
                <section id="topBar" class="container">
                    <hgroup id="site-title" class="col-md-12 col-lg-12 hidden-xs">
                        <?php
                        if ( is_active_sidebar( 'menu-header-home-widget-area' ) ) : ?>
                            <div class="menuHeaderArea col-md-3 col-lg-3 pull-right bottom-neg">
                                <?php dynamic_sidebar( 'menu-header-home-widget-area' ); ?>
                            </div>
                        <?php endif; ?>
                        <h1 >
                        <a href="<?php print home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            <span><?php bloginfo( 'name' ); ?></span>
                            <div class="img-responsive col-md-12 col-lg-12">
                            <img src="<?php bloginfo('template_url') ?>/images/imgHeader.png" border="0" class="img-responsive" />
                            </div>
                        </a>
                        </h1>
                        <h4 ><span><?php bloginfo( 'description' ); ?></span></h4>
                    </hgroup>
                </section>
				<nav id="mainMenu" class="navbar navbar-inverse col-md-12 col-lg-12" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" > 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button> 
                        <center>
                        	<a href="<?php print home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                            	<img src="<?php bloginfo('template_url') ?>/images/logo.png" border="0" class="img-responsive visible-xs" />
                            </a>
                        </center>
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
				<?php if (is_home() || is_front_page() || is_page('pagina_principal')) : ?>
				<section id="mainCarousel" class="container">
				<div id="divCarrusel" class="col-lg-12">
					<div id="carousel-destacados" class="carousel slide col-lg-12" data-interval="4000">
					<div class="carousel-inner">
						<?php
						$categoriaSlider = get_category_by_slug('slider');
						$categoriaSlider = $categoriaSlider->term_id;
						$counterActive = 1;
						      
						 $notasSlider = new WP_Query('cat=' . $categoriaSlider . '&showposts=4&post_type=post&orderby=menu_order&order=ASC');
						 while ($notasSlider->have_posts()) :
						 	$notasSlider->the_post();
						 	$wp_query->in_the_loop = true;
						 	?>
						 	<div class="item <?php if ($counterActive==1) { print 'active'; } ?>">
						 		<?php //Obtenemos la url de la imagen destacada
					    		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
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
                                	<!--<a href="http://tercerinforme.veracruz.gob.mx" target="_blank">-->
                                        <div style="display:inline-block;">
                                            <span class='img img-responsive'><img class="img-responsive" src='<?php print $thumbnailsrc; ?>' border=0 /></span>
                                        </div>
								 	<!--</a>-->
								 <?php
								 endif;
								 ?>
								<div style="display:inline-block;" class="carousel-caption">
									<?php
                                    print "<h4><a href='". get_permalink() ."' title='Ir a ". get_the_title() ."'>" . get_the_title() . "</a></h4>";
									?>
                                    <a class="btn btn-default read-more pull-right" href="<?php print get_permalink(); ?>" title="Leer m&aacute;s de <?php print get_the_title(); ?>">
                                    Leer m&aacute;s
                                    </a>
								</div>
							</div>
								<?php
								$counterActive++;
							endwhile;
						?>
						
					</div>
					
					<div class="carousel-indicators-wrapper">
						<ol class="carousel-indicators">
							<?php $cont_item=0;  while($notasSlider->post_count > $cont_item){ ?>
								<?php if($cont_item == 0){ ?>
                                    <li data-target="#carousel-destacados" data-slide-to="<?php echo $cont_item ?>" class="active"></li>
                                <?php } else{ ?>
                                    <li data-target="#carousel-destacados" data-slide-to="<?php echo $cont_item ?>"></li>
                                <?php } ?>
							<?php $cont_item++; }?>
						</ol>
					</div><!-- end .carousel-indicators-wrapper -->
					<!-- Controls -->
					  <a class="left carousel-control" href="#carousel-destacados" data-slide="prev">
					    <span class="icon-prev"></span>
					  </a>
					  <a class="right carousel-control" href="#carousel-destacados" data-slide="next">
					    <span class="icon-next"></span>
					  </a>
					</div><!-- end #carousel-destacados -->
				</div><!-- end #divCarrusel -->
				</section> <!-- end #mainCarrusel -->
				<?php endif; ?>
				<?php
					if (is_front_page() || is_single() ):
					/* When we call the dynamic_sidebar() function, it'll spit out
					* the widgets for that widget area. If it instead returns false,
					* then the sidebar simply doesn't exist, so we'll hard-code in
					* some default sidebar stuff just in case.
					*/
					if ( is_active_sidebar( 'buscador-widget-area' ) ) : ?>

						<div class="searchHeaderArea col-md-12 col-lg-12">
							<?php //print obtenFechaEspaniol(); ?>
							<?php dynamic_sidebar( 'buscador-widget-area' ); ?>
						</div>
					<?php endif; 
						
					endif;
					?>
			</header>
			<section id="main" role="main" class="row">
