<?php 

namespace App\Controller;

final class Controller {
    public static function initCustomer(): CustomerController {
        $db = \Config\Database::connect();
        $repo = new \App\Repository\CustomerRepository($db);
        $usecase = new \App\Usecase\CustomerUsecase($repo);
        return new CustomerController($usecase);
    }

    public static function initHandlerError() {
        return new HandlerErrorController();
    }
}
