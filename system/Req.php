<?php

class Req
{
	
	public static function NewLakeSub()
	{
		return isset($_POST["newSent"]);
	}
	public static function GetLakePostData()
	{
			$data = [];
			foreach($_POST as $key => $value)
			{
				if(!empty($value))
				{
					$data[$key] = $value;
				}
			}
			
			return $data;
	}
	public static function LakeDetailsRequest()
	{
		if(isset($_GET["details"]))
		{
			return $_GET["details"];
		}
		return null;
	}
}