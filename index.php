<?php
    set_include_path('.' . PATH_SEPARATOR . './core/' . PATH_SEPARATOR);
    session_start();
    use config\Config;

    require_once 'class_map.php';
    require_once 'system/loader.class.php';
    spl_autoload_register(array('Loader', 'autoload'));

    $app = system\App::getApp();

    $c_name = '\controller\\'.Config::BASE_CONTROLLER;
    if($app->getUrl()->getFirstSegment() == Config::ADMIN_URL and $app->getAuth()->is_admin()){
        $c_name = '\controller\\'.Config::ADMIN_CONTROLLER;
    }
    /**
     * @var Object $controller
     */
    $controller = new $c_name;
    $controller->run();
