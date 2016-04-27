<?php

    /**
     * Class Loader
     *
     * if you need load some class, use this class
     */
    class Loader{
        private $_core_dir;

        /**
         * Loader constructor.
         */
        public function __construct(){
            $this->_core_dir = Config::$core_dir;
        }
        
        /**
         * @param string $path
         * @return object
         */
        public function load($path){
            $file = $this->_core_dir.$this->getDir($path).$this->getFile($path);

            if(file_exists($file)){
                include_once $file;
            }else{
                //todo need exception!
                echo 'file not found!';
            }
        }

        /**
         * @param string $path
         * @return string
         */
        private function getDir($path){
            $separator_pos = strpos($path, '_');
            if($separator_pos){
                return strtolower(substr($path, 0, $separator_pos)).'/';
            }
            return 'system/';
        }

        /**
         * @param string $path
         * @return string
         */
        private function getFile($path){
            $separator_pos = strpos($path, '_');
            if($separator_pos){
                return strtolower(substr($path, $separator_pos+1)).'.class.php';
            }
            return strtolower($path).'.class.php';
        }
        private function getClassName($path){
            $separator_pos = strpos($path, '_');
            if($separator_pos){
                return ucfirst(strtolower(substr($path, $separator_pos+1)));
            }
            return ucfirst(strtolower($path));
        }
    }
