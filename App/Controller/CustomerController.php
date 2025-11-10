<?php 

namespace App\Controller;

use App\Usecase\CustomerUsecase;
use App\Dto\CustomerDto;
use App\Dto\AddressDto;

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address = new AddressDto(null, $_POST['street'], $_POST['number'], $_POST['complement'], $_POST['neighborhood'], $_POST['city'], $_POST['cep']);
            $customer = new CustomerDto(null , $_POST['name'], $_POST['birth_date'], $_POST['email'], $_POST['cellphone'], $address);
            $customerResult = $this->usecase->create($customer);;
            header("Location: /");
        } else {
            $customer = new CustomerDto(null, "", null, null, null, new AddressDto(
                null, null, null, null, null, null, null
            ));
            if (isset($_GET['id'])) {
                // echo (int) $_GET['id'];
                $customer = $this->usecase->getById((int) $_GET['id']);
            }
            require_once VIEW . 'pages/create.php';
        }
    }

    final public function update(): void {

    }
}   
