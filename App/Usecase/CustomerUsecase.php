<?php

namespace App\Usecase;

use App\Dto\Request\CustomerDtoRequest;
use App\Dto\Response\CustomerDtoResponse;
use App\Dto\Response\AddressDtoResponse;
use App\Model\AddressModel;
use App\Repository\CustomerRepository;
use App\Repository\AddressRepository;
use App\Model\CustomerModel;

final class CustomerUsecase {
    private readonly CustomerRepository $customerRepo;
    private readonly AddressRepository $addressRepo;

    public function __construct(CustomerRepository $customerRepo, AddressRepository $addressRepo) {
        $this->customerRepo = $customerRepo;
        $this->addressRepo = $addressRepo;
    }

    public function index():?array {
        $result = $this->customerRepo->fetchAll();
        if (!empty($result)) {
            return $result;
        }
        return null;
    }

    public function create(CustomerDtoRequest $customer): ?int {
        $customerModel = $this->convertToModel($customer);
        $customerId = $this->customerRepo->insert($customerModel);
        $address = $customerModel->getAddress();
        if ($address != null) {
            $address = $this->addressRepo->insert($address, $customerId);
        }
        return $customerId;
    }

    public function getById(int $id): ?CustomerDtoResponse {
        $result = $this->customerRepo->fetch($id);
        if (!empty($result)) {
            return $result;
        }
        return null;
    }

    private function convertToDtoResponse(CustomerModel $customer): CustomerDtoResponse {
        return new CustomerDtoResponse($customer->getId(), $customer->getFirstName(), $customer->getLastName(), $customer->getCpf(), $customer->getBirthDate(), 
                $customer->getEmail(), $customer->getCellphone(), new AddressDtoResponse(null, $customer->getAddress()->getStreet(),
                $customer->getAddress()->getNumber(), $customer->getAddress()->getComplement(), 
                $customer->getAddress()->getNeighborhood(), $customer->getAddress()->getCity(), $customer->getAddress()->getCep(),
            $customer->getAddress()->getState()));
    }

    private function convertToArrayDtoResponse(array $result): array {
        $customers = [];
        foreach ($result as $customer) {
            $customers[] = new CustomerDtoResponse($customer->getId(), $customer->getFirstName(), $customer->getLastName(), $customer->getCpf(), $customer->getBirthDate(), 
                $customer->getEmail(), $customer->getCellphone(), new AddressDtoResponse(null, $customer->getAddress()->getStreet(),
                $customer->getAddress()->getNumber(), $customer->getAddress()->getComplement(), 
                $customer->getAddress()->getNeighborhood(), $customer->getAddress()->getCity(), $customer->getAddress()->getCep(),
            $customer->getAddress()->getState()));
        }
        return $customers;
    }

    private function convertToModel(CustomerDtoRequest $customer): CustomerModel{
        $customerModel = new CustomerModel(
            null, $customer->getFirstName(), $customer->getLastName(), $customer->getCpf(), 
            $customer->getBirthDate(), $customer->getEmail(), $customer->getCellphone());
        $address = $customer->getAddress();
        if ($address != null) {
            $customerModel->setAddress(new AddressModel(
                null, $address->getStreet(), $address->getNumber(), $address->getComplement(), 
                $address->getNeighborhood(), $address->getCity(), $address->getCep(), $address->getState()));
        }
        return $customerModel;
    }
}