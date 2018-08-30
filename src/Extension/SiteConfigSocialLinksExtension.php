<?php

namespace Burnbright\SocialLinks;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\Tab;
use SilverStripe\ORM\DataExtension;

class SiteConfigSocialLinksExtension
        extends DataExtension {

    private static $has_many = [
        'SocialLinks' => SocialLink::class
    ];

    public function updateCMSFields(FieldList $fields) {
        $fields->insertAfter('Main', new Tab('SocialLinks', _t(__CLASS__ . '.TAB_SOCIALLINKS', 'Social Links')));

        $config = GridFieldConfig_RelationEditor::create();

        // create a GridField to manage what Locales this Page can be displayed in.
        $fields->addFieldToTab(
                'Root.SocialLinks', GridField::create(
                        'SocialLinks', //
                        _t(__CLASS__ . '.SOCIAL_NETWORK_LINKS', 'Social Network Links'), //
                        $this->owner->SocialLinks(), //
                        $config
        ));
    }

}
