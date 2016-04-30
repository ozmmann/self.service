<?php
    namespace controller;
    use lib, config;

    /**
     * Class Admin
     * @package controller
     */
    class Admin extends Controller{
        public function __construct(){
            parent::__construct();
            $this->_action_urlSegmentNum = 1;
        }

        protected function actionIndex(){
            echo 'admin home';
        }
    }
