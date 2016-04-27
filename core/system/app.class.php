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

        /**
         * App constructor.
         */
        private function __construct(){
            global $loader;
            $this->_loader = $loader;
            $this->_loader->load('lib/url');
            $this->_loader->load('auth');
            $this->_loader->load('controller');

            $this->_url = new Url();
            $this->_auth = new Auth();

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
         * @return string
         */
        public function requestMethod(){
            return $_SERVER['REQUEST_METHOD'];

        }
    }