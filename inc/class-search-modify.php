<?php

/**
 * Customize & Expand WordPress Default Search functionality
 * 
 * @since 1.0.0
 * @version 1.0.0
 */
class Extended_Search_Search_Modification
{

    /**
     * Run  hooks
     */
    public function run()
    {
        add_filter('posts_join', array($this, 'join_the_custom_table'), 10, 1);
        add_filter('posts_where', array($this, 'search_on_custom_table'), 100, 2);
        add_filter('posts_distinct', array($this, 'search_query_district'), 10, 1);
    }


    /**
     * Join ttdn_meta_customtable table with post table
     * 
     * @since 1.0.0
     * @version 1.0.0
     * 
     */
    public function join_the_custom_table($join)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ttdn_meta_customtable';

        if (is_search()) {
            $join .= " LEFT JOIN $table_name ON ($wpdb->posts.ID = $table_name.ID)";
        }
        return $join;
    }


    /**
     * Add custom table field for searching
     * 
     * @since 1.0.0
     * @version 1.0.0
     */
    public function search_on_custom_table($where, $wp_query)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ttdn_meta_customtable';

        if (is_search()) {
            $where = preg_replace(
                "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
                "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->posts . ".post_content LIKE $1) OR (" . $wpdb->posts . ".ID IN (
                    SELECT ID FROM " . $table_name . " WHERE mst LIKE $1 OR ten_cong_ty LIKE $1 OR ho_ten_dai_dien_phap_luat LIKE $1
                ))",
                $where
            );
        }

        return $where;
    }


    /**
     * District Search Query to avoid duplicate posts
     * 
     * @since 1.0.0
     * @version 1.0.0
     */
    function search_query_district($where)
    {
        global $wpdb;

        if (is_search()) {
            return "DISTINCT";
        }
        return $where;
    }
}


$search = new Extended_Search_Search_Modification();
$search->run();
