<?php

/**
* Social Link Member Extension
*/
class SocialLinkMemberExtension extends DataExtension
{
    
    private static $many_many = array(
        "SocialLinks" => "SocialLink"
    );
}
