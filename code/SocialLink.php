<?php 

class SocialLink extends DataObject{
	
	static $db = array(
		"Name" => "Varchar",
		"Identifier" => "Varchar",
		"URL" => "Varchar(500)" 	
	);
	
	static $has_one = array(
		"Parent" => "SiteConfig"	
	);
	
	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->insertBefore(self::dropdown("Identifier","Network"), "Name");
		$fields->removeByName("ParentID");
		return $fields;
	}
	
	static function dropdown($name = "SocialLinks", $title = "Social Links"){
		$source = file(SOCIALLINKS_PATH."/networklist", FILE_IGNORE_NEW_LINES);
		asort($source);
		return DropdownField::create($name, $title,array_combine($source, $source))
			->setHasEmptyDefault(true);
	}
	
}
