<?php
    /**
     *  SDEV Dependencies
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    $sdev_di = [
        'core' => [
            'utils',
            'model',
            'block',
            'controller'
        ],
        'interface' => [
            'block_list',
            'model_data_object',
            'wp_xhr_action_controller'
        ],
        'model' => [
            'post'
        ],
        'block' => [
            'header',
            'footer'
        ],
        'controller' => [
            'page'
        ]
    ];

?>