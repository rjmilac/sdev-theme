<?php
/**
 * Header template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
		<?php wp_head(); ?>
        <?php if(defined('404_PAGE_INIT')) { ?>
            <title>Page not found - <?= get_bloginfo('name') ?></title>
        <?php } else { ?>
            <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php } ?>
		<link rel="stylesheet" href="<?= \SDEV\Utils::getThemeResourcePath('dist/style.css'); ?>" type="text/css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <?php
            $header_block = new \SDEV\Block\Header();
			$header_block->loadBlockTemplate('header/before-body');
        ?>
	</head>
    <body <?php body_class(); ?>>

		<?php $header_block->loadBlockTemplate('header/preloader'); ?>

		<div id="page-main" class="body-unload <?= $header_block->getHeaderType() ?>">

            <?php $header_block->loadBlockTemplate('header/page-header'); ?>
            