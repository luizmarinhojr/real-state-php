<?php 

namespace App\Repository;

use App\Model\AddressModel;
use mysqli, Exception;

final class AddressRepository {
    private readonly mysqli $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function insert(AddressModel $address, int $idCustomer): int {
        $query = "INSERT INTO addresses (id_customer, street, number, complement, neighborhood, city, state, cep, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
                
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query de inserção: " . $this->db->error);
        }

        $types = "isissssss";
        $stmt->bind_param(
            $types,
            $idCustomer,
            $address->street,
            $address->number,
            $address->complement,
            $address->neighborhood,
            $address->city,
            $address->state,
            $address->cep,
            $address->createdAt
        );

        $success = $stmt->execute();
        
        if (!$success) {
            throw new Exception("Erro ao executar a inserção: " . $stmt->error);
        }

        $insertedId = $this->db->insert_id;
        $stmt->close();

        return $insertedId;
    }
}