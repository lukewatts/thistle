<?php
return [
    /*
	|--------------------------------------------------------------------------
	| Site
	|--------------------------------------------------------------------------
	|
	| Site titles, description, and meta tags.
	|
	*/
    'site' => [
        'title'       => 'Thistle', // Website Title. Used in <title>
        'seotitle'    => 'Thistle: Hybrid CMS by Affinity4', // Short Website Description. Used in <title>
        'desc'        => '', // Long Website Description. Used for meta description
        'author'      => 'Luke Watts', // Used in <meta author="..."> tag
        'lang'        => 'en',         // Used on the <html lang="..."> tag
        'charset'     => 'utf-8',      // Used on <meta charset="...">
        'searchable'  => false,        // Turn this to true to allow search engines to crawl and index pages.
        'url'         => '', // If urls are being incorrectly generated add the full url WITH a trailing slash here ( 'http://example.com/' )
        // Urls are known to be incorrectly generated if index.php is in a subdirectory of your servers root (e.g. http://example.com/sites/your-website)
    ],

    /* -----------------------------------------------------------
    | To activate a plugin simply add it's name to this array.
    | If a plugin is not within this array it will not be loaded.
    * ----------------------------------------------------------- */
    'active_plugins' => [],

    /* ==============================
     * ADVANCED SETTINGS
     * ============================== */
    'debug_mode' => getenv('DEBUG')      // Turn this to true to enable php errors on production servers. DEFAULT: false
];
