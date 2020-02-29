<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$defaultInputFormClass = ' not-chosen';
$defaultInputClass     = 'selectbox';
$containerType         = 'select';

include __DIR__.'/field_helper.php';

if (!empty($properties['multiple'])) {
    $inputAttr .= ' multiple="multiple"';
}

$label = (!$field['showLabel']) ? '' : <<<HTML

                <h2>{$field['label']}</h2>
HTML;

$help = (empty($field['helpMessage'])) ? '' : <<<HTML

                <span class="mauticform-helpmessage">{$field['helpMessage']}</span>
HTML;

$emptyOption = '';
if ((!empty($properties['empty_value']) || empty($field['defaultValue']) && empty($properties['multiple']))):
    $emptyOption = <<<HTML

                    <option value="">{$properties['empty_value']}</option>
HTML;
endif;

$optionBuilder = function (array $list, $emptyOptionHtml = '') use (&$optionBuilder, $field, $view) {
    $html = $emptyOptionHtml;
    foreach ($list as $listValue => $listLabel):
        if (is_array($listLabel)) {
            // This is an option group
            $html .= <<<HTML

                    <optgroup label="$listValue">
                    {$optionBuilder($listLabel)}
                    </optgroup>

HTML;

            continue;
        }

    $selected  = ($listValue === $field['defaultValue']) ? ' selected="selected"' : '';
    $html .= <<<HTML
                    <option value="{$view->escape($listValue)}"{$selected}>{$view->escape($listLabel)}</option>
HTML;
    endforeach;

    return $html;
};

$optionsHtml = $optionBuilder($list, $emptyOption);
$html        = <<<HTML

            <div $containerAttr class="input-group">{$label}{$help}
                <select class="dropdown-input custom-select custom-select-lg" $inputAttr >$optionsHtml
                </select>
                <span class="mauticform-errormsg" style="display: none;">$validationMessage</span>
            </div>

HTML;

echo $html;
