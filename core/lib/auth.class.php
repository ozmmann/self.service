<?php
    namespace lib;
    use config;

    /**
     * Class Auth
     * @package lib
     */
    class Auth{
        private $_role;
        
        public function __construct(){
            $this->_role = (!isset($_SESSION['role'])) ? config\Config::MAIN_ROLE : $_SESSION['role'];
        }

        /**
         * @return bool
         */
        public function is_admin(){
            if($this->_role == config\Config::ADMIN_ROLE){
                return true;
            }
            return false;
        }
    }
