<?php
/*
Plugin Name: Cookie Banner
Description: Shows an obnoxious cookie banner because the EU makes us!
Version: 1.0.0
Author: Rareloop
Author URI: http://www.rareloop.com
*/

// If we haven't loaded this plugin from Composer we need to add our own autoloader
if (!class_exists('Rareloop\CookieBanner')) {
    $autoloader = require_once('autoload.php');
    $autoloader('Rareloop\\', __DIR__ . '/src/Rareloop/');
}

\Rareloop\CookieBanner::init();
