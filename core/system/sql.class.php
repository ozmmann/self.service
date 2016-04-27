<?php
    /**
     * Class Sql
     * 
     * creating sql query
     */
    class Sql{
        private $_db;
        private $_sql = '';
        private $_prefix;

        /**
         * Sql constructor.
         */
        public function __construct(){
            $this->_db = Db::getLink();
            $this->_prefix = Config::DB['prefix'];
        }
        private function getSelfData($data, $quote = "'"){
            $str = "";
            if(is_array($data)){
                foreach($data as $item){
                    $str .= $quote.$this->_db->escape($item).$quote.',';
                }
                $str = substr($str, 0, -1);
            }else{
                $str .= $quote.$this->_db->escape($data).$quote;
            }
            return $str;
        }

        /**
         * @return string
         */
        public function getSql(){
            return $this->_sql;
        }

        /**
         * @param array|string $field
         * @return $this
         */
        public function select($field){
            $this->_sql .= "SELECT ".$this->getSelfData($field, "`")." ";
            return $this;
        }

        /**
         * @param array|string $table
         * @return $this
         */
        public function from($table){
            if(is_array($table)){
                foreach($table as $key => $value){
                    $table[$key] = $this->_prefix.$value;
                }
            }else{
                $table = $this->_prefix.$table;
            }
            $this->_sql .= "FROM ".$this->getSelfData($table, "`")." ";
            return $this;
        }

        /**
         * @param array $params
         * @return $this
         */
        public function where($params){
            $this->_sql .= "WHERE ".$params[0].$params[1].$this->getSelfData($params[2])." ";
            return $this;
        }

        /**
         * @param array $params
         * @return $this
         */
        public function whereAnd($params){
            $this->_sql .= "AND ".$params[0].$params[1].$this->getSelfData($params[2])." ";
            return $this;
        }

        /**
         * @param array $params
         * @return $this
         */
        public function whereOr($params){
            $this->_sql .= "OR ".$params[0].$params[1].$this->getSelfData($params[2])." ";
            return $this;
        }
    }
