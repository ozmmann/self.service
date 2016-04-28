<?php

    /**
     * Class User
     *
     * user data handler
     */
    class User extends Handler{
        private $_fields;

        public function __construct(){
            parent::__construct();
            $this->_fields = Config::FORM['login'];
        }

        public function login(){
            $login = $_POST['login'];
            $pass = $_POST['password'];
            $this->_app->getAuth()->login($login, $pass);
        }
    }
