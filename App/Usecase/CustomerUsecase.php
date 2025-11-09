<?php

namespace App\Usecase;

use App\Model\AddressModel;
use App\Model\CustomerModel;
use App\Repository\Repository;

final class CustomerUsecase {
    private readonly Repository $repo;

    public function __construct(Repository $repo) {
        $this->repo = $repo;
    }

    /**
     * Recupera todos os clientes com seus endereços.
     * @return CustomerModel[] Deve retornar um array de objetos CustomerModel.
     */
    public function getAll():?array {
        $query = "SELECT c.id, c.name, c.birth_date, c.cellphone, c.email, a.neighborhood, a.city 
                FROM customers c 
                LEFT JOIN addresses a ON c.id = a.id_customer;";
        $result = $this->repo->fetchAll($query);
        if (!empty($result)) {
            /** @var CustomerModel[] $customers */
            $customers = [];
            foreach ($result as $row) {
                $address = new AddressModel(null, null, null, null, $row['neighborhood'], $row['city'], null);
                $customer = new CustomerModel($row['id'], $row['name'], $row['birth_date'], $row['email'], $row['cellphone'], $address);
                $customers[] = $customer;
            }
            return $customers;
        }
        return null;
    }
}