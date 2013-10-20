<?php

class SiteConfig_SocialLinks extends DataExtension{
	
	static $many_many =  array(
		'SocialLinks' => 'SocialLink'
	);

	static $many_many_extraFields = array(
		'SocialLinks' => array(
			'Sort' => 'Int'
		)
	);
	
	function updateCMSFields(FieldList $fields){
		
		$fields->addFieldToTab("Root.SocialLinks",
			GridField::create(
				"SocialLinks",
				"Social Network Links",
				$this->owner->SocialLinks(),
				$config = GridFieldConfig_RelationEditor::create()
			)
		);

		if(class_exists("GridFieldOrderableRows")){
			$config->addComponent(new GridFieldOrderableRows());
		}
		
	}
	
}