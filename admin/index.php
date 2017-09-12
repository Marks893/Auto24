<?php

require '../autoload.php';

if (!Request::canViewAdminArea()) {
    _redirect('../index.php');
    exit();
}

echo 'This is admin area';