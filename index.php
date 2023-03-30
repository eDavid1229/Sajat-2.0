<?php
error_reporting(E_ALL);
ini_set("display_errors", "on");

require_once 'vendor/autoload.php';
require_once 'system/views/begin.php';
require_once 'system/Model.php';

Model::index();

View::Lakelist();

require_once 'system/views/end.php';