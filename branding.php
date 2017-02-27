<?php
/*
Plugin Name: Branding
Plugin URI: branding
Description: Make your login page beautiful. Be different. Customize your WordPress login page. Hero Login Styler allows you to quickly and easily create stylish and professional login screens which extend and incorporate the look and feel of the host website and/or the target management interface.
Version: 1.0
Author: Guriev Eugen & Vitaliy Shebela
Author URI: https://lolitaframework.com/
License: GPLv2 or later
Text Domain: branding
*/
// ==============================================================
// Bootstraping Lolita Framework 1.0
// ==============================================================
if (!class_exists('\branding\LolitaFramework')) {
    require_once('LolitaFramework/LolitaFramework.php');
    $lolita_framework = \branding\LolitaFramework::getInstance(__DIR__);
    \branding\LolitaFramework::define('BASE_DIR', $lolita_framework->baseDir());
    \branding\LolitaFramework::define('BASE_URL', $lolita_framework->baseUrl());
    $lolita_framework->addModule('Configuration');
    $lolita_framework->addModule('CssLoader');
}