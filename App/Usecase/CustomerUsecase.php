<?php

namespace App\Usecase;

use App\Dto\AddressDto;
use App\Dto\CustomerDto;
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
            $customers = $this->convertToArrayDto($result);
            return $customers;
        }
        return null;
    }

    public function create(CustomerDto $customer): ?CustomerDto { 
        return null;
    }

    public function getById(int $id): ?CustomerDto {
        $result = $this->repo->fetch($id);
        if (!empty($result)) {
            return $this->convertToDto($result);
        }
        return null;
    }

    private function convertToDto(CustomerModel $customer): CustomerDto {
        return new CustomerDto($customer->getId(), $customer->getName(), $customer->getBirthDate(), 
                $customer->getEmail(), $customer->getCellphone(), new AddressDto(null, $customer->getAddress()->getStreet(),
                $customer->getAddress()->getNumber(), $customer->getAddress()->getComplement(), 
                $customer->getAddress()->getNeighborhood(), $customer->getAddress()->getCity(), $customer->getAddress()->getCep()));
    }

    private function convertToArrayDto(array $result): array {
        $customers = [];
        foreach ($result as $customer) {
            $customers[] = new CustomerDto($customer->getId(), $customer->getName(), $customer->getBirthDate(), 
            $customer->getEmail(), $customer->getCellphone(), new AddressDto(null, $customer->getAddress()->getStreet(),
            $customer->getAddress()->getNumber(), $customer->getAddress()->getComplement(), 
            $customer->getAddress()->getNeighborhood(), $customer->getAddress()->getCity(), $customer->getAddress()->getCep()));
        }
        return $customers;
    }
}