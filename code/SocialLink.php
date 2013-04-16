<?php 

class SocialLink extends DataObject{
	
	static $db = array(
		"Name" => "Varchar",
		"Identifier" => "Varchar",
		"URL" => "Varchar" 	
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
		$source = file(SOCIALLINKS_PATH."/networklist");
		asort($source);
		return DropdownField::create($name, $title,array_combine($source, $source));
	}
	
}

class SiteConfig_SocialLinks extends DataExtension{
	
	static $many_many =  array(
		'SocialNetworks' => 'SocialLink',
	);
	
	function updateCMSFields(FieldList $fields){
		
		$config = GridFieldConfig_RelationEditor::create();
		$fields->addFieldToTab("Root.SocialNetworks", new GridField("SocialNetworks","Social Networks",$this->owner->SocialNetworks(),$config));
		
	}
	
}