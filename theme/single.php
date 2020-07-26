<?php 
/* Template Name: Default Single Template
 * Template Post Type: post, page
 */
/**
 * Default Single Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */
    get_header(); ?>

        <div id="page-content" class="page-panels" data-tpl="single">

            <?php 

                $page_controller->renderPanels([
                    [
                        'acf_fc_layout' => 'hero',
                        'hero_type' => 'single',
                        'panel_title' => 'News'
                    ],
                    [
                        'acf_fc_layout' => 'the-content',
                        'panel_title' => get_the_title()
                    ]
                ], 'acf_panels', 'views/panels');

            ?>
        
        </div>

    <?php get_footer(); ?>