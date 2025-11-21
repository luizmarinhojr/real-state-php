<?php 

namespace App\Controller;

final class Controller {
    public static function initCustomer(): CustomerController {
        $db = \Config\Database::connect();
        $customerRepo = new \App\Repository\CustomerRepository($db);
        $addressRepo = new \App\Repository\AddressRepository($db);
        $usecase = new \App\Usecase\CustomerUsecase($customerRepo, $addressRepo);
        return new CustomerController($usecase);
    }

    public static function initHome() {
        return new \App\Controller\HomeController();
    }

    public static function initAuth() {
        $db = \Config\Database::connect();
        $authRepo = new \App\Repository\AuthRepository($db);
        $authUsecase = new \App\Usecase\AuthUsecase($authRepo);
        return new \App\Controller\AuthController($authUsecase);
    }

    public static function isAuthenticated(): bool {
        return isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
    }
}
