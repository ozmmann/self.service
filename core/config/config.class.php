<?php
    /**
     * class Config
     *
     * main project config
     */
    class Config{
        public $db = [
            'host' => 'localhost',
            'name' => 'newaddress_db',
            'user' => 'root',
            'password' => '',
            'prefix' => 'nas'
        ];

        public $base_url = 'newaddress.local';

        public static $core_dir = 'core/';
    }
