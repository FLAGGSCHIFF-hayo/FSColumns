<?php

if($GLOBALS['TL_CONFIG']['container']=='article'){
	$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace('author;','author,is_container;',$GLOBALS['TL_DCA']['tl_article']['palettes']['default']);
}

$GLOBALS['TL_DCA']['tl_article']['fields']['is_container'] = array
(
		'label'                   => array('Container','Soll dieser Artikel die Bootstrap-Klasse "container" haben? (im Zweifelsfall angekreuzt lassen)'),
		'exclude'                 => true,
		'filter'                  => true,
		'default'				  => true,
		'inputType'               => 'checkbox',
		'sql'                     => "char(1) NOT NULL default ''"
);

