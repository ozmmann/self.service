<?php
    namespace lib;
    use system;
    /**
     * Class Controller
     * @package lib
     * base controllers class
     */
    abstract class Controller{
        protected $_app;
        protected $_model;
        protected $_view;
        protected $_action_urlSegmentNum;

        public function __construct(){
            $this->_app = system\App::getApp();
        }

        public function run(){
            $a_name = (!is_null($this->_app->getUrl()->getUrlSegment($this->_action_urlSegmentNum))) ? 'action'.ucfirst(strtolower($this->_app->getUrl()->getFirstSegment())) : 'actionIndex';
            if(method_exists($this, $a_name)){
                $this->$a_name();
            }else{
                $this->show404();
            }
        }
        abstract protected function actionIndex();

        public function show404(){
            //todo sent headers!
            echo 'page not found!';
        }
    }
