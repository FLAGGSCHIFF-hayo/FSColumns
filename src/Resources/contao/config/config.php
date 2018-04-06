<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   FSArtikelteaserbild
 * @author    Flaggschiff UG
 * @license   GNU/GPL
 * @copyright Flaggschiff UG 2015
 */

if(TL_MODE=='BE') {
    if($GLOBALS['TL_CONFIG']['bootstrap']=='regular') {
        $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/bootstrap.min.css';
    }
    else{
        $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/bootstrap.fs.min.css';
    }
    $GLOBALS['TL_CSS'][] = 'bundles/flaggschiffcolumns/css/be.min.css';
    $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/flaggschiffcolumns/js/be.js|static';
}

$GLOBALS['TL_CTE']['column']['colStart'] = 'Flaggschiff\ContentColumnStart';
$GLOBALS['TL_CTE']['column']['colStop'] = 'Flaggschiff\ContentColumnStop';

$GLOBALS['TL_HOOKS']['getContentElement'][] = array('Flaggschiff\FSColumns', 'getContentElementHook');
$GLOBALS['TL_HOOKS']['getArticle'][] = array('Flaggschiff\FSContainer','getArticleHook');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Flaggschiff\FSContainer','parseTemplateHook');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Flaggschiff\FSColumns','parseTemplateHook');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('Flaggschiff\FSForms', 'parseWidgetHook');
