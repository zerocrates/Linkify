<?php
/**
 * @package Linkify
 * @copyright Copyright 2012, John Flatness
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 or any later version
 */

add_filter(array('Display', 'Item', 'Dublin Core', 'Creator'), 'linkify');
add_filter(array('Display', 'Item', 'Dublin Core', 'Subject'), 'linkify');

function linkify($text, $record, $elementText) {
    if (trim($text) == '') return $text;

    $elementId = $elementText->element_id;
    $url = uri('items/browse', array(
        'advanced' => array(
            array(
                'element_id' => $elementId,
                'type' => 'is exactly',
                'terms' => $text
            )
        )
    ));
    return "<a href=\"$url\">$text</a>";
}

