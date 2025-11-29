<?php

namespace App\Usecase;

use App\Model\AddressModel;
use App\Repository\AddressRepository;
use App\Dto\Request\AddressDtoRequest;

final class AddressUsecase {
    private readonly AddressRepository $repo;

    public function __construct(AddressRepository $repo) {
        $this->repo = $repo;
    }

    public function create(AddressDtoRequest $address): ?int {
        $addressModel = $this->convertToModel($address);
        $id = $this->repo->insert($addressModel);
        return $id;
    }

    private function convertToModel(AddressDtoRequest $address): AddressModel{
        return new AddressModel(
                null, $address->getStreet(), $address->getNumber(), 
                $address->getComplement(), $address->getNeighborhood(), 
                $address->getCity(), $address->getCep(),
                $address->getState());
    }
}