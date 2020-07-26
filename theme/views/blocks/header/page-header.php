<?php
/**
 * Page Header Template Block (Header Block)
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */  

?>
<header id="page-header" class="<?= $this->getHeaderType() ?>" <?= ((!$this->isTypeDefault()) ? 'style="background-color: '.$this->header_background_color.' ;"' : '')  ?>>
    <div class="upper-header-wrapper container-block">
        <div class="uh-content content-block">
            <div class="tb-wr uhc-table">
                <div class="tb-c-wr logo-cell va-middle">
                    <a href="<?= get_site_url(null, ''); ?>">
                        <img src="<?= $this->header_logo['url'] ?>" alt="<?= $this->header_logo['alt'] ?>" />
                    </a>
                </div>
                <div class="tb-c-wr nav-cell va-middle">
                    <nav id="main-navigation" class="desktop-only">
                        <?php $this->loadBlockTemplate('header/navigation'); ?>
                    </nav>
                    <div id="hamburger-menu" class="mobile-menu-trigger mobile-only">
                        <div class="hm-bar"></div>
                        <div class="hm-bar"></div>
                        <div class="hm-bar"></div>
                    </div>
                    <div id="mobile-menu">
                        <div class="mm-main-wrap">
                            <div class="mobile-nav-wrapper">
                                <nav>
                                    <?php $this->loadBlockTemplate('header/navigation'); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>