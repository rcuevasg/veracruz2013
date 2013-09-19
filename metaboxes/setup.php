<?php

include_once STYLESHEETPATH . '/wpalchemy/MetaBox.php';
include_once STYLESHEETPATH . '/wpalchemy/MediaAccess.php';
$wpalchemy_media_access = new WPAlchemy_MediaAccess(); 
if (is_admin()) add_action('admin_enqueue_scripts', 'metabox_style');

function metabox_style() {
	wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/metas.css');
}

?>