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
	wp_enqueue_script('typeface', get_bloginfo('template_directory').'/js/typeface-0.15.js');
	wp_enqueue_script('typeface', get_bloginfo('template_directory').'/js/trajan_pro_bold.typeface.js');
	wp_enqueue_script('typeface', get_bloginfo('template_directory').'/js/gandhi_serif_regular.typeface.js');
	wp_enqueue_script('mycode', get_bloginfo('template_directory').'/js/mycode.js'); 
	
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
	return '<div class="clear"></div><a class="moretag btn btn-default read-more" title="'.get_the_title($post->ID).'" href="'. get_permalink($post->ID) . '"> Leer m&aacute;s</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 *MENU AREAS
 *Defining a top menu, main menu and bottom menu
 */
register_nav_menus(array(
	'top-menu' => __('Top menu','veracruz2013'),
	'idioma-contacto-menu' => __('Contacto e idioma menu','veracruz2013'),
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
		'name' => __( 'Widget para la direccion en el footer', 'veracruz2013' ),
		'id' => 'copyright-footer',
		'description' => __( 'Colocar en el sidebar copyright footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container-copyright %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Widget para el menu del header', 'veracruz2013' ),
		'id' => 'menu-header-home-widget-area',
		'description' => __( 'Colocar el menu del header', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'veracruz2013_widgets_init' );
/** Register sidebars by running steady_widgets_init() on the widgets_init hook. */

/*Declarando tamaño de imagenes*/
add_image_size('img-sidebar', 249 , 153, true);
add_image_size('img-gabinete', 204 , 223, true);
add_image_size('img-single-sidebar', 286 , 158, true);
add_image_size('img-medios-detacado', 256 , 256, true);


include_once 'metaboxes/setup.php';
include_once 'metaboxes/functions-meta.php';

    // Register Custom Taxonomy
function cets_media_tags_init()  {
    $labels = array(
        'name'                       => _x( 'Media Tags', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Media Tag', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Media Tags', 'text_domain' ),
        'all_items'                  => __( 'All Media Tags', 'text_domain' ),
        'parent_item'                => __( 'Parent Media Tag', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Media Tag:', 'text_domain' ),
        'new_item_name'              => __( 'New Media Tag', 'text_domain' ),
        'add_new_item'               => __( 'Add New Media Tag', 'text_domain' ),
        'edit_item'                  => __( 'Edit Media Tag', 'text_domain' ),
        'update_item'                => __( 'Update Media Tag', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Media Tags with commas', 'text_domain' ),
        'search_items'               => __( 'Search Media Tags', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Media Tags', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used Media Tags', 'text_domain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
        'update_count_callback'      => '_update_generic_term_count',
        'query_var'                  => false,
        'rewrite'                    => false,
    );

    register_taxonomy( 'media-tags', 'attachment', $args );
}

// Hook into the 'init' action
add_action( 'init', 'cets_media_tags_init', 0 );

//next child page
function siblings($link) {
    global $post;
    $siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent);
    foreach ($siblings as $key=>$sibling){
        if ($post->ID == $sibling->ID){
            $ID = $key;
        }
    }
    $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));
	$title_after = get_the_title($siblings[$ID+1]->ID);
	$title_before = get_the_title($siblings[$ID-1]->ID);
    $data_link=array();
	echo $post->ID ."=>". $siblings[$ID+1]->ID. "<br>";
	
	if ($link == 'after' && $siblings[$ID+1]->ID != '') { 
		$data_link['after'] = $closest[$link];
		$data_link['title_after'] = $title_after;
		$data_link['text_aft'] = "<img src='".get_bloginfo('template_url')."/images/flecha-left.png'>";
		return $data_link;
	} elseif($link == 'before' && $siblings[$ID-1]->ID != '') { 
		$data_link['before'] = " ".$closest[$link];
		$data_link['title_before'] = $title_before;
		$data_link['text_bef'] = "<img src='".get_bloginfo('template_url')."/images/flecha-right.png'>";
		return $data_link;
	}else{
		return $closest;
	}
}

function guias(){
	$img_custom=wp_get_attachment_image_src( $_POST['id_attachment'], 'img-sidebar' );
	$img_full=wp_get_attachment_image_src( $_POST['id_attachment'], 'full' );
	echo $img_custom[0];
	die(); 
}
add_action('wp_ajax_guias', 'guias');
add_action('wp_ajax_nopriv_guias', 'guias');  

function get_video_ajax(){
	$query = new WP_Query( 'p='.$_POST['post_id'] );
	if ( $query->have_posts() ) :
		while ($query->have_posts()):$query->the_post(); 
				$link = get_post_meta($query->post->ID, 'Video_youtube' , true); 
				echo "<div class='col-md-8 video-container'>";
					$pieces=explode('=',$link);
					echo "<iframe width='598' height='330' src='http://www.youtube.com/embed/".end($pieces)."?rel=0&amp;wmode=transparent' frameborder='0' allowfullscreen></iframe>";
				echo "</div>";
				echo "<div class='col-md-4 padding-30'>";
					echo "<h6 class='date'>";
						echo "<span id='fecha-variable' class='text'>". get_the_time( 'j M' ) ."</span>";
						echo "<span class='border'></span>";
					echo "</h6>";
					echo "<h3 class='titulo'>". get_the_title() ."</h3>";
					echo "<div id='contenido'>";
						 the_excerpt();
					echo "</div>";
				echo "</div>";
	endwhile; endif; 
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_video_ajax', 'get_video_ajax');
add_action('wp_ajax_nopriv_get_video_ajax', 'get_video_ajax');

function get_more_post(){
	$query = new WP_Query( 'p='.$_POST['post_id'] );
	if ( $query->have_posts() ) :
		while ($query->have_posts()):$query->the_post(); 
				/*$link = get_post_meta($query->post->ID, 'Video_youtube' , true); 
				echo "<div class='col-md-8 video-container'>";
					$pieces=explode('=',$link);
					echo "<iframe width='598' height='330' src='http://www.youtube.com/embed/".end($pieces)."?rel=0&amp;wmode=transparent' frameborder='0' allowfullscreen></iframe>";
				echo "</div>";
				echo "<div class='col-md-4 padding-30'>";
					echo "<h6 class='date'>";
						echo "<span id='fecha-variable' class='text'>". get_the_time( 'j M' ) ."</span>";
						echo "<span class='border'></span>";
					echo "</h6>";
					echo "<h3 class='titulo'>". get_the_title() ."</h3>";
					echo "<div id='contenido'>";
						 the_excerpt();
					echo "</div>";
				echo "</div>";*/
				the_title();
	endwhile; endif; 
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_more_post', 'get_more_post');
add_action('wp_ajax_nopriv_get_more_post', 'get_more_post');
?>