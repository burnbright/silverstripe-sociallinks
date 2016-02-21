<?php 

class SocialLink extends DataObject
{
    
    private static $db = array(
        "Name" => "Varchar",
        "Identifier" => "Varchar",
        "URL" => "Varchar(500)"
    );
    
    private static $has_one = array(
        "Parent" => "SiteConfig"
    );

    public static function networks()
    {
        $networks = self::config()->networks;
        return $networks ? $networks : self::config()->networks_default;
    }

    public static function dropdown($name = "SocialLinks", $title = "Social Links", $networks = null)
    {
        //fallback to stored list
        $networks = $networks ? $networks : self::networks();
        return DropdownField::create($name, $title, $networks);
    }
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->push(self::dropdown("Identifier", "Network"));
        $fields->removeByName("ParentID");

        return $fields;
    }

    public function getFrontEndFields($params = null)
    {
        $fields = parent::getFrontEndFields($params);
        $fields->removeByName("Identifier");
        $fields->removeByName("ParentID");
        $fields->removeByName("Name");
        $fields->unshift(self::dropdown("Identifier", "Network"));
        $this->extend('updateFrontEndFields', $fields);

        return $fields;
    }
    
    public function getName()
    {
        if ($name = $this->getField("Name")) {
            return $name;
        }
        $networks = self::networks();
        if ($this->Identifier && isset($networks[$this->Identifier])) {
            return $networks[$this->Identifier];
        }
    }

    /**
     * Never allow identifier to be set back to empty
     */
    public function saveIdentifier($identifier)
    {
        if ($identifier) {
            $this->Identifier = $identifier;
        }
    }

    public function getTitle()
    {
        return $this->getName();
    }

    public function canCreate($member = null)
    {
        return true;
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return true;
    }

    public function canDelete($member = null)
    {
        return true;
    }
}
