<?php
    class Auth{
        private $_role;
        private $_access_level;

        public function __construct(){
            $this->_role = (!isset($_SESSION['role'])) ? Config::MAIN_ROLE : $_SESSION['role'];
        }

        /**
         * @return bool
         */
        public function is_admin(){
            if($this->_role == Config::ADMIN_ROLE){
                return true;
            }
            return false;
        }
    }
