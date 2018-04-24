<?php

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{fscolumns_legend},containertype,bootstrap,fscol_sizes';

$GLOBALS['TL_DCA']['tl_settings']['fields']['containertype'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['containertype'],
    'exclude'                 => true,
    'default'                 => 'regularcontainer',
    'inputType'               => 'select',
    'options'                 => array('regularcontainer','fluidcontainer'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_settings'],
    'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['bootstrap'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['bootstrap'],
    'exclude'                 => true,
    'default'                 => 'flaggschiff',
    'inputType'               => 'select',
    'options'                 => array('flaggschiff','regular'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_settings'],
    'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['fscol_sizes'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fscol_sizes'],
    'exclude'                 => true,
    'default'                 => 'preset',
    'inputType'               => 'select',
    'options'                 => array('preset','all'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_settings'],
    'sql'                     => "char(1) NOT NULL default ''"
);