<?php 

namespace App\Controller;

use App\Dto\Request\AddressDtoRequest;
use App\Dto\Response\CustomerDtoResponse;
use App\Usecase\CustomerUsecase;
use App\Dto\Request\CustomerDtoRequest;
use TypeError;

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
        $hasAddress = isset($_POST["address"]) ?? false;
        var_dump($hasAddress);

        try {
            $customer = new CustomerDtoRequest($this->nullIfEmpty($_POST['first_name']), 
                $this->nullIfEmpty($_POST['last_name']), $this->nullIfEmpty($_POST['cpf']), 
                $this->nullIfEmpty($_POST['birth_date']), $this->nullIfEmpty($_POST['email']), 
                $this->nullIfEmpty($_POST['cellphone']), null);

            if ($hasAddress) {
                $customer->setAddress(new AddressDtoRequest($this->nullIfEmpty($_POST['street']), 
                    $this->nullIfEmpty($_POST['number']), $this->nullIfEmpty($_POST['complement']),
                    $this->nullIfEmpty($_POST['neighborhood']), $this->nullIfEmpty($_POST['city']), 
                    $this->nullIfEmpty($_POST['state']), $this->nullIfEmpty($_POST['cep'])));
            }
        } catch(TypeError $e) {
            include VIEW . '/pages/400.php';
            exit;
        }

        $customerResult = $this->usecase->create($customer);
        header("Location: /clientes");
        exit;
    }

    final public function detail(): void {
        $customer = new CustomerDtoResponse();
        if (isset($_GET['id'])) {
            $customer = $this->usecase->getById((int) $_GET['id']);
        }
        require_once VIEW . 'pages/create.php';
    }

    private function nullIfEmpty(string $object): ?string {
        return $object === '' ? null : $object;
    }
}
