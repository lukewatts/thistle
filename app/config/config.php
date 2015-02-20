<?php
/*
 * Used to create fill in hte <title> tag as well as other <meta> tags.
 */
$site = array(
  'title'       => 'Thistle', // Website Title. Used in <title>
  'seotitle'    => 'Thistle: Hybrid CMS by Affinity4', // Short Website Description. Used in <title>
  'description' => '', // Long Website Description. Used for meta description
  'author'      => 'Luke Watts', // Used in <meta author="..."> tag
  'lang'        => 'en',         // Used on the <html lang="..."> tag
  'charset'     => 'utf-8',      // Used on <meta charset="...">
  'assets'      => 'assets',     // Used in the HTML::css() and HTML::js() methods. Change if you rename assets dir
  'searchable'  => false,        // Turn this to true to allow search engines to crawl and index pages.
  'url'         => '', // If urls are being incorrectly generated add the full url WITH a trailing slash here ( 'http://example.com/' )
  // Urls are known to be incorrectly generated if index.php is in a subdirectory of your servers root (e.g. http://example.com/sites/your-website)
);

/*
 * TODO: Use for creating meta descriptions on each page through Meta class
 */
$page_meta = array(
  'index' => array(
    'name'        => 'Home',
    'description' => ''
  ),
  'about' => array(
    'name'        => 'About',
    'description' => ''
  ),
  'work'  => array(
    'name'        => 'Portfolio',
    'description' => ''
  ),
  'news' => array(
    'name'        => 'News',
    'description' => ''
  ),
  'contact' => array(
    'name'        => 'Contact',
    'description' => ''
  ),
  '404' => array(
    'name'        => '404',
    'description' => ''
  )
);

/*
 * To activate a plugin simply add it's name to this array.
 * If a plugin is not within this array it will not be loaded.
 */
$active_plugins = array();


/* ==============================
 * ADVANCED SETTINGS
 * ============================== */
$development_mode = true; // Turn this to true to use non-minified resources (css | js). DEFAULT: false
$debug_mode = false;  // Turn this to true to enable php errors on production servers. DEFAULT: false
$environment = ''; // Only change this if you know the implications. DEFAULT: ''