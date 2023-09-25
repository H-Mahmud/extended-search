<?php
/*
 * Plugin Name:       Extended Search
 * Plugin URI:        https://github.com/H-Mahmud/extended-search/
 * Description:       Replace default WordPress search with custom table search.
 * Version:           1.2.0
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
