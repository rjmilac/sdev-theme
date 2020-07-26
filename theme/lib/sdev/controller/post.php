<?php
    /**
     *  Product Controller
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Controller;

    class Post extends \SDEV\Controller implements \SDEV\Interfaces\WPXHRActionControllerInterface {

        public function __construct(){
            parent::__construct();    
        }

        public function registerActions(){
            add_action( 'wp_ajax_post_load_more', array($this, 'loadMore') );
            add_action( 'wp_ajax_nopriv_post_load_more', array($this, 'loadMore') );
        }
        
        public function loadMore(){

            $data = array(
                'success' => false,
                'message' => 'Bad Request',
                'code' => 400
            );

            if( isset($this->post['page_number']) && isset($this->post['page_size']) && isset($this->post['search_string']) ){

                $results = array();
                $page = $this->post['page_number'];
                $page_size = $this->post['page_size'];

                $post_block = new \SDEV\Block\Post([
                    'page_size' => $page_size
                ]);

                if(!empty($this->post['search_string'])) : 
                    $results = $post_block->setQueryArgs()->setSearch($this->post['search_string'])->setPage($page)->getList();
                endif;

                $data = array(
                    'success' => true,
                    'code' => 200,
                    'results' => (array)$results,
                    'next_page' => (sizeOf($results) >= $page_size) ? ($page+1) : false
                );

            }

            echo json_encode($data);
            exit;

        }

    }

?>