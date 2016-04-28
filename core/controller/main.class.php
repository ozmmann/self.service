<?php
    class Main extends Controller{

        public function __construct(){
            parent::__construct();
            $this->_action_urlSegmentNum = 0;

            $this->_view = new View('main');
        }

        protected function actionIndex(){
            echo 'home';
        }
        protected function actionAdmin(){
            $this->_view->setLayoutDirectory('admin');
            $this->_view->setLayout('login');
            $this->_view->render();
        }
    }
