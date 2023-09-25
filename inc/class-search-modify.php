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
     * @version 2.0.0
     */
    public function search_on_custom_table($where, $wp_query)
    {
        if (!is_search()) return $where;

        global $wpdb;
        $table_name = $wpdb->prefix . 'ttdn_meta_customtable';

        $search_query = $wp_query->get('s');
        $keywords = explode(' ', $search_query);

        $where .= " AND (";

        foreach ($keywords as $keyword) {
            $value = '%' . esc_sql($wpdb->esc_like($keyword)) . '%';
            $where .= " $table_name.mst LIKE '$value' OR $table_name.ten_cong_ty LIKE '$value' OR $table_name.ho_ten_dai_dien_phap_luat LIKE '$value' OR";
        }

        $where = rtrim($where, ' OR');
        $where .= ")";


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
