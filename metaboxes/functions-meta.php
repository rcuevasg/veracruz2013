<?php

$custom_select_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_eventos',
	'title' => 'Agregar Evento Especial',
	'template' => get_stylesheet_directory() . '/metaboxes/meta-eventos.php',
	'hide_editor' => false,
	'include_template' => array('pagetemplate-eventos.php'),
));

$custom_select_mb2 = new WPAlchemy_MetaBox(array
(
	'id' => '_poderes',
	'title' => 'Agregar poderes del estado',
	'template' => get_stylesheet_directory() . '/metaboxes/meta-poderes.php',
	'hide_editor' => false,
	'include_template' => array('pagetemplate-poderes.php'),
));

$custom_select_mb3 = new WPAlchemy_MetaBox(array
(
	'id' => '_normativa_gaceta',
	'title' => 'Agregar descripción y link',
	'template' => get_stylesheet_directory() . '/metaboxes/meta-normativa-gaceta.php',
	'hide_editor' => false,
	'include_template' => array('pagetemplate-normativa-gaceta.php'),
));