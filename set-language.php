<?php

require 'autoload.php';

if (isset($_POST['language'])) {
    $lang = filter_input(INPUT_POST, 'language', FILTER_VALIDATE_INT);
    $redirectUrl = filter_input(INPUT_POST, 'redirectUrl', FILTER_SANITIZE_STRING);

    if ($lang === Language::english() || $lang === Language::estonian())
        Language::set($lang);

    _redirect($redirectUrl);
}