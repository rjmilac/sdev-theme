<?php 
/**
 * Content Area Panel
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 1.0
 */     

    $content = get_the_content(null, false, $this->current_id);
    $pv = (isset($panel_vars)) ? $panel_vars : [];

    if(!empty($content)) :  
?>

    <div class="panel panel-the-content" <?= (!empty($pv['panel_html_id'])) ? 'id="'.$pv['panel_html_id'].'"' : ''; ?>>

        <div class="panel-wrapper container-block">
            <?php if(isset($pv['panel_title'])): 
                if(!empty($pv['panel_title'])):?>
                    <h3><?= $pv['panel_title'] ?></h3>
                <?php endif; 
            endif; ?>
            <div class="panel-content">
                <?php 
                    echo apply_filters('the_content', $content);
                ?>
            </div>
        </div>

    </div>

<?php endif; ?>