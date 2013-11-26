<?php
get_header(); ?>
<div id="content">
<?php

$input_file = "http://www.veracruz.gob.mx/wp-content/uploads/2013/11/Javier_Duarte_firma_convenio_con_infonavit_para_vivienda_a_policias_Veracruz.png";
$output_file = "http://www.veracruz.gob.mx/wp-content/uploads/2013/11/Javier_Duarte_firma_convenio_con_infonavit_para_vivienda_a_policias_Veracruz.jpg";

$input = imagecreatefrompng($input_file);
list($width, $height) = getimagesize($input_file);
$output = imagecreatetruecolor(1100, 400);
$white = imagecolorallocate($output,  255, 255, 255);
imagefilledrectangle($output, 0, 0, $width, $height, $white);
imagecopy($output, $input, 0, 0, 0, 0, $width, $height);
$result =imagejpeg($output, $output_file);

print_r($result);
/*
$tags_get = wp_get_post_tags(27663); 
$tag_ids = array();  
foreach($tags_get as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args=array(  
	'tag__in' => $tag_ids,  
	//'post__not_in' => array(27663),  
	'posts_per_page'=>-1, // Number of related posts to display.  
	'caller_get_posts'=>1,
);  
$search = new WP_QUERY( $args );
while ( $search->have_posts() ) { $search->the_post(); 	
	// initialize
	$min = 9999999; $max = 0;
	
	// fetch all WordPress tags
	$tags = get_tags(array('orderby' => $orderby, 'order' => $order, 'number' => $number));	
	
	// get minimum and maximum number tag counts
	foreach ($tags as $tag) {
		$min = min($min, $tag->count);
		$max = max($max, $tag->count);
	}
	// generate tag list
	foreach ($tags as $tag) {
		$slug = $tag->term_id;
		if(in_array($slug,$tag_ids) && $max <= $tag->count){
			echo get_the_title()."=>$slug.<br>";
			//echo $title = $tag->count . ' article' . ($tag->count == 1 ? '' : 's')."<br>";
		}else{
			
		}
	}
	
}
*/
?>
<?php get_footer(); ?>