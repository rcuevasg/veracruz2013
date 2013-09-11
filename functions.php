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
		'id' => 'menu-header-home-widget-area',
		'description' => __( 'Colocar en el sidebar copyright footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
}
/** Register sidebars by running steady_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'veracruz2013_widgets_init' );


/*---Add custom post type, custom taxonomies and postmeta---*/
/*
if (!function_exists('init_custom_type')) {
	add_action('init', 'init_custom_type');
	function init_custom_type(){
		$labels = array(
			'name' => 'Sala de prensa',
			'singular_name' => 'Sala de prensa',
			'add_new' => 'Agregar entrada',
			'add_new_item' => 'Agregar nueva entrada',
			'edit_item' => 'Editar entrada',
			'new_item' => 'Nueva entrada',
			'view_item' => 'Ver entrada',
			'search_items' => 'Buscar entradas',
			'not_found' =>  'No se encontraron entradas',
			'not_found_in_trash' => 'No hay entradas en la papelera', 
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'query_var' => true,
			'rewrite' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'register_meta_box_cb' => 'add_prensa_metaboxes',
			'hierarchical' => false,
			'menu_position' => null,
			'taxonomies' => array('medios'),
			'supports' => array('title','editor','thumbnail'),
		); 
		register_post_type('prensa',$args);
	}
  	add_action( 'init', 'build_taxonomies', 0 ); 
	function build_taxonomies() {
		register_taxonomy('medios', 'prensa', array('hierarchical' => true, 'label' => 'Categorías', 'query_var' => true, 'rewrite' => true));
	}
	
	function add_prensa_metaboxes(){
			add_meta_box('media_info', 'Agregar o editar Video en Youtube', 'media_info', 'post', 'normal', 'default');
	}
	
	function media_info(){
		global $post;
		echo '<input type="hidden" name="media_noncename" id="endeavor_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'" />';
		$int1 = get_post_meta($post->ID, '_link_youtube', true);
		echo'
			<div class="my_meta_control">
				<p>Agregar Liga de youtube</p>
				<input type="text" name="_link_youtube" value="'.$int1.'" class="widefat" />
				<span>Ejem. http://www.youtube.com/watch?v=qqXi8WmQ_WM </span>
			</div>';
	}
	function wpt_save_post_meta($post_id, $post) {
		if(!wp_verify_nonce($_POST['media_noncename'], plugin_basename(__FILE__))){
			return $post->ID;
		}
		if(!current_user_can('edit_post', $post->ID))
			return $post->ID;
		$type=$_POST['post_type'];	
		switch($type){
			case 'prensa':
				$media_meta['_link_youtube'] = $_POST['_link_youtube'];
			break;
		}
		foreach ($media_meta as $key => $value) {
			$value = implode(',', (array)$value);
			if(get_post_meta($post->ID, $key, FALSE)) {
				update_post_meta($post->ID, $key, $value);
			} else { 
				add_post_meta($post->ID, $key, $value);
			}
			if(!$value) delete_post_meta($post->ID, $key);
		}
	}
	add_action('save_post', 'wpt_save_post_meta',1,2);
}
*/
/*---End add custom post type, custom taxonomies and postmeta---*/

add_image_size('img-sidebar', 249 , 153, true);

add_action('admin_print_scripts', 'admin_setup');
function admin_setup() {
		wp_enqueue_media();
        // Register, localize and enqueue our custom JS.
        wp_register_script( 'tgm-nmp-media', get_bloginfo('template_url').'/js/image-widget.js', true );
        wp_localize_script( 'tgm-nmp-media', 'tgm_nmp_media',
            array(
                'title'     => __( 'Upload or Choose Your Custom Image File', 'tgm-nmp' ), // This will be used as the default title
                'button'    => __( 'Insert Image into Input Field', 'tgm-nmp' )            // This will be used as the default button text
            )
        );
        wp_enqueue_script( 'tgm-nmp-media' );
}


/*Widget 4- single*/
class Widget_medios extends WP_Widget {
	function metabox() {
		echo '<div id="tgm-new-media-settings">';
			echo '<p><strong>' . __( 'Por favor agrege su banner aqui', 'vrz' ) . '</strong></p>';
			echo '<p><a href="#" class="tgm-open-media button" title="' . esc_attr__( 'Subir Imagen', 'vrz' ) . '">' . __( 'Subir Imagen', 'vrz' ) . '</a></p>';
			echo '<img src="" id="img-src" width="250">';
			echo '<p><label for="tgm-new-media-image">' . __( 'Imagen ', 'vrz' ) . '</label> <input type="text" id="tgm-new-media-image" size="70" value="" /></p>';
		echo '</div>';
	}
	function Widget_medios() {
		$widget_ops = array( 'classname' => 'widget_medios', 'description' => __('Widget para medios en sidebar main','vrz') );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'medios-wt' );
		$this->WP_Widget( 'medios-wt', __('Widget de texto | Single', 'vrz'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$ima2 = $instance['ima2'];
		$name = $instance['name'];
		$archivo2 = $instance['archivo2'];		
		echo $before_widget;
		
		if ( $name )
			echo "<div id='item-curso'>";
                  	if($ima2==''){ 
                        	echo "<img src='".get_bloginfo('template_url')."/images/ima-conoce-default.png' width='64' height='64'>";
                     } else{ 
                     		echo '<img src="'.$ima2.'" width="64" height="64"/>';
					 }
			echo "<div id='text-curso'>";		 
                     
					 echo "<h3>".$title."</h3>";								
				  	 echo "<p>".$name."</p>";
					 echo "<a target='_blank' href='".$archivo2."'>» Descargar Archivo</a>";
					 echo "</div>";
            echo "</div>";
			echo "<div class='clear'></div>";
	
	echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['ima2'] = strip_tags( $new_instance['ima2'] );
		$instance['archivo2'] = strip_tags( $new_instance['archivo2'] );

		return $instance;
	}

	function form( $instance ) {

		$defaults = array( 'title' => __('', 'spc'), 'name' => __('Escribe el contenido del widget', 'spc'), 'ima2' => __('', 'spc'));
		$instance = wp_parse_args( (array) $instance, $defaults );
		$this->metabox();
		?>

	<?php
	}
}
add_action( 'widgets_init', 'load_widgets' );
function load_widgets() {
	register_widget( 'Widget_medios' );
}

?>