<?php
    /**
     *  SDEV Model Parent Class
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV;

    class Model{

        protected $wp_post_object;
        protected $data_fields = array();
        protected $data = array();
        protected $ID = null;

        public function __construct(){
        }

        public function setID($id){
            $this->ID = $id;
            return $this;
        }

        public function getID(){
            return $this->ID;
        }

        public function setWPPostObject(\WP_Post $_wp_post){
            $this->wp_post_object = $_wp_post;
            return $this;
        }

        public function getWPPostObject(){
            return $this->wp_post_object;
        }

        public function getData($key = false){
            if($key && isset($this->data[$key])){
                return $this->data[$key];
            }
            return $this->data;
        }

        public function setData($key = '', $value = ''){
            if(!empty($key) && !is_array($key)){
                $this->data[$key] = $value;
            }
            if(is_array($key)){
                $this->data = $key;
            }
            return $this;
        }

        public function createFromWPPostObject(\WP_Post $_wp_post){
            return $this->setWPPostObject($_wp_post)
                ->setID($this->wp_post_object->ID)
                ->setData([
                    'id' => $this->wp_post_object->ID,
                    'title' => $this->wp_post_object->post_title,
                    'date' => strtotime(get_the_date('F d, Y', $this->wp_post_object->ID)),
                    'permalink' => get_permalink($this->wp_post_object->ID),
                    'post_content' => get_the_content(null, false, $this->wp_post_object->ID)
                ]);
        }

    }

?>