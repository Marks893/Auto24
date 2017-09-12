<?php

session_start();

require_once 'classes/App.php';
require_once 'classes/Database.php';
require_once 'classes/Language.php';
require_once 'classes/Hash.php';
require_once 'classes/User.php';
require_once 'classes/Auth.php';
require_once 'classes/Request.php';
require_once 'utils.php';

App::set('config.db', require 'config/db.php');
App::set('name', 'Auto24');