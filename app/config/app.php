<?php
return [
    /*
	 |------------------------------------------------------------
	 | Site
	 |------------------------------------------------------------
	 | Site titles, description, and meta tags.
	 */
    // Website Title. Used in <title>
    'title'       => 'Thistle',

    // Short Website Description. Used in <title>
    'seotitle'    => 'Thistle: MVC Framework from Affinity4',

    // Long Website Description. Used for meta description
    'desc'        => 'Thistle is a small, modular MVC framework for rapid RESTful website development.',

    // Used in <meta author="..."> tag
    'author'      => 'Luke Watts',

    // Used on the <html lang="..."> tag
    'lang'        => 'en',

    // Used on <meta charset="...">
    'charset'     => 'utf-8',

    // Turn this to true to allow search engines to crawl and index pages.
    'searchable'  => false,

    // If urls are being incorrectly generated add the full url WITH a trailing slash here ( 'http://example.com/' )
    'url'         => '', 

    /* -----------------------------------------------------------
     | Active Plugins
     | -----------------------------------------------------------
     | To activate a plugin simply add it's name to this array.
     | If a plugin is not within this array it will not be loaded. 
     */
    'active_plugins' => [],

    /* -----------------------------------------------------------
     | Debug Mode
     | -----------------------------------------------------------
     | You can set this based on your environment. Default: false
     */
    'debug_mode' => getenv('DEBUG') // Turn this to true to enable php errors on production servers. DEFAULT: false
];
