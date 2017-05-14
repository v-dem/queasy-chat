<?php

define('QUEASY_ROOT', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));

chdir(QUEASY_ROOT);

require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

$routeStr = preg_replace(
    '/\?.*$/',
    '',
    str_replace(
        $queasyUrl = str_replace(
            basename(__FILE__),
            '',
            $_SERVER['SCRIPT_NAME']
        ),
        '',
        $_SERVER['REQUEST_URI']
    )
);

define('QUEASY_URL', $queasyUrl);

$route = explode('/', $routeStr);

session_start();

queasy\log\Logger::info(sprintf('Request: %s %s', $_SERVER['REQUEST_METHOD'], empty($routeStr)? '/': $routeStr));

$request = new queasy\HttpRequest($_GET, $_POST, $_FILES, $_SESSION);

$app = new app\App($route, $_SERVER['REQUEST_METHOD']);

$app->handle($request);

queasy\log\Logger::info(sprintf('Script execution time: %s', microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']));

