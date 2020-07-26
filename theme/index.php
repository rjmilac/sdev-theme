<?php 
/* Template Name: Default Template
 * Template Post Type: post, page
 */
/**
 * Default template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */
    get_header(); ?>

        <div id="page-content" class="page-panels" data-tpl="index">

            <?php 

                $page_controller->renderPanels([], 'acf_panels', 'views/panels');

            ?>
        
        </div>

    <?php get_footer(); ?>