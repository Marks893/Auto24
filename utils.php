<?php

function _redirect($to)
{
    header('Location: ' . $to);
}

function _escape($text)
{
    return htmlentities($text, ENT_QUOTES, 'UTF-8');
}

function _old($field, $default = '')
{
    if (isset($_POST[$field]))
        return $_POST[$field];
    else if (isset($_GET[$field]))
        return $_GET[$field];

    return $default;
}

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

function _validationSummary($errors = [])
{
    if (empty($errors)) return;

    extract($errors);

    require_once 'resources/components/errors.php';
}

function _translate($text, $params = [])
{
    $translations = [];
    if (Language::current() === Language::english())
        $translations = require 'resources/localization/en.php';
    else
        $translations = require 'resources/localization/et.php';

    if (!array_key_exists($text, $translations))
        return $text;
    
    $translated = $translations[$text];

    if (!empty($params)) {
        for ($i = 0; $i < count($params); $i++) {
            $translated = str_replace('{' . $i . '}', $params[$i], $translated);
        }
    }

    return $translated;
}
