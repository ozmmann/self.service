<?php

    /**
     * Class App
     *
     * general application class
     * singleton
     */
    class App{
        private static $app = null;
        private $_loader;
        private $_url;
        private $_auth;
        private $_db;
        private $_request;

        /**
         * App constructor.
         */
        private function __construct(){
            global $loader;
            $this->_loader = $loader;
            /**
             * includes files
             */
            $this->_loader->load('lib/url');
            $this->_loader->load('lib/auth');
            $this->_loader->load('lib/request');
            $this->_loader->load('controller');
            $this->_loader->load('db');
            $this->_loader->load('lib/sql');

            $this->_url = new Url();
            $this->_request = new Request();
            $this->_auth = new Auth();
            $this->_db = Db::getLink();

        }

        /**
         * @return App
         */
        public static function getApp(){
            if(is_null(self::$app)){
                self::$app = new self;
            }
            return self::$app;
        }

        /**
         * @return Loader
         */
        public function getLoader(){
            return $this->_loader;
        }

        /**
         * @return Config
         */
        public function getConfig(){
            return $this->_config;
        }

        /**
         * @return Url
         */
        public function getUrl(){
            return $this->_url;
        }

        /**
         * @return Auth
         */
        public function getAuth(){
            return $this->_auth;
        }

        /**
         * @return Db
         */
        public function getDb(){
            return $this->_db;
        }

        /**
         * @return Request
         */
        public function getRequest(){
            return $this->_request;
        }
        
        public function runHandler($handler_name, $action_name){
            $this->_loader->load('lib/handler');
            $this->_loader->load('handler/'.$handler_name);
            $handler = new $handler_name();
            if(!method_exists($handler, $action_name)){
                //todo need exception!
                echo "method not found";
            }
            $handler->$action_name();
        }
    }