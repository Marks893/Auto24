<?php

require_once 'classes/Language.php';

function _getHeader()
{
    return require 'resources/header.php';
}

function _getFooter()
{
    return require 'resources/footer.php';
}

function _translate($text)
{
    $translations = [];
    if (Language::current() === Language::english())
        $translations = require_once 'resources/localization/en.php';
    else
        $translations = require_once 'resources/localization/et.php';

    if (!array_key_exists($text, $translations))
        return $text;

    return $translations[$text];
}
