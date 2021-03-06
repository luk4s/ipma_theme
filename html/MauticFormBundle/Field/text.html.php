<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$containerType     = (isset($type)) ? $type : 'text';
$defaultInputClass = (isset($inputClass)) ? $inputClass : 'input';

include __DIR__.'/field_helper.php';

if ($required) {
    $field['label'] = "{$field['label']} *";
}
$label = (!$field['showLabel']) ? '' : <<<HTML

                <label $labelAttr>{$field['label']}</label>
HTML;

$help = (empty($field['helpMessage'])) ? '' : <<<HTML

                <span class="mauticform-helpmessage">{$field['helpMessage']}</span>
HTML;

if ($containerType == 'textarea'):
$textInput = <<<HTML

                <textarea $inputAttr rows="4" style="max-width:66.66667%">{$field['defaultValue']}</textarea>
HTML;

else:
$textInput = <<<HTML

                <input {$inputAttr} type="$containerType"/>
HTML;
endif;

$html = <<<HTML

            <div $containerAttr class="input-group">{$textInput}{$label}{$help}     
                <p class="mauticform-errormsg message-error" style="display: none;">$validationMessage</p>           
            </div>

HTML;

echo $html;
