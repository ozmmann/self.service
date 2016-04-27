<?php
    /**
     * class Config
     *
     * main project config
     */
    class Config{
        const CORE_DIR = 'core/';
        const MAIN_ROLE = 'guest';
        const ADMIN_ROLE = 'admin';

        const DB = [
            'host' => 'localhost',
            'name' => 'newaddress_db',
            'user' => 'root',
            'password' => '',
            'prefix' => 'nas_'
        ];

        const BASE_URL = 'newaddress.local';
        const BASE_CONTROLLER = 'main';
        const ADMIN_CONTROLLER = 'admin';
        const ADMIN_URL = 'admin';
    }
