<?php
    namespace system;
    use lib, handler;
    /**
     * Class App
     *
     * general application class
     * singleton
     */
    class App{
        private static $app = null;
        private $_url;
        private $_auth;
        private $_db;
        private $_request;

        /**
         * App constructor.
         */
        private function __construct(){
            $this->_url = new lib\Url();
            $this->_request = new lib\Request();
            $this->_auth = new lib\Auth();
            $this->_db = lib\Db::getLink();
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
         * @return lib\Url
         */
        public function getUrl(){
            return $this->_url;
        }

        /**
         * @return lib\Auth
         */
        public function getAuth(){
            return $this->_auth;
        }

        /**
         * @return lib\Db
         */
        public function getDb(){
            return $this->_db;
        }

        /**
         * @return lib\Request
         */
        public function getRequest(){
            return $this->_request;
        }

        /**
         * @param string $handler_name
         * @param string $action_name
         */
        public function runHandler($handler_name, $action_name){
            $handler_name = 'handler\\'.ucfirst($handler_name);
            $handler = new $handler_name();
            if(!method_exists($handler, $action_name)){
                //todo need exception!
                echo "method not found";
            }
            $handler->$action_name();
        }
    }