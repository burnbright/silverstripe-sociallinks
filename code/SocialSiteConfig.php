<?php

class SiteConfig_SocialLinks extends DataExtension
{
    
    public static $many_many =  array(
        'SocialLinks' => 'SocialLink'
    );

    public static $many_many_extraFields = array(
        'SocialLinks' => array(
            'Sort' => 'Int'
        )
    );
    
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab("Root.SocialLinks",
            GridField::create(
                "SocialLinks",
                "Social Network Links",
                $this->owner->SocialLinks(),
                $config = GridFieldConfig_RelationEditor::create()
            )
        );

        if (class_exists("GridFieldOrderableRows")) {
            $config->addComponent(new GridFieldOrderableRows());
        }
    }
}
