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

        /**
         * App constructor.
         */
        private function __construct(){
            global $loader;
            $this->_loader = $loader;
            $this->_config = new Config();
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
    }