<?php
error_reporting(E_ALL);
ini_set("display_errors", "on");

require_once 'vendor/autoload.php';
require_once 'system/Req.php';
require_once 'system/views/begin.php';
require_once 'system/Model.php';
require_once 'system/View.php';

Model::index();

if(Req::NewLakeSub())
{
	$myproject = Req::GetLakePostData();
	Model::InsertLake($myproject);
}
	
View::ShowLakelist();
View::Createleak();

$myproject = Model::SelectLakes();
View::ShowLakes($myproject);

require_once 'system/views/end.php';