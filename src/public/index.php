<?php
declare(strict_types=1);

require_once __DIR__ . "/../autoload.php";

$router = new Core\Router;

$router->get('/', [Controllers\Home::class, 'index']);
$router->get('/forgot', [Controllers\Home::class, 'forgotPassword']);

$router->execute();