<?php

class View
{
	public static function ShowLakes($items)
	{
		echo '<section class="p-4 bg-white shadow mb-4">';
		echo '<table class="table table-striped table-hover">';
		echo '<thead><tr>';
		echo '<th>Tó neve</th><th>Tó elhelyezkedése</th><th>Tó típusa</th>';
		echo '</tr><thead><tbody>';
		
		foreach ($items as $obj)
		{
			$lakename = "-";
			if(isset ($obj['lakename']))
			{
				$lakename = $obj['lakename'];
			}
			
			$lakelocation = "-";
			if(isset ($obj['lakelocation']))
			{
				$lakelocation = $obj['lakelocation'];
			}
			
			$laketype = "-";
			if(isset ($obj['laketype']))
			{
				$laketype = $obj['laketype'];
			}
			
			$id = $obj['_id']->serialize();
			
			echo '<tr>';
			echo '<td>'. $lakename .'</td>';
			echo '<td>'. $lakelocation .'</td>';
			echo '<td>'. $laketype .'</td>';
			echo '<td><a href=\'?details='. $id .'\' class="h5" title="Részletek"><i class="fa-solid fa-file-lines"></i></a></td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
		echo '</section>';
	}
	public static function ShowLakelist()
	{
		echo '<section class="p-4 bg-white shadow mb-4">';
		echo '<table class="table table-striped table-hover">';
		echo '<thead><tr>';
		echo '<th>Első próbálkozásom gyümölcse</th>';
		echo '</tr><thead><tbody>';
		
		echo '</tbody></table>';
		echo '</section>';
	}
	public static function Createleak()
	{
		echo '<section class="p-4 bg-white shadow mb-4>';
		echo '<h3 class="mb-4">Új tó hozzáadása</h3>';
		echo '<form method="post" action="">';
		
		echo self::CreateInput("Tó neve", "lakename");
		echo self:: CreateInput("Tó elhelyezkedése", "lakelocation");
		echo self:: CreateInput("Tó típusa", "laketype");
		
		echo '<button class="btn btn-primary" name="newSent"><i class="fa-solid fa-circle-plus"></i> Hozzáadás</button>';
		echo '</form>';
		
		echo '</section>';
		
	}
	
	public static function CreateInput($text,$name)
	{
		$html ='<div class="mb-5">';
		$html .='<label for="'. $name.'" class=form-label">'. $text .'</label>';
		$html .='<input type="text" name="'. $name .'" id="'. $name .'" class ="form-control">';
		$html .='</div>';
		
		return $html;
	}
	public static function LakeDetails($contact)
	{
		echo '<section class="p-4 bg-white shadow mb-4>';
		echo '<h3 class="mb-3">A tó részletes adata<h3>';
		echo '<table class="table"><tbody>';
		
		echo self::LakesItem("Tó neve", $contact, "lakename");
		echo self::LakesItem("Tó elhelyezkedése", $contact, "lakelocation");
		echo self::LakesItem("Tó típusa", $contact, "laketype");
		
		echo '</tbody></table>';
		echo '</section>';
	}
	
	private static function LakesItem($title,$contact, $key)
	{
		$html = '';
		
		if(isset($contact[$key]))
		{
			$value = $contact[$key];
			
				if(is_object($value))
				{
					$value = $value->getArrayCopy();
					$value = '<ul><li>'. implode('</li><li>', $value) .'</li></ul>';
				}
		
			$html .= ('<tr><td><strong>'. $title .'</strong></td>');
			$html .= ('<td class="display-6">'. $value .'</td></tr>');
		}
		
		return $html;
	}
	
}
