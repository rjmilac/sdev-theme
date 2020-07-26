<?php 
/* Template Name: Search Template
 * Template Post Type: post, page
 */
/**
 * Default template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */
    define('SEARCH_PAGE_INIT', true);
    get_header(); ?>

        <div id="page-content" class="page-panels" data-tpl="search">

            <?php 
                
                $page_controller->renderPanels([], 'acf_panels', 'views/panels');

            ?>
        
        </div>

    <?php get_footer(); ?>