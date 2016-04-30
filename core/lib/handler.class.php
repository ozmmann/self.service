<?php
    namespace lib;
    use system\App;
    /**
     * Class Handler
     * @package lib
     * base class for all handlers
     */
    abstract class Handler{
        protected $_app;

        public function __construct(){
            $this->_app = App::getApp();
        }
    }
