<?php
    /**
     *  Post BLock
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Block;

    class Post extends \SDEV\Block implements \SDEV\Interfaces\BlockList{

        public function __construct(Array $options){
            parent::__construct();    
            $this->post_type = 'post';
            $this->taxonomy = 'category';
            $this->additional = $options;
        }

        public function setQueryArgs(){

            $this->query_args = array(
                'post_type' =>  $this->post_type,
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            
            $this->setOrder('date', 'desc')
                ->setMetaFields([
                    'acf_thumbnail_image',
                    'acf_excerpt'
                ]);

            return $this;

        }

        public function getList(){

            if(empty($this->query_args)){
                $this->setQueryArgs();
            }

            $this->runQuery();
            $list = $this->initial_posts;

            if(!empty($list)){
                foreach($list as $i){
                    $this->filtered_posts[] = new \SDEV\Model\Post(
                        $i, 
                        $this->meta_fields
                    );
                }
                $list = $this->getFinalList();
            }

            return $list;

        }

    }

?>