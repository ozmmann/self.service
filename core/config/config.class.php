<?php
    /**
     * class Config
     *
     * main project config
     */
    class Config{
        const CORE_DIR = 'core/';
        const LAYOUT_DIR = 'layout/';
        const MAIN_ROLE = 'guest';
        const ADMIN_ROLE = 'admin';

        const DB = [
            'host' => 'localhost',
            'name' => 'mydb',
            'user' => 'root',
            'password' => '1324657980',
            'prefix' => ''
        ];

        const AUTH = [
            'site_key' => 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg',
            'site_url' => 'http://' . Config::BASE_URL,
            'smtp' => '0',
            'smtp_auth' => '1',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_password' => 'oR4m4z4n0v',
            'smtp_port' => '587',
            'smtp_security' => NULL,
            'smtp_username' => 'osman.ramazanov@gmail.com',
            'table_users' => 'user',
            'table_requests' => 'requests'
        ];

        const BASE_URL = 'newaddress.local';
        const BASE_CONTROLLER = 'main';
        const ADMIN_CONTROLLER = 'admin';
        const ADMIN_URL = 'admin';
    }
