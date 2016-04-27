<?php
    session_start();
    require_once 'core/config/config.class.php';
    require_once 'core/system/loader.class.php';
    
    $loader = new Loader();
    $loader->load('app');

    $app = App::getApp();

    