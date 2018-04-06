<?php

namespace Flaggschiff;
use Contao;

class FSColumnsController extends \Controller{

    /* Common function to turn String values of cols into bootstrap values */
    public function calculateColumn($col){
        switch($col){
            case 'full':
                return '12';
                break;
            case 'half':
                return '6';
                break;

            case 'third':
                return '4';
                break;

            case 'quarter':
                return '3';
                break;

            case 'two-third':
                return '8';
                break;

            case 'three-quarter':
                return '9';
                break;
            case 'hidden':
                return 'hidden';
                break;
        }
        if(is_numeric($col)){
            return $col;
        }
        return '';
    }

    /* Function passes a String that can instantly be added as CSS Class */
    public function caclulateObjectColumns($objElement){
        $lastcol = array_values(array_slice($objElement['sizes'], -1))[0];
        if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'&&!is_numeric($lastcol)&&$lastcol!='hidden'){
            $lastcol = $this->calculateColumn($lastcol);
        }
        $csizes = [];
        if($GLOBALS['TL_CONFIG']['bootstrap']=='regular') {
            $csizes = ['xs','sm','md','lg'];
        }
        else{
            $csizes = ['xxs','xs','sm','md','lg','xlg'];
        }
        /* Smallest size is always 12 */
        $addClass = ' col-'.$csizes[0].'-12';
        /* Except when all sizes are individually picked */
        if ($objElement['fs_responsive'] == 1) {
            $addClass = '';
            foreach($objElement['sizes'] as $col => $size) {
                if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
                    $cs = $size;
                    if(!is_numeric($cs)&&$cs!='hidden'){
                        $cs = $this->calculateColumn($cs);
                    }
                }
                else {
                    $cs = $this->calculateColumn($size);
                }
                $addClass .= ($cs == 'hidden') ? ' hidden-' . $col : (' col-' . $col . '-' . $cs);
            }
        }
        else {
            if($GLOBALS['TL_CONFIG']['fscol_sizes']=='all'){
                $addClass = ' col-' . $csizes[0] . '-' . $lastcol;
                if($lastcol == 'hidden'){
                    $addClass = '';
                    foreach ($csizes as $csize) {
                        $addClass .= ' hidden-' . $csize;
                    }
                }
            }
            else {
                /* Default values of all sizes, if not individually picked, depending on biggest size */
                if ($lastcol == 'half') {
                    $addClass = ' col-' . $csizes[0] . '-12 col-sm-6';
                } elseif ($lastcol == 'third') {
                    $addClass = ' col-' . $csizes[0] . '-12 col-sm-6 col-md-4';
                } elseif ($lastcol == 'quarter') {
                    $addClass = ' col-' . $csizes[0] . '-12 col-sm-6 col-md-3';
                } elseif ($lastcol == 'two-third') {
                    $addClass = ' col-' . $csizes[0] . '-12 col-sm-6 col-md-8';
                } elseif ($lastcol == 'three-quarter') {
                    $addClass = ' col-' . $csizes[0] . '-12 col-sm-6 col-md-9';
                } elseif ($lastcol == 'hidden') {
                    $addClass = '';
                    foreach ($csizes as $csize) {
                        $addClass .= ' hidden-' . $csize;
                    }
                }
            }
        }
        return $addClass;
    }

}