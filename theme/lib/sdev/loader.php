<?php
    /**
     *  Loader Class
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since 1.0
     */

    namespace SDEV;

    class Loader{

        private $di;

        public function __construct(){
            return $this;
        }

        public function loadDependencies(Array $di){

            $this->di = $di;

            foreach($di as $dir => $dep){

                $dir = ($dir == 'core') ? '' : rtrim($dir, '/').'/';
                if(is_array($dep)){
                    foreach($dep as $f){
                        $file = $dir.(preg_replace("/\.php$/","",$f)).'.php';
                        $this->loadFile($file);
                    }
                } else {
                    $file = $dir.(preg_replace("/\.php$/","",$dep)).'.php';
                    $this->loadFile($file);
                }
            }

            return $this;

        }

        public function loadFile(String $file){
            if(include($file)){
                return true;
            } else {
                throw new \Exception('SDEV Dependency not found. File not found : '.$file);
            }
            return false;
        }

    }

?>