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
                'host'     => 'localhost',
                'name'     => 'newaddress_db',
                'user'     => 'root',
                'password' => '',
                'prefix'   => 'nas_',
        ];

        const BASE_URL = 'newaddress';
        const BASE_CONTROLLER = 'main';
        const ADMIN_CONTROLLER = 'admin';
        const ADMIN_URL = 'admin';

        const FORM = [
                'login'   => [
                        'form_data'     => [
                                'action' => '/admin',
                                'method' => 'POST',
                        ],
                        'fields'        => [
                                'login'    => [
                                        'field'    => 'input',
                                        'type'     => 'text',
                                        'id'       => 'login',
                                        'name'     => 'login',
                                        'required' => true,
                                        'label'    => 'Login',
                                        'rule'     => 'login',
                                        'prefix'   => 'person',
                                        'class'    => 'col s12',
                                ],
                                'password' => [
                                        'field'    => 'input',
                                        'type'     => 'password',
                                        'id'       => 'password',
                                        'name'     => 'password',
                                        'required' => true,
                                        'label'    => 'Password',
                                        'rule'     => 'password',
                                        'prefix'   => 'vpn_key',
                                        'class'    => 'col s12',
                                ],
                                'remember' => [
                                        'field' => 'input',
                                        'type'  => 'checkbox',
                                        'id'    => 'remember',
                                        'name'  => 'remember',
                                        'label' => 'Remember me',
                                        'class' => 'col s12',
                                ],
                        ],
                        'button'        => [
                                'text'  => 'Sign in',
                                'class' => 'col s12',
                        ],
                        'default_class' => [
                                'inp' => 'validate',
                        ],
                ],
                'catalog' => [
                        'form_data'    => [
                                'action' => '/catalog',
                                'method' => 'POST',
                        ],
                        'fields'       => [
                                'text'    => [
                                        'field'    => 'input',
                                        'type'     => 'text',
                                        'id'       => 'where',
                                        'name'     => 'where',
                                        'required' => true,
                                        'label'    => 'Where form',
                                        'class'    => 'col s12',
                                ],
                                'select'     => [
                                        'field'  => 'select',
                                        'type'   => 'text',
                                        'id'     => 'selected',
                                        'name'   => 'selected',
                                        'option' => [
                                                'ukraine' => [
                                                        'optg'  => true,
                                                        'label' => 'Ukraine',
                                                ],
                                                'kiev'    => [
                                                        'value'    => 'kiev',
                                                        //'disabled' => true,
                                                        'selected' => true,
                                                        'label'    => 'Kiev',
                                                ],
                                                'harkiv'  => [
                                                        'value' => 'harkiv',
                                                        'label' => 'Harkiv',
                                                ],
                                                'poltava' => [
                                                        'value'    => 'poltava',
                                                        'label'    => 'Poltava',
                                                        'selected' => true,
                                                ],
                                                'lviv'    => [
                                                        'value' => 'lviv',
                                                        'label' => 'Lviv',
                                                ],
                                        ],
                                        'label'  => 'Select city from',
                                        'class'  => 'col s12',
                                ],
                                'textarea' => [
                                        'field'       => 'textarea',
                                        'type'        => 'text',
                                        'id'          => 'ta1',
                                        'name'        => 'ta1',
                                        'placeholder' => 'text',
                                        'readonly'    => false,
                                        'length'      => 100,
                                        'cols'        => 15,
                                        'rows'        => 15,
                                        'class'       => 'col s12 materialize-textarea',
                                ],
                        ],
                        'button'       => [
                                'text'  => 'Search',
                                'class' => 'col s12',
                        ],
                        'defaul_class' => [
                                'inp'      => 'validate',
                                'date'     => 'datepicker',
                                'textarea' => 'materialize-textarea',
                        ],
                ],
        ];
    }
