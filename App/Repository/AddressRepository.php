<?php 

namespace App\Repository;

use App\Model\AddressModel;
use mysqli, Exception;

final class AddressRepository {
    private readonly mysqli $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function insert(AddressModel $address): int {
        $query = "INSERT INTO addresses (id_address, street, number, complement, neighborhood, city, state, cep, active, created_at) 
        VALUES (1, 'Rua das Palmeiras', 101, 'Apto 10', 'Jardim Paulista', 'São Paulo', 'SP', '01001001', TRUE, NOW());";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query de inserção: " . $this->db->error);
        }

        $types = "ssssssisss";
        $stmt->bind_param(
            $types,
            $address->getFirstName(),
            $address->getLastName(),
            $address->getCpf(),
            $address->getBirthDate(),
            $address->getCellphone(),
            $address->getEmail(),
            $address->getCreatedAt()
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