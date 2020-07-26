<?php
/**
 * Footer template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */
    $footer_block = new \SDEV\Block\Footer();

    $bg_type = $footer_block->footer_data['footer_background_type'];
    if($bg_type == 'image'){
        $background_style = 'background-image: url('.$footer_block->footer_data['footer_background_image'].');';
    } else {
        $background_style = 'background-color: '.$footer_block->footer_data['footer_background_color'].';';
    }

?>

        <footer id="page-footer" style="<?= $background_style ?>">
            <?php
                $footer_block->loadBlockTemplate('footer/upper');
                $footer_block->loadBlockTemplate('footer/lower');
            ?>
        </footer>
    </div> <!-- page main wrapper -->
    <div class="non_visual_wrapper opt__step">
        <?php wp_footer(); ?>
        <script type="text/javascript" src="<?= \SDEV\Utils::getThemeResourcePath('dist/bundle.js'); ?>" data-devenv="<?= DEV_ENV ?>"></script>
    </div>
    <?php
        $footer_block->loadBlockTemplate('footer/before-body-end');
    ?>
</body>
</html>