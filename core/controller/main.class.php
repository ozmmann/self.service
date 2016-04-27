<?php
    class Main extends Controller{

        public function __construct(){
            parent::__construct();
            $this->_action_urlSegmentNum = 0;
        }

        protected function actionIndex(){
            echo 'home';
        }
    }
