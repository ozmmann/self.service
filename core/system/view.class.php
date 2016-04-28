<?php
    class View{
        protected $_layout;
        protected $_layout_directory;

        /**
         * View constructor.
         * @param string $l_dir
         * @param string $l
         */
        public function __construct($l_dir, $l='base'){
            $this->_layout_directory = $l_dir.'/';
            $this->_layout = $l.'.tpl';
        }

        /**
         * @param string $layout
         */
        public function setLayout($layout){
            $this->_layout = $layout.'.tpl';
        }

        /**
         * @param string $layout_directory
         */
        public function setLayoutDirectory($layout_directory){
            $this->_layout_directory = $layout_directory.'/';
        }

        /**
         * @param bool|string $tpl
         */
        public function render($tpl=false){
            if($tpl){
                $tpl = $tpl.'.tpl';
            }
            include Config::LAYOUT_DIR.$this->_layout_directory.$this->_layout;
        }
    }
