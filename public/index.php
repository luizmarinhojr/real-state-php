<?php 
        define('ROOT_PATH', dirname(__DIR__) . '/');
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        require_once ROOT_PATH . '/app/controller/CustomerController.php';
        $requestUri = $_SERVER['REQUEST_URI'];

        $customerController = new CustomerController();

        switch ($requestUri) {
            case '/':
                $customerController->index();
                break;
            case '/create':
                $customerController->create();
                break;
            default:
                echo "<h1>Error 404</h1>";
        }
?>