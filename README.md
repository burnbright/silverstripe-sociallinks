# Social Links

A quick and easy way to store, retrieve, and style social media links.

You could configure it to be multiple social links per:

 * Website (SiteConfig)
 * Member
 * Organisation ([shameless plug](https://github.com/burnbright/silverstripe-organisations))

## Supported social networks

Being able to configure the list of social networks means you can align the list with the icons you have available, perhaps via your [icon font](http://www.entypo.com).

You can configure the list of available social networks by adding a yaml config, as such:

```yaml
SocialLink:
  networks:
    facebook: Facebook
    linkedin: LinkedIn
    skype: Skype
    twitter: Twitter
    website: Website
```

If you don't specify a configuration of networks, then a default list will kick in.

## Member extension

Add the `SocialLinkMemberExtension` extension to Member to allow each member to have multiple extensions.

```yaml
Member:
    extensions:
        - SocialLinkMemberExtension
```