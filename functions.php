<?php
/*
Archivo de funciones del tema
*/




/**
 *Functions related to wordpress functionality
 */

/**
 *Textdomain for localization support, with language files in the /lang folder
 */
//load_theme_domain('veracruz2013', TEMPLATEPATH . '/lang');

/*
 *Default content width to 600px
 */
/*if (!isset($conten_width)):
	$conten_width = 600;
endif;*/


/**
 * jquery.js
 *
 * Load up jquery-1.10.2.min.js using the WordPress wp_enqueue_script function
 *
 */

if( !is_admin()){
   wp_deregister_script('jquery');
   wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"), false, '');
   wp_enqueue_script('jquery');
   
   /**
	* jQuery Cycle*/
	//wp_enqueue_script('cycle', get_bloginfo('template_directory').'/js/jquery.cycle.all.js'); 
	
	
	/**
	* Modernizr.js
	* Load up modernizr.min.js using the WordPress wp_enqueue_script function 	*/
	
	//wp_enqueue_script( 'modernizr', get_bloginfo('template_directory').'/js/modernizr.custom.49865.js');
	
	/**
	* My code for lettering*/
	
	//wp_enqueue_script('lettering', get_bloginfo('template_directory').'/js/jquery.lettering-0.6.1.min.js'); 
	
	/**
	* My code for jquery*/
	
	//wp_enqueue_script('mycode', get_bloginfo('template_directory').'/js/mycode.js'); 
	
}


/*
 *Adding theme support fot HTML5
 */
 add_theme_support('html5');

/*
 *Adding theme support for thumbnails
 */
add_theme_support('post-thumbnails');

/*
 *Adding theme support for custom backgrounds
 */
add_theme_support('custom-background');

/**
 *Telling wordpress to add editor style support
 */
add_editor_style();

/**
 *Adding feeds links to the header
 */
add_theme_support('automatic-feed-links');



// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag btn btn-default read-more" title="'.get_the_title($post->ID).'" href="'. get_permalink($post->ID) . '"> Leer m&aacute;s</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 *MENU AREAS
 *Defining a top menu, main menu and bottom menu
 */
register_nav_menus(array(
	'top-menu' => __('Top menu','veracruz2013'),
	'redes-sociales-menu' => __('Redes Sociales menu','veracruz2013'),
	'footer-blog-menu' => __('Footer blog menu','veracruz2013'),
	'footer-gobierno-menu' => __('Footer gobierno menu','veracruz2013'),
	'footer-servicios-menu' => __('Footer servicios menu','veracruz2013'),
	'footer-prensa-menu' => __('Footer prensa menu','veracruz2013'),
	'footer-contacto-menu' => __('Footer contacto menu','veracruz2013')
)
);

/**
 *WIDGETS AREAS
 */
function veracruz2013_widgets_init() {
	// Area 1, located int the header.
	register_sidebar( array(
		'name' => __( 'Buscador Widget Area Header', 'veracruz2013' ),
		'id' => 'buscador-widget-area',
		'description' => __( 'Buscador Widget para el area header.', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 2, located at the top of the sidebar
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'veracruz2013' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'Sidebar widgets on the right column of the page', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 3, first area on the footer
	register_sidebar( array(
		'name' => __( 'First footer widget area', 'veracruz2013' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'First widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 4, second area on the footer
	register_sidebar( array(
		'name' => __( 'Second footer widget area', 'veracruz2013' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Second widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 5, third area on the footer
	register_sidebar( array(
		'name' => __( 'Third footer widget area', 'veracruz2013' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'Third widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 6, first area on the footer
	register_sidebar( array(
		'name' => __( 'Fourth footer widget area', 'veracruz2013' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'Fourth widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 7, first area on the footer
	register_sidebar( array(
		'name' => __( 'Fifth footer widget area', 'veracruz2013' ),
		'id' => 'fifth-footer-widget-area',
		'description' => __( 'Fifth widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 8, first area on the footer
	register_sidebar( array(
		'name' => __( 'Search footer widget area', 'veracruz2013' ),
		'id' => 'search-footer-widget-area',
		'description' => __( 'Search widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Widget para la dirección en el area footer', 'veracruz2013' ),
		'id' => 'direccion-home-widget-area',
		'description' => __( 'Colocar Dirección en el Footer.', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
}

/** Register sidebars by running steady_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'veracruz2013_widgets_init' );

?>