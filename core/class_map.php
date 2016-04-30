<?php
    class ClassesMap{
        const MAP = [
            'system' => [
                'App' => 'system/app.class.php'
            ],
            'config' => [
                'Config' => 'config/config.class.php'
            ],
            'lib' => [
                'Auth' => 'lib/auth.class.php',
                'Controller' => 'lib/controller.class.php',
                'Db' => 'lib/db.class.php',
                'Form' => 'lib/form.class.php',
                'Handler' => 'lib/handler.class.php',
                'Model' => 'lib/model.class.php',
                'Request' => 'lib/request.class.php',
                'Sql' => 'lib/sql.class.php',
                'Translit' => 'lib/translit.class.php',
                'Url' => 'lib/url.class.php',
                'View' => 'lib/view.class.php',
            ],
            'handler' => [
                'User' => 'handler/user.class.php',
            ],
            'controller' => [
                'Main' => 'controller/main.class.php',
                'Admin' => 'controller/admin.class.php',
            ],
            'module' => [

            ]
        ];
    }
