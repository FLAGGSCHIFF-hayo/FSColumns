<?php

$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('tl_form_field_fs_columns','addFSColumnsDCA');

$fscoloptions = array('full', 'half', 'third', 'quarter', 'two-third', 'three-quarter', 'hidden');

if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
    $fscoloptions = array(12,11,10,9,8,7,6,5,4,3,2,1,'hidden');
}

if($GLOBALS['TL_CONFIG']['bootstrap']=='regular'||!$GLOBALS['TL_CONFIG']['bootstrap']){
    $GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['fs_responsive'] = 'fs_xs_columns,fs_sm_columns,fs_md_columns';

    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'fs_responsive';

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_columns'] = array(
        'exclude'                 => false,
        'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fs_columns'],
        'inputType'               => 'select',
        'options'                 => $fscoloptions,
        'eval'                    => array('tl_class'=>'w50 clr'),
        'reference'               => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql'                     => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_responsive'] = array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fs_responsive'],
        'exclude'                 => false,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
        'sql'                     => "char(1) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xs_columns'] = array(
        'exclude'                 => false,
        'search'                  => true,
        'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fs_xs_columns'],
        'inputType'               => 'select',
        'options'                 => $fscoloptions,
        'reference'               => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql'                     => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_sm_columns'] = array(
        'exclude'                 => false,
        'search'                  => true,
        'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fs_sm_columns'],
        'inputType'               => 'select',
        'options'                 => $fscoloptions,
        'reference'               => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql'                     => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_md_columns'] = array(
        'exclude'                 => false,
        'search'                  => true,
        'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fs_md_columns'],
        'inputType'               => 'select',
        'options'                 => $fscoloptions,
        'reference'               => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql'                     => "varchar(32) NOT NULL default ''"
    );
}
else{
    $GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['fs_responsive'] = 'fs_xxs_columns,fs_xs_columns,fs_sm_columns,fs_md_columns,fs_lg_columns';

    $GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'fs_responsive';

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_columns'] = array(
        'exclude' => false,
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_columns'],
        'inputType' => 'select',
        'options' => $fscoloptions,
        'eval' => array('tl_class'=>'w50 clr'),
        'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql' => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_responsive'] = array
    (
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_responsive'],
        'exclude' => false,
        'inputType' => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 clr','submitOnChange' => true),
        'sql' => "char(1) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xxs_columns'] = array(
        'exclude' => false,
        'search' => true,
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_xxs_columns'],
        'inputType' => 'select',
        'options' => $fscoloptions,
        'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql' => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xs_columns'] = array(
        'exclude' => false,
        'search' => true,
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_xs_columns'],
        'inputType' => 'select',
        'options' => $fscoloptions,
        'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql' => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_sm_columns'] = array(
        'exclude' => false,
        'search' => true,
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_sm_columns'],
        'inputType' => 'select',
        'options' => $fscoloptions,
        'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql' => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_md_columns'] = array(
        'exclude' => false,
        'search' => true,
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_md_columns'],
        'inputType' => 'select',
        'options' => $fscoloptions,
        'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql' => "varchar(32) NOT NULL default ''"
    );

    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_lg_columns'] = array(
        'exclude' => false,
        'search' => true,
        'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_lg_columns'],
        'inputType' => 'select',
        'options' => $fscoloptions,
        'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
        'sql' => "varchar(32) NOT NULL default ''"
    );
}


class tl_form_field_fs_columns extends \Backend
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addFSColumnsDCA(){

        foreach($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as &$GPalette){
            $GPalette = str_replace(',type,', ',type,fs_columns,fs_responsive,', $GPalette);
            $GPalette = str_replace(',type;', ',type,fs_columns,fs_responsive;', $GPalette);
            $GPalette = str_replace('fs_columns,fs_responsive,fs_columns,fs_responsive', 'fs_columns,fs_responsive', $GPalette);
        }

    }

}

?>