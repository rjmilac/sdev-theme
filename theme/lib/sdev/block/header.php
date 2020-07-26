<?php
    /**
     *  Header BLock
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Block;

    class Header extends \SDEV\Block{

        public $curr_url, $site_logo, $preloader_logo, $header_background_color, $header_type;
        public $social_data;
        public $default_header_type = 'ht-transparent';
        public $acfields = array(
            'header_background_type' => 'header_background_type',
            'header_background_color' => 'header_background_color',
            'site_logo' => 'site_logo',
            'preloader_image' => 'preloader_image'
        );

        public function __construct(){
            parent::__construct();    
            $this->curr_url = rtrim(get_permalink(), '/').'/';
            $this->header_logo = get_field($this->acfields['site_logo'], 'option');
            $this->preloader_image = get_field($this->acfields['preloader_image'], 'option');
            $this->header_background_color = get_field($this->acfields['header_background_color']);
            $this->header_type = (get_field($this->acfields['header_background_type'])) ? get_field($this->acfields['header_background_type']) : $this->default_header_type;
        }

        public function getMenuItems($menu = 'Main Menu'){
            $menu_items = \SDEV\Utils::getMenuItems($menu);
            $last_parent = 0; 
            $m_count = 0;
            $final_menu_items = array(); 
            $sub_menu_items = array();
            foreach($menu_items as $menu_item) {
                if($menu_item->menu_item_parent == 0) {
                    if($last_parent != 0){
                        $final_menu_items[$m_count-1]['submenu'] = $sub_menu_items;
                        $last_parent = 0;
                    }
                    $sub_menu_items = array();
                    $final_menu_items[$m_count] = array('item' => $menu_item, 'submenu' => array());
                    $m_count++;
                } else {
                    if($last_parent == 0){ $last_parent = $menu_item->menu_item_parent; }
                    array_push($sub_menu_items, $menu_item);
                }
            }
            return $final_menu_items;
        }

        public function getHeaderType(){
            return $this->header_type;
        }

        public function isTypeDefault(){
            return ($this->header_type == $this->default_header_type);
        }

    }

?>