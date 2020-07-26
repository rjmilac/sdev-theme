<?php
/**
 * Preloader Template Block (Header Block)
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */  
?>
<div id="font-preloader">
    <span class="font-fam-1">a</span>
</div>

<div id="page-preloader">
    <div class="preloader-wrapper">
        <img src="<?= $this->preloader_image['url'] ?>" alt="<?= $this->preloader_image['alt'] ?>" /><br/>
        <img src="<?= \SDEV\Utils::getThemeResourcePath('assets/images/5.gif') ?>" class="loader" />
    </div>
</div>