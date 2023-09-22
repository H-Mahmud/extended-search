<?php
function is_extended_search_table_exists()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'ttdn_meta_customtable';

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") !== $table_name) {
        return false;
    }
    return true;
}

function extended_search_table_not_found_notice()
{
    if (is_extended_search_table_exists()) return;
?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e('The custom table "wp_ttdn_meta_customtable" does not exist. Please take action to create it.', 'text-domain'); ?></p>
    </div>
<?php
}

add_action('admin_init', 'extended_search_table_not_found_notice', 10);
