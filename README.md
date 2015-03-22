- **Name:** Thistle
- **Description:** Thistle is a small, modular MVC framework for rapid RESTful website development.
- **Authors:** Luke Watts (Affinity4.ie)
- **Author Website:** http://affinity4.ie
- **Version:** 0.3.3
- **License:** MIT

**IMPORTANT:** Currently undergoing a complete rewrite, and as such is not usable. Rewritten version will have "Dependency Injection/Service Locator/Inversion of Control" Container, Http Handlers, routing and middleware 

Thistle is a small, modular MVC framework for rapid RESTful website development.

Compatitbility & Features
-------------------------
- PHP 5.3+ compatible
- Composer
- PHPMailer
- Eloquent ORM

Known Issues
------------
If your root folder is in a subdirectory of your server you will need to set the $site['url'] field in app/config/config.php for Thistle to work.

Future Features
---------------
- Twig PHP Templating Engine
- SwiftMailer compatibility
- Slider plugin
- Masonry Portfolio plugin
- "Thorns" API (where the rapid REST will come from...)