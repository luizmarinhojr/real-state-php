<?php

namespace App\Usecase;

use App\Repository\CustomerRepository;

final class HomeUsecase {
    private readonly CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository) {
        $this->customerRepository = $customerRepository;
    }

    final public function lastAddedCustomers(?int $limit) {
        $customers = $this->customerRepository->lastAddedCustomers($limit);
        return $customers;
    }
}