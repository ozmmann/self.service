<?php
    namespace handler;
    use lib, config;
    /**
     * Class User
     * @package handler
     * user data handler
     */
    class User extends lib\Handler{
        private $_fields;

        public function __construct(){
            parent::__construct();
            $this->_fields = config\Config::FORM['login'];
        }

        public function login(){
            $login = $_POST['login'];
            $pass = $_POST['password'];
        }
    }
