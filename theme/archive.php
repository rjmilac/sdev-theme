<?php 
/* Template Name: Default Archive Template
 * Template Post Type: post, page, cpt_news
 */
/**
 * Default Archive Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */
    get_header(); ?>

        <div id="page-content" class="page-panels" data-tpl="archive">

            <?php 

                $page_controller->renderPanels([], 'acf_panels', 'views/panels');

            ?>
        
        </div>

    <?php get_footer(); ?>