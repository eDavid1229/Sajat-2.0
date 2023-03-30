<?php

class Model
{

	

	public static function index()
	{
		$uri = "mongodb+srv://emalon80:K58ngl467@cluster0.fpr0ud1.mongodb.net/?retryWrites=true&w=majority";
		$client = new MongoDB\Client($uri);
		self::$db = $client->my_firstproject;
	}
}