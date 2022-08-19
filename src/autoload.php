<?php
declare(strict_types=1);

spl_autoload_register(function($class) {
    $class = __DIR__ . "/classes/" . str_replace("\\", "/", $class) . ".class.php";
    require $class;
});