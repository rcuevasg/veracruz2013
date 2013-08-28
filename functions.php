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
//load_theme_domain('rtv-home', TEMPLATEPATH . '/lang');

/*
 *Default content width to 600px
 */
if (!isset($conten_width)):
	$conten_width = 600;
endif;

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

/**
 *MENU AREAS
 *Defining a top menu, main menu and bottom menu
 */
register_nav_menus(array(
	'top-menu' => __('Top menu','rtv-home'),
	'bottom-menu' => __('Bottom menu', 'rtv-home')
)
);

/**
 *WIDGETS AREAS
 */
function rtvhome_widgets_init() {
	// Area 1, located int the header.
	register_sidebar( array(
		'name' => __( 'Weather Widget Area', 'rtv-home' ),
		'id' => 'weather-widget-area',
		'description' => __( 'Weather widget area on the header', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 2, located at the top of the sidebar
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'rtv-home' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'Sidebar widgets on the right column of the page', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 3, first area on the footer
	register_sidebar( array(
		'name' => __( 'First footer widget area', 'rtv-home' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'First widget area on the footer', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 4, second area on the footer
	register_sidebar( array(
		'name' => __( 'Second footer widget area', 'rtv-home' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Second widget area on the footer', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 5, third area on the footer
	register_sidebar( array(
		'name' => __( 'Third footer widget area', 'rtv-home' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'Third widget area on the footer', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 6, first area on the footer
	register_sidebar( array(
		'name' => __( 'Fourth footer widget area', 'rtv-home' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'Fourth widget area on the footer', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 7, first area on the footer
	register_sidebar( array(
		'name' => __( 'Fifth footer widget area', 'rtv-home' ),
		'id' => 'fifth-footer-widget-area',
		'description' => __( 'Fifth widget area on the footer', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 8, TVMAS en linea area para el home
	register_sidebar( array(
		'name' => __( 'TVMas En Linea HOME widget area', 'rtv-home' ),
		'id' => 'tvmas-home-widget-area',
		'description' => __( 'TVMas en linea, area de widget en home', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 9, RADIOMAS en linea area para el home
	register_sidebar( array(
		'name' => __( 'RadioMas En Linea HOME widget area', 'rtv-home' ),
		'id' => 'radiomas-home-widget-area',
		'description' => __( 'RadioMas en linea, area de widget en home', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 10, Sintonizanos area para el home
	register_sidebar( array(
		'name' => __( 'Sintonizanos HOME widget area', 'rtv-home' ),
		'id' => 'sintonizanos-home-widget-area',
		'description' => __( 'Sintonizanos, area de widget en home', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 11, Boletin y encuesta area para el home
	register_sidebar( array(
		'name' => __( 'Boletin y encuesta HOME widget area', 'rtv-home' ),
		'id' => 'boletinencuesta-home-widget-area',
		'description' => __( 'Boletin encuesta, area de widget en home', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 12, Dirección del canal
	register_sidebar( array(
		'name' => __( 'Direccion Footer widget area', 'rtv-home' ),
		'id' => 'direccion-home-widget-area',
		'description' => __( 'Direccion de RTV, area de widget en home', 'rtv-home' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}

/** Register sidebars by running steady_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'rtvhome_widgets_init' );

?>