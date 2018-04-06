<?php

$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2cll'] = 'fswidthLeft';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_2clr'] = 'fswidthRight';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['cols_3cl'] = 'fswidthLeft,fswidthRight';

$GLOBALS['TL_DCA']['tl_layout']['fields']['fswidthLeft'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['fswidthLeft'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['fswidthRight'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['fswidthRight'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);
