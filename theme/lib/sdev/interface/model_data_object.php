<?php
    /**
     *  Model Data Array  interface
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Interfaces;

    interface ModelDataObject{

        public function setData($key = '', $value = '');
        public function getData();
        
    }

?>