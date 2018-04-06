<?php

namespace Flaggschiff;
use Contao;

class FSColumns extends \Frontend {

    public function getContentElementHook($objRow, $strBuffer, $objElement){
        require_once(dirname(__FILE__).'/FSColumnsController.php');
        $this->Columns = new FSColumnsController();

        /* All nofscolumns palettes are ignored */
        if($objElement->Template->nofscolumns!=1&&$objElement->nofscolumns!=1) {
            /* Adds row to accordion-content, since Elements within the accordion-content will receive bootstrap-classes again */
            if ($objElement->type == "accordionStart") {
                $objElement->Template->accordion .= ' row';
            }
            else if($objRow->type == 'form'){
                $strBuffer = '<div class="row">'.$strBuffer.'</div>';
            }

            /* Added cols will differ depending on bootstrap version */
            if ($GLOBALS['TL_CONFIG']['bootstrap'] == 'regular') {
                /* Regular Content-Elements have $objElement->Template and fs_columns cannot be NULL when a Content-Element is saved */
                if ($objElement->Template && !is_null($objElement->Template->fs_columns)) {
                    $colElement = array(
                        'fs_responsive' => $objElement->Template->fs_responsive,
                        'sizes' => array(
                            'xs' => $objElement->Template->fs_xs_columns ? $objElement->Template->fs_xs_columns : 12,
                            'sm' => $objElement->Template->fs_sm_columns ? $objElement->Template->fs_sm_columns : 12,
                            'md' => $objElement->Template->fs_md_columns ? $objElement->Template->fs_md_columns : 12,
                            'lg' => $objElement->Template->fs_columns ? $objElement->Template->fs_columns : 12
                        )
                    );
                    /* Function passes a String that can instantly be added as CSS Class */
                    $addClass = $this->Columns->caclulateObjectColumns($colElement);
                    $objElement->Template->class = $objElement->Template->class . $addClass;
                    $strBuffer = $objElement->Template->parse();
                }
                /* Modules and Backend Content-Elements don't always use Templates (i.e. wildcards and such) */
                elseif (($objElement->type == 'module'||$objRow->type == 'form'||TL_MODE=='BE')) {
                    $obj = $objElement->fs_columns ? $objElement : $objRow;
                    if(!is_null($obj->fs_columns)) {
                        $colElement = array(
                            'fs_responsive' => $obj->fs_responsive,
                            'sizes' => array(
                                'xs' => $obj->fs_xs_columns ? $obj->fs_xs_columns : 12,
                                'sm' => $obj->fs_sm_columns ? $obj->fs_sm_columns : 12,
                                'md' => $obj->fs_md_columns ? $obj->fs_md_columns : 12,
                                'lg' => $obj->fs_columns ? $obj->fs_columns : 12
                            )
                        );
                        /* Function passes a String that can instantly be added as CSS Class */
                        $addClass = $this->Columns->caclulateObjectColumns($colElement);
                        $strBuffer = '<div class="module_container ' . $addClass . '">' . $strBuffer . '</div>';
                    }
                }
            }
            else{
                /* Regular Content-Elements have $objElement->Template and fs_columns cannot be NULL when a Content-Element is saved */
                if ($objElement->Template && !is_null($objElement->Template->fs_columns)) {
                    $colElement = array(
                        'fs_responsive' => $objElement->Template->fs_responsive,
                        'sizes' => array(
                            'xxs' => $objElement->Template->fs_xxs_columns ? $objElement->Template->fs_xxs_columns : 12,
                            'xs' => $objElement->Template->fs_xs_columns ? $objElement->Template->fs_xs_columns : 12,
                            'sm' => $objElement->Template->fs_sm_columns ? $objElement->Template->fs_sm_columns : 12,
                            'md' => $objElement->Template->fs_md_columns ? $objElement->Template->fs_md_columns : 12,
                            'lg' => $objElement->Template->fs_lg_columns ? $objElement->Template->fs_lg_columns : 12,
                            'xlg' => $objElement->Template->fs_columns ? $objElement->Template->fs_columns : 12
                        )
                    );
                    /* Function passes a String that can instantly be added as CSS Class */
                    $addClass = $this->Columns->caclulateObjectColumns($colElement);
                    $objElement->Template->class = $objElement->Template->class . $addClass;
                    $strBuffer = $objElement->Template->parse();
                }
                /* Modules and Backend Content-Elements don't always use Templates (i.e. wildcards and such) */
                elseif (($objElement->type == 'module'||$objRow->type == 'form'||TL_MODE=='BE')) {
                    $obj = $objElement->fs_columns ? $objElement : $objRow;
                    if(!is_null($obj->fs_columns)) {
                        $colElement = array(
                            'fs_responsive' => $obj->fs_responsive,
                            'sizes' => array(
                                'xxs' => $obj->fs_xxs_columns ? $obj->fs_xxs_columns : 12,
                                'xs' => $obj->fs_xs_columns ? $obj->fs_xs_columns : 12,
                                'sm' => $obj->fs_sm_columns ? $obj->fs_sm_columns : 12,
                                'md' => $obj->fs_md_columns ? $obj->fs_md_columns : 12,
                                'lg' => $obj->fs_lg_columns ? $obj->fs_lg_columns : 12,
                                'xlg' => $obj->fs_columns ? $obj->fs_columns : 12
                            )
                        );
                        /* Function passes a String that can instantly be added as CSS Class */
                        $addClass = $this->Columns->caclulateObjectColumns($colElement);
                        $strBuffer = '<div class="module_container ' . $addClass . '">' . $strBuffer . '</div>';
                    }
                }
            }

            /* Backend needs Javascript to use col-sizes, this is especially relevant for wrappers. Thus the cols are only added as data-attribute */
            if(TL_MODE=='BE'){
                $strBuffer .= '<div class="sizes" data-size="'.$addClass.'"></div>';
            }
        }

        return $strBuffer;

    }

    public function parseTemplateHook($objTemplate){
        require_once(dirname(__FILE__).'/FSColumnsController.php');
        $this->Columns = new FSColumnsController();

        if(TL_MODE=='FE'&&(($objTemplate->origCssID&&$objTemplate->ptable)||($objTemplate->origId))) {
            if($GLOBALS['TL_CONFIG']['bootstrap']=='regular'){
                $colElement = array(
                    'fs_responsive' => $objTemplate->fs_responsive,
                    'sizes' => array(
                        'xs' => $objTemplate->fs_xs_columns ? $objTemplate->fs_xs_columns : 12,
                        'sm' => $objTemplate->fs_sm_columns ? $objTemplate->fs_sm_columns : 12,
                        'md' => $objTemplate->fs_md_columns ? $objTemplate->fs_md_columns : 12,
                        'lg' => $objTemplate->fs_columns ? $objTemplate->fs_columns : 12
                    )
                );
                $addClass = $this->Columns->caclulateObjectColumns($colElement);
            }
            else{
                $colElement = array(
                    'fs_responsive' => $objTemplate->fs_responsive,
                    'sizes' => array(
                        'xxs' => $objTemplate->fs_xxs_columns ? $objTemplate->fs_xxs_columns : 12,
                        'xs' => $objTemplate->fs_xs_columns ? $objTemplate->fs_xs_columns : 12,
                        'sm' => $objTemplate->fs_sm_columns ? $objTemplate->fs_sm_columns : 12,
                        'md' => $objTemplate->fs_md_columns ? $objTemplate->fs_md_columns : 12,
                        'lg' => $objTemplate->fs_lg_columns ? $objTemplate->fs_lg_columns : 12,
                        'xlg' => $objTemplate->fs_columns ? $objTemplate->fs_columns : 12
                    )
                );
                $addClass = $this->Columns->caclulateObjectColumns($colElement);
            }
            $objTemplate->class .= ' '.$addClass;
        }
    }

}

?>