<?php

$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('tl_form_field_fs_columns','addFSColumnsDCA');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array('tl_form_field_fs_columns','removeColValues');

$fscoloptions = array('full', 'half', 'third', 'quarter', 'two-third', 'three-quarter', 'hidden');

if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
    $fscoloptions = array(12,11,10,9,8,7,6,5,4,3,2,1,'hidden');
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'eval' => array('submitOnChange' => true, 'tl_class'=>'w50 clr'),
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all') {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_columns']['eval']['submitOnChange'] = false;
}
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'fs_responsive';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_responsive'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_responsive'],
    'exclude' => false,
    'inputType' => 'checkbox',
    'eval' => array('submitOnChange' => true, 'tl_class'=>'w50 clr'),
    'sql' => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xxs_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_xxs_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xxs_columns']['load_callback'] = array(array('tl_form_field_fs_columns', 'loadXXSColumns'));
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xs_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_xs_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xs_columns']['load_callback'] = array(array('tl_form_field_fs_columns', 'loadXSColumns'));
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_sm_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_sm_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_sm_columns']['load_callback'] = array(array('tl_form_field_fs_columns', 'loadSMColumns'));
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_md_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_md_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_md_columns']['load_callback'] = array(array('tl_form_field_fs_columns', 'loadMDColumns'));
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_lg_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['fs_lg_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_lg_columns']['load_callback'] = array(array('tl_form_field_fs_columns', 'loadLGColumns'));
}

if($GLOBALS['TL_CONFIG']['bootstrap']=='regular'||!$GLOBALS['TL_CONFIG']['bootstrap']){
    $GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['fs_responsive'] = 'fs_md_columns,fs_sm_columns,fs_xs_columns';
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_xs_columns']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['fs_xs_columns2'];
    $GLOBALS['TL_DCA']['tl_form_field']['fields']['fs_md_columns']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['fs_md_columns2'];
}
else{
    $GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['fs_responsive'] = 'fs_lg_columns,fs_md_columns,fs_sm_columns,fs_xs_columns,fs_xxs_columns';
}

class tl_form_field_fs_columns extends \Backend
{

    public function __construct()
    {
        parent::__construct();
    }

    public function loadLGColumns($val,$dc){
        $return = $val;
        if(!$val && $GLOBALS['TL_CONFIG']['fscol_sizes']!='all'){
            $fs_columns = $dc->fs_columns;
            if(!$fs_columns){
                $fs_columns = $dc->activeRecord->fs_columns;
            }
            switch($fs_columns){
                case 'full':
                    $return = 'full';
                    break;
                case 'half':
                    $return = 'half';
                    break;
                case 'third':
                    $return = 'third';
                    break;
                case 'quarter':
                    $return = 'quarter';
                    break;
                case 'two-third':
                    $return = 'two-third';
                    break;
                case 'three-quarter':
                    $return = 'three-quarter';
                    break;
                case 'hidden':
                    $return = 'hidden';
                    break;
            }
            if($return!=$val) {
                $this->Database->prepare("UPDATE tl_form_field SET fs_lg_columns=? WHERE id=?")->execute($return, $dc->id);
            }
        }
        return $return;
    }

    public function loadMDColumns($val,$dc){
        $return = $val;
        if(!$val && $GLOBALS['TL_CONFIG']['fscol_sizes']!='all'){
            $fs_columns = $dc->fs_columns;
            if(!$fs_columns){
                $fs_columns = $dc->activeRecord->fs_columns;
            }
            switch($fs_columns){
                case 'full':
                    $return = 'full';
                    break;
                case 'half':
                    $return = 'half';
                    break;
                case 'third':
                    $return = 'third';
                    break;
                case 'quarter':
                    $return = 'quarter';
                    break;
                case 'two-third':
                    $return = 'two-third';
                    break;
                case 'three-quarter':
                    $return = 'three-quarter';
                    break;
                case 'hidden':
                    $return = 'hidden';
                    break;
            }
            if($return!=$val) {
                $this->Database->prepare("UPDATE tl_form_field SET fs_md_columns=? WHERE id=?")->execute($return, $dc->id);
            }
        }
        return $return;
    }

    public function loadSMColumns($val,$dc){
        $return = $val;
        if(!$val && $GLOBALS['TL_CONFIG']['fscol_sizes']!='all'){
            $fs_columns = $dc->fs_columns;
            if(!$fs_columns){
                $fs_columns = $dc->activeRecord->fs_columns;
            }
            switch($fs_columns){
                case 'full':
                    $return = 'full';
                    break;
                case 'half':
                    $return = 'half';
                    break;
                case 'third':
                    $return = 'half';
                    break;
                case 'quarter':
                    $return = 'half';
                    break;
                case 'two-third':
                    $return = 'half';
                    break;
                case 'three-quarter':
                    $return = 'half';
                    break;
                case 'hidden':
                    $return = 'hidden';
                    break;
            }
            if($return!=$val) {
                $this->Database->prepare("UPDATE tl_form_field SET fs_sm_columns=? WHERE id=?")->execute($return, $dc->id);
            }
        }
        return $return;
    }

    public function loadXSColumns($val,$dc){
        $return = $val;
        if(!$val && $GLOBALS['TL_CONFIG']['fscol_sizes']!='all'){
            $fs_columns = $dc->fs_columns;
            if(!$fs_columns){
                $fs_columns = $dc->activeRecord->fs_columns;
            }
            switch($fs_columns){
                case 'full':
                    $return = 'full';
                    break;
                case 'half':
                    $return = 'full';
                    break;
                case 'third':
                    $return = 'full';
                    break;
                case 'quarter':
                    $return = 'full';
                    break;
                case 'two-third':
                    $return = 'full';
                    break;
                case 'three-quarter':
                    $return = 'full';
                    break;
                case 'hidden':
                    $return = 'hidden';
                    break;
            }
            if($return!=$val) {
                $this->Database->prepare("UPDATE tl_form_field SET fs_xs_columns=? WHERE id=?")->execute($return, $dc->id);
            }
        }
        return $return;
    }

    public function loadXXSColumns($val,$dc){
        $return = $val;
        if(!$val && $GLOBALS['TL_CONFIG']['fscol_sizes']!='all'){
            $fs_columns = $dc->fs_columns;
            if(!$fs_columns){
                $fs_columns = $dc->activeRecord->fs_columns;
            }
            switch($fs_columns){
                case 'full':
                    $return = 'full';
                    break;
                case 'half':
                    $return = 'full';
                    break;
                case 'third':
                    $return = 'full';
                    break;
                case 'quarter':
                    $return = 'full';
                    break;
                case 'two-third':
                    $return = 'full';
                    break;
                case 'three-quarter':
                    $return = 'full';
                    break;
                case 'hidden':
                    $return = 'hidden';
                    break;
            }
            if($return!=$val) {
                $this->Database->prepare("UPDATE tl_form_field SET fs_xxs_columns=? WHERE id=?")->execute($return, $dc->id);
            }
        }
        return $return;
    }

    public function removeColValues($dc){
        if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
            $fs_responsive = $dc->activeRecord->fs_responsive;
            if (!$fs_responsive) {
                $this->Database->prepare("UPDATE tl_form_field SET fs_xxs_columns='', fs_xs_columns='', fs_sm_columns='', fs_md_columns='', fs_lg_columns='' WHERE id=?")->execute($dc->id);
            }
        }
    }

    public function addFSColumnsDCA()
    {
        foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as &$GPalette) {
            if (!is_array($GPalette)) {

                if (strpos($GPalette, ',nofscolumns')) {
                    $GPalette = str_replace(',nofscolumns', '', $GPalette);
                } else {
                    $GPalette = str_replace(',type,', ',type,fs_columns,fs_responsive,', $GPalette);
                    $GPalette = str_replace(',type;', ',type,fs_columns,fs_responsive;', $GPalette);
                    if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
                        $GPalette = str_replace('fs_columns,fs_responsive,fs_columns,fs_responsive', 'fs_columns,fs_responsive', $GPalette);
                    }
                }
            }
        }

    }

}

?>