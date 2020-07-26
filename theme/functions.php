<?php
    /**
     * Functions.php
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since SDEV WP Theme 1.0
     */
    if(!isset($_SESSION)){
        session_start();
    }
    define('DEV_ENV', 1);

    if(DEV_ENV === 1){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    /* Edit from this part */

    if( function_exists('acf_add_options_page') ) {
        $parent = acf_add_options_page(
            array(
                'page_title' => 'Theme Settings',
                'menu_slug' => 'acf-options',
                'redirect'    => false
            )
        );
    }

    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(
            array(
                'page_title' => 'Theme Widgets',
                'menu_slug' => 'acf-widgets',
                'icon_url' => 'dashicons-layout'
            )
        );
    }

    function make_hidden_post_id_readonly($field) {
        // sets readonly attribute for field
        $field['readonly'] = 1;
        return $field;
    }

    function my_remove_wp_seo_meta_box() { }
    add_action('add_meta_boxes', 'my_remove_wp_seo_meta_box', 100);

    register_sidebar();
    
    add_filter('acf/load_field/name=ev_auth', 'make_hidden_post_id_readonly');

    // remove "Private: " from titles
    function remove_private_prefix($title) {
        $title = str_replace('Private: ', '', $title);
        return $title;
    }
    add_filter('the_title', 'remove_private_prefix');


    /* Do not edit beyond this line 
     ---------------------------------------------------------- */

    /* SDEV Bootstrap */
    require_once('lib/sdev/sdev.php');
    
    $page_controller = new \SDEV\Controller\Page();
    $page_controller->registerActions();

?>