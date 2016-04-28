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
    var_dump($db->sendQuery($sql->select(['id', 'title'])->from(['catalog'])->where(['id', '=' , '1']))->fetch_object());


$login_data = ['method' => 'post', 'action' => '#', 'button_text' => 'ok',
    'fields' => [
        ['field' => 'input', 'type' => 'text', 'name' => 'login', 'label' => 'Login', 'text'=>'person', 'required' => '1'],
        ['field' => 'input', 'type' => 'text', 'name' => 'password', 'label' => 'Password', 'text'=>'vpn_key', 'required' => '1'],
        ['field' => 'input', 'type' => 'checkbox', 'name' => 'remember', 'label' => 'Remember me'],
    ]
];
$form = new Form($login_data);
$form->showForm();