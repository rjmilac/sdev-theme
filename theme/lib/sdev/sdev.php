<?php
    /**
     *  SDEV Bootstrap file
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    require_once('loader.php');
    require_once('etc/di.php');

    try{

        $SDEV_LOADER = new \SDEV\Loader();
        $SDEV_LOADER->loadDependencies($sdev_di);

    } catch (\Exception $e){

        exit($e->getMessage());
        
    }

?>