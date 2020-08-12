<?php

use libs\App;

require_once '../config/config.php';

$route = $_GET['route'] ?? 'home';

$app = new App($_SERVER['REQUEST_METHOD'], $route);
$app->startApp();
