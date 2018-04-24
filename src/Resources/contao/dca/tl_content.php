<?php

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('tl_content_fs_columns','addFSColumnsDCA');
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('tl_content_fs_columns','removeColValues');

$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['panelLayout'] = 'filter;search';

$GLOBALS['TL_DCA']['tl_content']['palettes']['colStart'] = '{type_legend},type,colBackground;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colStop'] = '{type_legend},type,nofscolumns;{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'colStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'colStop';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['colBackground'] = 'colBgColor,colFullwidthBg';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__' ][] = 'colBackground';

$GLOBALS['TL_DCA']['tl_content']['fields']['colBackground'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['colBackground'],
    'inputType'               => 'checkbox',
    'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
    'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['colFullwidthBg'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['colFullwidthBg'],
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class' => 'clr'),
    'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['colBgColor'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['colBgColor'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array (
        'mandatory'     => true,
        'maxlength'     => 6,
        'minlength'     => 3,
        'rgxp'          => 'alnum',
        'tl_class'      => 'w50 clr',
        'colorpicker'   => true,
        'isHexColor'    => true
    ),
    'sql'                     => "varchar(6) NOT NULL default ''"
);

if($GLOBALS['TL_CONFIG']['bootstrap']=='regular'||!$GLOBALS['TL_CONFIG']['bootstrap']){
    $GLOBALS['TL_DCA']['tl_content']['subpalettes']['fs_responsive'] = 'fs_xs_columns,fs_sm_columns,fs_md_columns';
}
else{
    $GLOBALS['TL_DCA']['tl_content']['subpalettes']['fs_responsive'] = 'fs_xxs_columns,fs_xs_columns,fs_sm_columns,fs_md_columns,fs_lg_columns';
}

$fscoloptions = array('full', 'half', 'third', 'quarter', 'two-third', 'three-quarter', 'hidden');

if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
    $fscoloptions = array(12,11,10,9,8,7,6,5,4,3,2,1,'hidden');
}

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'eval' => array('submitOnChange' => true, 'tl_class'=>'w50 clr'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_content']['fields']['fs_columns']['eval']['submitOnChange'] = false;
}
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'fs_responsive';

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_responsive'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_responsive'],
    'exclude' => false,
    'inputType' => 'checkbox',
    'eval' => array('submitOnChange' => true, 'tl_class'=>'w50 clr'),
    'sql' => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_xxs_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_xxs_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_content']['fields']['fs_xxs_columns']['load_callback'] = array(array('tl_content_fs_columns', 'loadXXSColumns'));
}

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_xs_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_xs_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_content']['fields']['fs_xs_columns']['load_callback'] = array(array('tl_content_fs_columns', 'loadXSColumns'));
}

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_sm_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_sm_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_content']['fields']['fs_sm_columns']['load_callback'] = array(array('tl_content_fs_columns', 'loadSMColumns'));
}

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_md_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_md_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_content']['fields']['fs_md_columns']['load_callback'] = array(array('tl_content_fs_columns', 'loadMDColumns'));
}

$GLOBALS['TL_DCA']['tl_content']['fields']['fs_lg_columns'] = array(
    'exclude' => false,
    'label' => &$GLOBALS['TL_LANG']['tl_content']['fs_lg_columns'],
    'inputType' => 'select',
    'options' => $fscoloptions,
    'reference' => &$GLOBALS['TL_LANG']['tl_content'],
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(32) NOT NULL default ''"
);
if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
    $GLOBALS['TL_DCA']['tl_content']['fields']['fs_lg_columns']['load_callback'] = array(array('tl_content_fs_columns', 'loadLGColumns'));
}


/** ADD BUTTONS TO CHANGE VIEWPORT-PREVIEW **/
$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['panelLayout'] .= ';viewport_panel';
if(!is_array($GLOBALS['TL_DCA']['tl_content']['list']['sorting']['panel_callback'])) {
    $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['panel_callback'] = array();
}
$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['panel_callback']['viewport_panel'] = array('tl_content_fs_columns','addViewPortPanel');


class tl_content_fs_columns extends \Backend
{

    public function __construct()
    {
        parent::__construct();
    }

    public function addViewPortPanel($arrRow){
        $panel = '<div class="viewport_panel"><strong>'.$GLOBALS['TL_LANG']['tl_content']['info_screensizes'].': </strong><a class="viewport-button button-xxs" href="#" title="<480px" onclick="changeTo(\'xxs\');return false;">XXS</a><a class="viewport-button button-xs" href="#" title="<768px" onclick="changeTo(\'xs\');return false;">XS</a><a class="viewport-button button-sm" href="#" title="<992px" onclick="changeTo(\'sm\');return false;">SM</a><a class="viewport-button button-md" href="#" title="<1200px" onclick="changeTo(\'md\');return false;">MD</a><a class="viewport-button button-lg" href="#" title="<1680px" onclick="changeTo(\'lg\');return false;">LG</a><a class="viewport-button button-xlg" href="#" title=">1679px" onclick="changeTo(\'xlg\');return false;">XLG</a><a class="viewport-button" href="#" onclick="changeTo(\'\');return false;">'.$GLOBALS['TL_LANG']['tl_content']['fs_columns_preview_reset'].'</a></div>';
        return $panel;
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
                $this->Database->prepare("UPDATE tl_content SET fs_lg_columns=? WHERE id=?")->execute($return, $dc->id);
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
                $this->Database->prepare("UPDATE tl_content SET fs_md_columns=? WHERE id=?")->execute($return, $dc->id);
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
                $this->Database->prepare("UPDATE tl_content SET fs_sm_columns=? WHERE id=?")->execute($return, $dc->id);
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
                $this->Database->prepare("UPDATE tl_content SET fs_xs_columns=? WHERE id=?")->execute($return, $dc->id);
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
                $this->Database->prepare("UPDATE tl_content SET fs_xxs_columns=? WHERE id=?")->execute($return, $dc->id);
            }
        }
        return $return;
    }

    public function removeColValues($dc){
        if($GLOBALS['TL_CONFIG']['fscol_sizes']!='all') {
            $fs_responsive = $dc->activeRecord->fs_responsive;
            if (!$fs_responsive) {
                $this->Database->prepare("UPDATE tl_content SET fs_xxs_columns='', fs_xs_columns='', fs_sm_columns='', fs_md_columns='', fs_lg_columns='' WHERE id=?")->execute($dc->id);
            }
        }
    }

    public function addFSColumnsDCA(){

        foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as &$GPalette){
            if(!is_array($GPalette)) {

                if (strpos($GPalette, ',nofscolumns')) {
                    $GPalette = str_replace(',nofscolumns', '', $GPalette);
                } else {
                    $GPalette = str_replace(',type,', ',type,fs_columns,fs_responsive,', $GPalette);
                    $GPalette = str_replace(',type;', ',type,fs_columns,fs_responsive;', $GPalette);
                    if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
                        $GPalette = str_replace('fs_responsive',$GLOBALS['TL_DCA']['tl_content']['subpalettes']['fs_responsive'],$GPalette);
                    }
                }
            }
        }

    }

}

?>