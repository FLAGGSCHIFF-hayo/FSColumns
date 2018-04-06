<?php

namespace Flaggschiff;
use Contao;

class FSContainer extends \Frontend {

    public function parseTemplateHook($objTemplate){

        if(TL_MODE=='FE') {
            if ($GLOBALS['TL_CONFIG']['bootstrap'] == 'regular') {
                $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/bootstrap.min.css|static';
                $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/container.min.css|static';
            }
            else{
                $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/bootstrap.fs.min.css|static';
                $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/container.fs.min.css|static';
            }
            if($GLOBALS['TL_CONFIG']['containertype'] == 'fluidcontainer') {
                $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/fluid.min.css|static';
            }
        }

        /*
        if(substr($objTemplate->getName(),0,11) == 'mod_article'){
            if(($GLOBALS['TL_CONFIG']['row']=='article'||($objTemplate->is_container&&$GLOBALS['TL_CONFIG']['container']=='article'&&$GLOBALS['TL_CONFIG']['row']=='direct'))&&$objTemplate->pid==$this->replaceInsertTags('{{page::id}}')&&($objTemplate->inColumn!='header'&&$objTemplate->inColumn!='footer')){
                $elements = $objTemplate->elements;
                array_unshift($elements,'<div class="row">');
                $elements[] = '</div>';
                $objTemplate->elements = $elements;
            }
            if(substr($objTemplate->getName(),0,18) == 'mod_article_teaser'){
                if($objTemplate->is_container&&$GLOBALS['TL_CONFIG']['container']=='article') {
                    $objTemplate->class .= ' container';
                }
            }
        }
        */

        if(substr($objTemplate->getName(),0,7) == 'fe_page'){
            /* container and row around left right and main? */
            $sections = $objTemplate->sections;
            $contentleft = $objTemplate->left;
            $contentright = $objTemplate->right;
            $contentheader = $objTemplate->header;
            $contentfooter = $objTemplate->footer;
            $contentmain = $objTemplate->main;
            $containerclass = 'container';
            if($GLOBALS['TL_CONFIG']['containertype'] == 'fluidcontainer') {
                $containerclass = 'container-fluid';
            }
            $rowb = '<div class="row">';
            $rowe = '</div>';
            $contentsections = array();
            /*if($contentsections['before']){
                $contentsections['before'].='<div class="container"><div class="row">';
            }
            else{
                $contentsections['before']='<div class="container"><div class="row">';
            }
            if($contentsections['after']){
                $contentsections['after']='</div></div>'.$contentsections['after'];
            }
            else{
                $contentsections['after']='</div></div>';
            }*/
            global $objPage;
            $layout = \LayoutModel::findById($objPage->layout);
            $cleftwidth = $layout->fswidthLeft;
            $crightwidth = $layout->fswidthRight;
            $cmainwidth = 100;
            if($contentleft){
                $cmainwidth -= $cleftwidth;
            }
            else{
                $cleftwidth = 0;
            }
            if($contentright){
                $cmainwidth -= $crightwidth;
            }
            else{
                $crightwidth = 0;
            }
            foreach($sections as $key => $contentsection){
                $contentsections[$key] = '<div class="'.$containerclass.'">'.$rowb.$contentsection.$rowe.'</div>';
            }
            $contentleft = '<div style="width: '.$cleftwidth.'%;overflow: hidden;margin-left: -'.($cmainwidth+$cleftwidth).'%;float: left;"><div class="'.$containerclass.'">'.$rowb.$contentleft.$rowe.'</div></div>';
            $contentright = '<div style="width: '.$crightwidth.'%;overflow: hidden;float: left;"><div class="'.$containerclass.'">'.$rowb.$contentright.$rowe.'</div></div>';
            $contentheader = '<div class="'.$containerclass.'">'.$rowb.$contentheader.$rowe.'</div>';
            $contentfooter = '<div class="'.$containerclass.'">'.$rowb.$contentfooter.$rowe.'</div>';
            $contentmain = '<div style="width: '.$cmainwidth.'%;overflow: hidden;margin-left: '.$cleftwidth.'%;float: left;"><div class="'.$containerclass.'">'.$rowb.$contentmain.$rowe.'</div></div>';
            $objTemplate->sections = $contentsections;
            $objTemplate->left = $contentleft;
            $objTemplate->right = $contentright;
            $objTemplate->header = $contentheader;
            $objTemplate->footer = $contentfooter;
            $objTemplate->main = $contentmain;
        }

    }

    public function getArticleHook($objRow){

        /*$arClass = deserialize($objRow->cssID, true);
        if($objRow->is_container&&$GLOBALS['TL_CONFIG']['container']=='article'){
            $arClass[1] = trim($arClass[1] . ' container');
        }
        $objRow->cssID = serialize($arClass);*/


    }

}

?>