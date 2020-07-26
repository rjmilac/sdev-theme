<?php
    /**
     *  SDEV Utiliy functions
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV;

    class Utils{

        public static function resizeImage($resource, $options = array()){
            $w = (isset($options['w'])) ? $options['w'] : 150;
            $h = (isset($options['h'])) ? $options['h'] : 150;
            $q = (isset($options['q'])) ? $options['q'] : 95;
            
            $path = self::getThemeResourcePath('timthumb.php').'?src='.$resource.'&w='.$w.'&h='.$h.'&q='.$q;
            return $path;
        }

        public static function getThemeResourcePath($resource){
            return get_template_directory_uri().'/'.ltrim($resource,'/');
        }

        public static function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
            $sort_col = array();
            foreach ($arr as $key=> $row) {
                $sort_col[$key] = $row[$col];
            }
            array_multisort($sort_col, $dir, $arr);
        }
        
        public static function getPageId(){
            global $wp_query;
            if(is_post_type_archive()){
                $wquery = $wp_query->query;
                $post_type = $wquery['post_type'];
                $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'archive-'.$post_type.'.php'
                ));
                if(!$pages){
                    $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'archive.php'
                    ));
                }
                foreach($pages as $page){
                    return $page->ID;
                    break;
                }
            }
            if(is_404() || defined('404_PAGE_INIT')){
                $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => '404.php',
                    'post_status' => 'private'
                ));
                foreach($pages as $page){
                    return $page->ID;
                    break;
                }
            }
            if(defined('SEARCH_PAGE_INIT')){
                $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'search.php'
                ));
                foreach($pages as $page){
                    return $page->ID;
                    break;
                }
            }
            return get_post()->ID;
        }

        public static function getMenuItems($menu = 'Main Menu'){
            return wp_get_nav_menu_items($menu);
        }
        
        public static function getMenuItemClass($curr_url, $item_url, $class = 'nav-item', $active_class = 'nav-active'){
            if (strpos($curr_url, $item_url) !== false) {
                $class .= ' '.$active_class;
            } 
            return $class;
        }

    }