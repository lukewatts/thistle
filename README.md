- **Name:** Thistle
- **Description:** Thistle is a small, modular framework for quickly turning a normal "static" html site into a "hybrid" CMS.
- **Authors:** Luke Watts (Affinity4.ie)
- **Author Website:** http://affinity4.ie
- **Version:** 3.0.0
- **License:** MIT

Thistle is a small, modular framework for quickly turning a normal static html site into a "hybrid" CMS.

An MVC backend will allow for handling database and content while the front end can remain non-MVC. The front end can use as much or as little of the classes provided as long as it use the base template functions for inserting plugins and content from the database.

Compatitbility
--------------
- PHP 5.2+ compatible
- Composer compatible
- PHPMailer compatible

Known Issues
------------
If your root folder is in a subdirectory of your server you will need to set the $site['url'] field in app/config/config.php for Thistle to work.

Future Features
---------------
- SwiftMailer compatibility
- Slider plugin
- Masonry Portfolio plugin
- Admin "layer" is still under development
- "Thorns" API (more to come)