<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$defaultInputClass = 'button';
$containerType     = 'button-wrapper';
include __DIR__.'/field_helper.php';

$buttonType = (isset($properties['type'])) ? $properties['type'] : 'submit';

$html = <<<HTML

            <div $containerAttr>
                <button type="$buttonType" name="mauticform[{$field['alias']}]" class="button button--default" $inputAttr value="1">
                {$field['label']}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.5 10.5" width="12" height="12">
                    <path d="M5.25 0l-.93.93L8 4.59H0v1.32h8L4.32 9.57l.93.93 5.25-5.25z"></path>
                </svg>
                </button>
            </div>
HTML;

echo $html;
