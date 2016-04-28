<?php

    /**
     * Class Request
     */
    class Request{
        private $_method;
        private $_referer;

        public function __construct(){
            $this->_method = $_SERVER['REQUEST_METHOD'];
            $this->_referer = substr($_SERVER['HTTP_REFERER'], strlen(Config::BASE_URL)+strlen('http://'));
        }

        public function getMethod(){
            return $this->_method;
        }

        public function getReferer(){
            return $this->_referer;
        }
    }
