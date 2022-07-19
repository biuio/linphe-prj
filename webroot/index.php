<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../boot/fun.php';
require_once __DIR__ . '/../boot/route.php';
cnf\Conf::preConfig();
$app = require_once __DIR__ . '/../boot/boot.php';
if (isset($_GET['debug']) || env('CUR_ENV') != "prod") {
    ini_set("display_errors", "On");
    error_reporting(E_ALL | E_STRICT);
}
define('WEBROOT', __DIR__);
$app->start();
