<?php

namespace Burnbright\SocialLinks;

use SilverStripe\ORM\DataExtension;

/**
 * Social Link Member Extension
 */
class MemberSocialLinksExtension
        extends DataExtension {

    private static $many_many = array(
        "SocialLinks" => SocialLink::class
    );

}
