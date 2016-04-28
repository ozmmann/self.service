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
//    var_dump($db->sendQuery($sql->select(['id'])->from(['user']))->fetch_object());

    $auth = $app->getAuth();

    if($_POST['action'] == 'login')
    {
        $login = $auth->login($_POST['email'], $_POST['password'], 1);

        if($login['error']) {
            // Something went wrong, display error message
            echo '<div class="error">' . $login['message'] . '</div>';
        } else {
            // Logged in successfully, set cookie, display success message
            setcookie('authID', $login['hash'], $login['expire'], '/', null, 0, 0);
            echo '<div class="success">' . $login['message'] . '</div>';
            var_dump(array($login['hash'], $login['expire']));
        }
    }
    elseif($_POST['action'] == 'register')
    {
        $register = $auth->register($_POST['email'], $_POST['password'], $_POST['repeatpassword'], array(), null, true);

        if($register['error']) {
            // Something went wrong, display error message
            echo '<div class="error">' . $register['message'] . '</div>';
        } else {
            // Logged in successfully, set cookie, display success message
            setcookie('authID', $register['hash'], $register['expire'], '/', null, 0, 0);
            echo '<div class="success">' . $register['message'] . '</div>';
        }
    }

var_dump($_COOKIE);


?>

<form action="" method="post">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="password" name="repeatpassword">
    <input type="hidden" name="action" value="register">
    <input type="submit" value="зарегестрироваться">
</form>


<form action="" method="post">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="hidden" name="action" value="login">

    <input type="submit" value="войти">
</form>
