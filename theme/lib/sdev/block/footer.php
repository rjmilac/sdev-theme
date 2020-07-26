<?php
    /**
     *  Footer BLock
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Block;

    class Footer extends \SDEV\Block{

        public $footer_data = array();

        public function __construct(){
            parent::__construct();    

            $this->footer_data = array(
                'footer_background_type' => get_field('footer_background_type', 'option'),
                'footer_background_color' => get_field('footer_background_color', 'option'),
                'footer_background_image' => get_field('footer_background_image', 'option'),
                'copyright_line' => get_field('copyright_line', 'option')
            );
        }

        public function getMenuItems($menu = 'Footer Menu'){
            return \SDEV\Utils::getMenuItems($menu);
        }
    }

?>