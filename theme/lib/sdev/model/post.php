<?php
    /**
     *  Post Model
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Model;

    class Post extends \SDEV\Model implements \SDEV\Interfaces\ModelDataObject{

        public function __construct($wp_post = null, $data_fields = array()){
            parent::__construct();
            if($wp_post && $wp_post instanceof \WP_Post){
                $this->createFromWPPostObject($wp_post);
            } else {
                $this->setID($wp_post);
            }
            $this->data_fields = $data_fields;
            $this->setDataByID();
        }

        public function setDataByID(){
            
            foreach($this->data_fields as $df){
                $this->setData($df, get_field($df, $this->ID));
            }

            return $this;
        }

    }

?>