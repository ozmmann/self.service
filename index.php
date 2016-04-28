<?php
    session_start();
    $_SESSION['role'] = 'admin';
    require_once 'core/config/config.class.php';
    require_once 'core/system/loader.class.php';
    
    $loader = new Loader();
    $loader->load('app');

    $app = App::getApp();
//    if($app->requestMethod() == 'GET'){
//        $c_name = Config::BASE_CONTROLLER;
//        if($app->getUrl()->getFirstSegment() == Config::ADMIN_URL and $app->getAuth()->is_admin()){
//            $c_name = Config::ADMIN_CONTROLLER;
//        }
//        $app->getLoader()->load('controller/'.$c_name);
//
//        /**
//         * @var Object $controller
//         */
//        $controller = new $c_name;
//        $controller->run();
//    }
    $db = Db::getLink();
    $sql = new Sql();
    var_dump($db);
    var_dump($db->sendQuery($sql->select(['id', 'name'])->from(['user']))->fetch_object());
