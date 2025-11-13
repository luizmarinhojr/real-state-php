<?php 

namespace App\Controller;

use App\Dto\Request\AddressDtoRequest;
use App\Dto\Response\CustomerDtoResponse;
use App\Usecase\CustomerUsecase;
use App\Dto\Request\CustomerDtoRequest;

final class CustomerController {
    private readonly CustomerUsecase $usecase;

    public function __construct(CustomerUsecase $usecase) {
        $this->usecase = $usecase;
    }

    final public function index(): void {
        $customers = $this->usecase->index();
        require_once VIEW . 'pages/main.php';
    }

    final public function create(): void {
        $customer = new CustomerDtoRequest($_POST['first_name'], $_POST['last_name'], 
            $_POST['cpf'], $_POST['birth_date'], $_POST['email'], $_POST['cellphone'], 
                new AddressDtoRequest($_POST['street'], $_POST['number'], $_POST['complement'],
                $_POST['neighborhood'], $_POST['city'], $_POST['state'], $_POST['cep']));
        $customerResult = $this->usecase->create($customer);;
        header("Location: /");
    }

    final public function detail(): void {
        $customer = new CustomerDtoResponse();
        if (isset($_GET['id'])) {
            $customer = $this->usecase->getById((int) $_GET['id']);
        }
        require_once VIEW . 'pages/create.php';
    }
}
