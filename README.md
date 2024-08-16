# Extended Search Plugin

**Extended Search** is a custom WordPress plugin designed to enhance the default WordPress search functionality by extending it to query a custom database table. The plugin allows you to search specific fields in the custom table while removing the default WordPress search behavior that queries the posts table.

## Features

-   Extends the WordPress search functionality to join a custom database table.
-   Searches specific fields within the custom table.
-   Disables the default WordPress search that targets the posts table.

## Requirements

-   WordPress 5.2 or higher
-   PHP 7.2 or higher

## Installation

1. Download the plugin zip file.
2. Navigate to the `Plugins` section in your WordPress dashboard.
3. Click on `Add New` and then `Upload Plugin`.
4. Choose the downloaded zip file and click `Install Now`.
5. After the installation is complete, click `Activate` to enable the plugin.

## Usage

Once activated, the **Extended Search** plugin automatically modifies the default WordPress search behavior. It:

-   Joins the search query with a specified custom database table.
-   Searches for terms in the custom table's defined fields.
-   Excludes the posts table from being searched, focusing entirely on the custom table.

### Example

If you have a custom table named `wp_ttdn_meta_customtable` with fields like `mst`, `ten_cong_ty`, etc., the plugin will modify the search query to search within these fields.

## Customization

To customize the plugin behavior, such as specifying which custom table and fields to search, you can modify the plugin settings in the `class-search-modify` file.
