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

    public static function initHandlerError() {
        return new HandlerErrorController();
    }

    public static function initHome() {
        return new \App\Controller\HomeController();
    }
}
