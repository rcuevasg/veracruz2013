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
   wp_register_script('jquery', (get_bloginfo('template_directory').'/js/jquery.min.js'), false, '');
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
	/*wp_enqueue_script('typeface', get_bloginfo('template_directory').'/js/typeface-0.15.js');
	wp_enqueue_script('typeface', get_bloginfo('template_directory').'/js/trajan_pro_bold.typeface.js');
	wp_enqueue_script('typeface', get_bloginfo('template_directory').'/js/gandhi_serif_regular.typeface.js');*/
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
/*function new_excerpt_more($more) {
       global $post;
	return '<div class="clear"></div><a class="moretag btn btn-default read-more" title="'.get_the_title($post->ID).'" href="'. get_permalink($post->ID) . '"> Leer m&aacute;s</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
*/
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
		'name' => __( 'Buscador en Header', 'veracruz2013' ),
		'id' => 'buscador-widget-area',
		'description' => __( 'Buscador Widget para el area header.', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 2, located at the top of the sidebar
	register_sidebar( array(
		'name' => __( 'Sidebar Home y Single', 'veracruz2013' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'Sidebar widgets on the right column of the page', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 3, first area on the footer
	register_sidebar( array(
		'name' => __( 'Widget => Footer Blog (Menu) ', 'veracruz2013' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'First widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 4, second area on the footer
	register_sidebar( array(
		'name' => __( 'Widget => Footer Gobierno (Menu)', 'veracruz2013' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Second widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 5, third area on the footer
	register_sidebar( array(
		'name' => __( 'Widget => Footer Servicios (Menu)', 'veracruz2013' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'Third widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 6, first area on the footer
	register_sidebar( array(
		'name' => __( 'Widget => Footer Sala de prensa (Menu)', 'veracruz2013' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'Fourth widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 7, first area on the footer
	register_sidebar( array(
		'name' => __( 'Widget => Footer Contacto (Menu)', 'veracruz2013' ),
		'id' => 'fifth-footer-widget-area',
		'description' => __( 'Fifth widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	//Area 8, first area on the footer
	register_sidebar( array(
		'name' => __( 'Buscador en footer', 'veracruz2013' ),
		'id' => 'search-footer-widget-area',
		'description' => __( 'Search widget area on the footer', 'veracruz2013' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Copyright en footer', 'veracruz2013' ),
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
    $siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent.'&sort_column=post_date&sort_order=DESC');
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
				$link = get_post_meta($query->post->ID, 'youtube-link' , true); 
				echo "<div class='col-md-8 video-container'>";
					//$pieces=explode('=',$link);
					echo "<iframe width='598' height='330' src='http://www.youtube.com/embed/".$link."?rel=0&amp;wmode=transparent' frameborder='0' allowfullscreen></iframe>";
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

function get_images_gallery(){
	$query = new WP_Query( 'p='.$_POST['post_id'] );
	$cont=0;
	if ( $query->have_posts() ) :
		while ($query->have_posts()):$query->the_post(); 
			$args=array('post_type'=>'attachment','post_parent'=>get_the_ID(),'order' => 'ASC', 'orderby' => 'menu_order ID', 'posts_per_page'=>99);
			$attachments=get_posts($args);
			$data_images=array();
			$data_title=array();
			if($attachments){
				foreach($attachments as $attachment){
					$img_full=wp_get_attachment_image_src( $attachment->ID, 'full' );
					$img_data_lightbox = get_bloginfo('template_url')."/timthumb.php?src=".urlencode($img_full[0])."&a=cc&w=900";
					$data_images[$cont] = $img_data_lightbox;
					$data_title[$cont] = get_the_title();
				$cont++;}
			}
	endwhile; endif; 
	$arr_return = array(
	  'images' => $data_images,
	  'title' => $data_title
	);
	echo json_encode($arr_return);
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_images_gallery', 'get_images_gallery');
add_action('wp_ajax_nopriv_get_images_gallery', 'get_images_gallery');

/*get_load_more*/
function get_load_more(){
	$args = array(
		'post_type' => 'post',
		'category_name' => 'fotos',
		'posts_per_page'=> 3,
		'paged' => $_POST['page']
	);
	$notas = new WP_Query($args);
	if ($notas->have_posts()) :
		while ($notas->have_posts()):$notas->the_post(); 
			the_title();
		endwhile; 
	endif; 
	wp_reset_query(); 
	die(); 
}
add_action('wp_ajax_get_load_more', 'get_load_more');
add_action('wp_ajax_nopriv_get_load_more', 'get_load_more');



//-----Función para limitar caracteres-----//
function cutString($string,$charlength,$key) {
	switch($string){
		case 'title':
			$string=wpautop(get_the_title(), 1 );
		break;
		case 'excerpt':
			$string=get_the_excerpt();
		break;
		case 'content':
			$string=wpautop(get_the_content(), 1 );
		break;
		case 'meta':
			$string=wpautop(get_option(''.$key.''), 1 );
		break;
	}
    if(strlen($string)>$charlength) {
		$subex=substr($string,0,$charlength);
        echo $subex.'...';
    }else{
		echo $string;
    }
}
//------fin limitar caracteres----//
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}
function myTruncate($string, $limit, $break=".", $pad="…") { 
	if(strlen($string) <= $limit) 
	return $string; 
		if(false !== ($breakpoint = strpos($string, $break, $limit))) { 
			if($breakpoint < strlen($string) - 1) { 
				$string = substr($string, 0, $breakpoint) . $pad; 
			} 
		} 
	return $string; 
}

function get_post_destacado($category_slug){
	global $wpdb;
	$query = $wpdb->prepare("
	SELECT SUBQ.ID FROM (      
		SELECT ID,
			    (SELECT COUNT(object_id) FROM gev_term_relationships WHERE object_id = POST.ID AND term_taxonomy_id IN ((SELECT term_taxonomy_id FROM gev_term_taxonomy WHERE term_id IN ( SELECT term_id FROM `gev_terms` WHERE slug = '$category_slug')))) AS BLOG,
			    (SELECT COUNT(object_id) FROM gev_term_relationships WHERE object_id = POST.ID AND term_taxonomy_id = 64) AS DESTACADOS
				FROM gev_posts AS POST
				WHERE id IN (
						SELECT DISTINCT object_id 
						FROM gev_term_relationships 
						WHERE term_taxonomy_id IN 
							(SELECT term_taxonomy_id FROM gev_term_taxonomy
							 WHERE term_id IN ( SELECT term_id FROM 
									  `gev_terms`
									  WHERE slug = 'destacados' OR slug = '$category_slug'
									  )
							 )
						) AND POST.post_type = 'post'
					) AS SUBQ
					WHERE SUBQ.BLOG = 1 AND SUBQ.DESTACADOS = 1 ORDER BY ID DESC LIMIT 1;",array($category_slug));
	
	 $result_query = $wpdb->get_var($query);
	 //print_r($wpdb->last_query);
	 return $result_query;
}

function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}	
function get_cat_slug_by_id($id) {
	$cat_test = get_the_category( $id );
	$count=0;
	foreach($cat_test as $cat_index){
		if($cat_index->slug == 'fotos'){
			return "foto";
			break;
		}else if($cat_index->slug == 'videos'){
			return "video";
			break;
		}else{
			return "nota";
			break;
		}
		$count++;	
	}
}
function mySearchFilter($query) {
	if( !is_admin()){
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
}
add_filter('pre_get_posts','mySearchFilter');	

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
	 add_post_type_support( 'page', 'excerpt' );
}

?>