<?php
    /**
     * Class Db
     * database object
     *
     * singleton
     */
    class Db{
        private static $_link = null;
        private $_db;

        /**
         * Db constructor.
         */
        private function __construct(){
            $this->_db = new mysqli(Config::DB['host'], Config::DB['user'], Config::DB['password'], Config::DB['name']);
        }

        /**
         * @return Db
         */
        public static function getLink(){
            if(is_null(self::$_link)){
                self::$_link = new Db();
            }
            return self::$_link;
        }
        
        public function sendQuery($sql){
            return $this->_db->query($sql);
        }
    }
