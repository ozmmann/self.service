<?php
    namespace lib;
    use config;
    /**
     * Class Db
     * @package lib
     * 
     * database object
     * singleton
     */
    class Db{
        private static $_link = null;
        private $_db;

        /**
         * Db constructor.
         */
        private function __construct(){
            $this->_db = new \mysqli(config\Config::DB['host'], config\Config::DB['user'], config\Config::DB['password'], config\Config::DB['name']);
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

        /**
         * @param \lib\Sql $sql
         * @return bool|\mysqli_result
         */
        public function sendQuery(\lib\Sql $sql){
            return $this->_db->query($sql->getSql());
        }

        /**
         * @param string $str
         * @return string
         */
        public function escape($str){
            return $this->_db->real_escape_string($str);
        }
    }
