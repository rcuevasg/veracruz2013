<?php

$custom_select_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_eventos',
	'title' => 'Agregar Evento Especial',
	'template' => get_stylesheet_directory() . '/metaboxes/meta-eventos.php',
	'hide_editor' => FALSE,
	'include_template' => array('pagetemplate-eventos.php'),
));

