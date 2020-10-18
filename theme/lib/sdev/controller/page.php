<?php
    /**
     *  Page Controller
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV\Controller;

    class Page extends \SDEV\Controller implements \SDEV\Interfaces\WPXHRActionControllerInterface {

        protected $current_id = false;

        public function __construct(){
            parent::__construct();
        }

        public function registerActions(){
        }

        public function setCurrentId($id = false){
            if(!$id){ $id = \SDEV\Utils::getPageId(); }
            $this->current_id = $id;
            return $this;
        }

        public function getCurrentId(){
            return $this->current_id;
        }

        public function renderPanels($template_panels = array(), $acf_field = 'acf_panels', $views_path = 'views/panels', $force_clear_panels = false){

            if(!$this->current_id){
                $this->setCurrentId();
            }

            $has_the_content = false;

            $panels = get_field($acf_field, $this->current_id);
            $panels = (!$panels) ? array() : $panels;

            if($force_clear_panels === true){
                $panels = array();
            }
            
            if(!empty($template_panels)){
                $panels = array_merge($template_panels, $panels);
            }

            $has_the_content = false;
            if($panels) {
                foreach($panels as $panel) :
                    $panel_vars = $panel;
                    if($panel['acf_fc_layout'] == 'the-content'){
                        $has_the_content = true;
                    }
                    $template = locate_template(rtrim($views_path,'/').'/'.$panel['acf_fc_layout'].'.php');
                    if($template){
                        include($template); 
                    }
                endforeach;
            }

            if(!$has_the_content){
                $content_template = locate_template(rtrim($views_path,'/').'/the-content.php');
                if($content_template){
                    $pv_override['the-content'] = array(
                        'panel_background' => 'solid-color',
                        'background_color' => '#FFF'
                    );
                    include($content_template); 
                }
            }

            return $this;
        }

    }

?>