<?php

require_once 'classes/Language.php';

function _getHeader($data = [])
{
    extract($data);
    require_once 'resources/header.php';
}

function _getFooter($data = [])
{
    extract($data);
    require_once 'resources/footer.php';
}

function _translate($text)
{
    $translations = [];
    if (Language::current() === Language::english())
        $translations = require 'resources/localization/en.php';
    else
        $translations = require 'resources/localization/et.php';

    if (!array_key_exists($text, $translations))
        return $text;

    return $translations[$text];
}
