<?php

namespace App\Usecase;

use App\Dto\Request\CustomerDtoRequest;
use App\Dto\Response\CustomerDtoResponse;
use App\Dto\Response\AddressDtoResponse;
use App\Repository\CustomerRepository;
use App\Model\CustomerModel;

final class CustomerUsecase {
    private readonly CustomerRepository $repo;

    public function __construct(CustomerRepository $repo) {
        $this->repo = $repo;
    }

    public function index():?array {
        $result = $this->repo->fetchAll();
        if (!empty($result)) {
            return $result;
        }
        return null;
    }

    public function create(CustomerDtoRequest $customer): ?CustomerDtoResponse { 
        return null;
    }

    public function getById(int $id): ?CustomerDtoResponse {
        $result = $this->repo->fetch($id);
        if (!empty($result)) {
            return $result;
        }
        return null;
    }

    private function convertToDtoResponse(CustomerModel $customer): CustomerDtoResponse {
        return new CustomerDtoResponse($customer->getId(), $customer->getFirstName(), $customer->getLastName(), $customer->getBirthDate(), 
                $customer->getEmail(), $customer->getCellphone(), new AddressDtoResponse(null, $customer->getAddress()->getStreet(),
                $customer->getAddress()->getNumber(), $customer->getAddress()->getComplement(), 
                $customer->getAddress()->getNeighborhood(), $customer->getAddress()->getCity(), $customer->getAddress()->getCep(),
            $customer->getAddress()->getState()));
    }

    private function convertToArrayDtoResponse(array $result): array {
        $customers = [];
        foreach ($result as $customer) {
            $customers[] = new CustomerDtoResponse($customer->getId(), $customer->getFirstName(), $customer->getLastName(), $customer->getBirthDate(), 
                $customer->getEmail(), $customer->getCellphone(), new AddressDtoResponse(null, $customer->getAddress()->getStreet(),
                $customer->getAddress()->getNumber(), $customer->getAddress()->getComplement(), 
                $customer->getAddress()->getNeighborhood(), $customer->getAddress()->getCity(), $customer->getAddress()->getCep(),
            $customer->getAddress()->getState()));
        }
        return $customers;
    }
}