<?php
    namespace controller;
    use lib, config;

    /**
     * Class Main
     * @package controller
     */
    class Main extends lib\Controller{

        public function __construct(){
            parent::__construct();
            $this->_action_urlSegmentNum = 0;

            $this->_view = new lib\View('main');
        }

        protected function actionIndex(){
            echo 'home';
        }
        protected function actionAdmin(){
            $this->_view->setLayoutDirectory('admin');
            $this->_view->setLayout('login');

            $this->_view->setForm(new lib\Form(config\Config::FORM['login'], 'admin'));
            if($this->_app->getRequest()->getMethod() == 'POST'){
                var_dump($_POST);
            }
            $this->_view->render();
        }

        protected function actionCatalog(){
            $this->_view->setLayoutDirectory('admin');
            $this->_view->setLayout('login');

            $this->_view->setForm(new lib\Form(config\Config::FORM['catalog'], 'admin'));
            if($this->_app->getRequest()->getMethod() == 'POST'){
                var_dump($_POST);
            }

            $this->_view->render();
        }
    }
