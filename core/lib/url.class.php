<?php
    namespace lib;
    /**
     * Class Url
     * @package lib
     *
     * if you need to do something with URL, use this
     */
    class Url{
        private $_route;

        /**
         * Url constructor.
         */
        public function __construct(){
            $this->_route = explode('/', $_GET['url']);
            if(empty(end($this->_route))){
                array_pop($this->_route);
            }
        }

        /**
         * @return array|null
         */
        public function getRoutes(){
            if(empty($this->_route)){
                return null;
            }
            return $this->_route;
        }
        /**
         * @param number $n
         * @return string|null
         */
        public function getUrlSegment($n){
            if(empty($this->_route[$n])){
                return null;
            }
            return $this->_route[$n];
        }

        /**
         * @return string|null
         */
        public function getLastSegment(){
            if(end($this->_route) === false){
                return null;
            }
            return end($this->_route);
        }

        /**
         * @return string|null
         */
        public function getFirstSegment(){
            if(empty($this->_route[0])){
                return null;
            }
            return $this->_route[0];
        }

        /**
         * @return int
         */
        public function getSizeOfRoutes(){
            return count($this->_route);
        }

    }
