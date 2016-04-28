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
            $this->_app->getLoader()->load('lib/form');

            $this->_view->setLayoutDirectory('admin');
            $this->_view->setLayout('login');

            $this->_view->setForm(new Form(Config::FORM['login'], 'admin'));
            if($this->_app->getRequest()->getMethod() == 'POST'){
                var_dump($_POST);
            }
            $this->_view->render();
        }
    }
