<?php

    /**
     * Class App
     *
     * general application class
     * singleton
     */
    class App{
        private static $app = null;
        private $_config;
        private $_loader;
        private $_url;

        /**
         * App constructor.
         */
        private function __construct(){
            global $loader;
            $this->_config = new Config();
            $this->_loader = $loader;
            $this->_loader->load('lib/url');
            $this->_url = new Url();

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
    }