<?php

namespace Flaggschiff;
use Contao;

class FSForms extends \Frontend {

    public function parseWidgetHook($strBuffer, $widget)
    {
        require_once(dirname(__FILE__) . '/FSColumnsController.php');
        $this->Columns = new FSColumnsController();

        if ($GLOBALS['TL_CONFIG']['bootstrap'] == 'regular') {
            $colElement = array(
                'fs_responsive' => $widget->fs_responsive,
                'sizes' => array(
                    'xs' => $widget->fs_xs_columns,
                    'sm' => $widget->fs_sm_columns,
                    'md' => $widget->fs_md_columns,
                    'lg' => $widget->fs_columns
                )
            );
            $addClass = $this->Columns->caclulateObjectColumns($colElement);

            if ($widget->type == 'fieldset') {
                $addClass .= ' row';
            }
        } else {
            $colElement = array(
                'fs_responsive' => $widget->fs_responsive,
                'sizes' => array(
                    'xxs' => $widget->fs_xxs_columns,
                    'xs' => $widget->fs_xs_columns,
                    'sm' => $widget->fs_sm_columns,
                    'md' => $widget->fs_md_columns,
                    'lg' => $widget->fs_lg_columns,
                    'xlg' => $widget->fs_columns
                )
            );
            $addClass = $this->Columns->caclulateObjectColumns($colElement);

            if ($widget->type == 'fieldset') {
                $addClass .= ' row';
            }
        }
        if (TL_MODE == 'FE') {
            return '<div class="' . $addClass . '">' . $strBuffer . '</div>';
        }
        else{
            $strBuffer .= '<div class="sizes" data-size="'.$addClass.'"></div>';
            return $strBuffer;
        }
    }

}

?>