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

    final public function all(): void {
        $limit = 10;
        $currentPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?? 1;
        if ($currentPage < 1) {
            $currentPage = 1;
        }
        $offset = ($currentPage - 1) * $limit;
        $customers = $this->usecase->getAll($limit, $offset);
        $totalPages = ceil($customers['total_records'] / $limit);
        require_once VIEW . 'pages/customers.php';
    }

    final public function create(): void {
        $hasAddress = isset($_POST["address"]) ?? false;

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

    final public function update():void {
        $customer = $this->validatingRequest();
        $customerId = (int) $_POST['id'];
        if ($customerId === 0) {
            include VIEW . '/pages/400.php';
            exit;
        }
        $addressId = null;
        if (isset($_POST['id-address'])) {
            $addressId = (int) $_POST['id-address'];
        }
        $this->usecase->update($customer, $customerId, $addressId);
        header("Location: /clientes");
        exit;
    }

    public function delete(): void {
        if (!isset($_GET['id'])) {
            exit;
        }
        $idCustomer = (int) $_GET['id'];
        $success = $this->usecase->delete($idCustomer);
        if (!$success) {
            include VIEW . '/pages/400.php';
            exit;
        }
        header("Location: /clientes");
        exit;
    }

    private function nullIfEmpty(string $object): ?string {
        return $object === '' ? null : $object;
    }

    private function validatingRequest() {
        $hasAddress = isset($_POST["address"]) ?? false;
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

            return $customer;
        } catch(TypeError $e) {
            include VIEW . '/pages/400.php';
            exit;
        }
    }
}
