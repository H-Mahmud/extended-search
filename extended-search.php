<?php
/*
 * Plugin Name:       Extended Search
 * Plugin URI:        https://github.com/H-Mahmud/extended-search/
 * Description:       Extended Search enhances WordPress search by querying specific fields in a custom database table, replacing the default search behavior that targets the posts table.
 * Version:           1.4.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mahmudul Hasan
 * Author URI:        https://github.com/H-Mahmud/
 * License:           UNLICENSED
 * Text Domain:       extended-search
 * Domain Path:       /languages
 */
defined('ABSPATH') || exit();

// define plugin constants
define('EXTENDED_SEARCH_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('EXTENDED_SEARCH_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));


// Add dependencies
require EXTENDED_SEARCH_PLUGIN_DIR_PATH . 'inc/validation-notice.php';
require EXTENDED_SEARCH_PLUGIN_DIR_PATH . 'inc/class-search-modify.php';
