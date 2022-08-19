<?php
declare(strict_types=1);
namespace Controllers;

class Home
{
    public static function index(array $data) : void
    {
        echo "Welcome Home";
    }

    public static function forgotPassword(array $data) : void
    {
        require_once __DIR__ . "/../Views/ForgotPassword.php";
    }
}