<?php 
/**
 * Hero Panel
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */     

    $pv = $panel_vars;

?>

    <div class="panel panel-hero" data-ht="<?= $pv['hero_type'] ?>" <?= (!empty($pv['panel_html_id'])) ? 'id="'.$pv['panel_html_id'].'"' : ''; ?>>

        <?php if($pv['hero_type'] == 'slider' && !empty($pv['hero_slides'])) : ?>            

            <div class="hero-carousel owl-carousel">

                <?php $si = 0; foreach($pv['hero_slides'] as $s) : ?>

                    <div class="hero-carousel-item" style="background-image: url('<?= $s['background_image'] ?>');">

                        <div class="container-block">

                            <div class="hci-content-wrap">
                                <h1><?= $s['slide_title'] ?></h1>
                                <?php if($s['cta_type'] == 'link' && $s['cta_link']) : ?>
                                    <a href="<?= $s['cta_link']['url']  ?>" target="<?= $s['cta_link']['target']  ?>" class="btn-primary"><?= $s['cta_link']['title']  ?></a>
                                <?php endif; ?>
                                <?php if($s['cta_type'] == 'anchor') : ?>
                                    <a href="#<?= (ltrim($s['section_anchor_id'],'#')) ?>" class="btn-primary ux-scroll-to-anchor">Read More</a>
                                <?php endif; ?>

                                <?php if(sizeOf($pv['hero_slides']) > 1) :?>
                                    <div class="carousel-navs">
                                        <span class="carousel-nav nav-dir nav-prev">
                                            <i class="fas fa-angle-left"></i>
                                        </span>
                                        <?php for($i=0; $i< sizeOf($pv['hero_slides']); $i++): ?>
                                            <span class="carousel-nav nav-bullet <?= ($i == $si) ? 'active-bullet' : ''; ?>" data-index="<?= $i ?>"></span>
                                        <?php endfor; ?>
                                        <span class="carousel-nav nav-dir nav-next">
                                            <i class="fas fa-angle-right"></i>
                                        </span>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php $si++; endforeach; ?>

            </div>

        <?php else : ?>

            <div class="hero-content container-block">
                <h1><?= $pv['panel_title'] ?></h1>
                <?php if(!empty($pv['panel_content'])):?>
                    <div class="hp-content">
                        <?= $pv['panel_content'] ?>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?>

    </div>