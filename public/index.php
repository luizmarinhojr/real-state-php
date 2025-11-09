<?php 
    require_once '../vendor/autoload.php';

    use App\Controller\Controller;
    
    define('ROOT_PATH', dirname(__DIR__) . '/');
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $requestUri = $_SERVER['REQUEST_URI'];

    switch ($requestUri) {
        case '/':
            Controller::initCustomer()->index();
            break;
        case '/create':
            Controller::initCustomer()->create();
            break;
        default:
            Controller::initHandlerError()->error404();
    }
