<?php 

namespace App\Controller;

use App\Usecase\CustomerUsecase;

final class CustomerController {
    private readonly CustomerUsecase $usecase;

    public function __construct(CustomerUsecase $usecase) {
        $this->usecase = $usecase;
    }

    final public function index(): void {
        $customers = $this->usecase->getAll();
        require_once VIEW . 'pages/main.php';
    }

    final public function create(): void {
        require_once VIEW . 'pages/create.php';
    }
}   
