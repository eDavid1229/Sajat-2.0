<?php

class Model
{

	public static function index()
	{
		$uri = "mongodb+srv://emalon80:K58ngl467@cluster0.fpr0ud1.mongodb.net/?retryWrites=true&w=majority";
		$client = new MongoDB\Client($uri);
		self::$db = $client->my_firstproject;
	}
	public static function InsertLake($myproject)
	{
		$collection = self::$db->myproject;
		return $collection->insertOne($myproject);
	}
	public static function SelectLakes()
	{
		$collection = self::$db->myproject;
		
		$sort = ['lakename' => 1];
		$list = $collection ->find([], ['sort'=> $sort]);
		
		return $list->toArray();
	}
	
	private static $db;
}