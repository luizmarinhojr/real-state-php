<?php 

namespace App\Repository;

use App\Model\AddressModel;
use mysqli, Exception, DateTimeImmutable;

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

    public function update(AddressModel $address, $addressId): void {
        $query = "UPDATE addresses 
                    SET 
                        street = ?, 
                        number = ?, 
                        complement = ?, 
                        neighborhood = ?, 
                        city = ?, 
                        state = ?, 
                        cep = ?, 
                        modified_at = ?
                    WHERE id = ?;";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query de inserção: " . $this->db->error);
        }

        $modifiedAtDate = new DateTimeImmutable('now');
        $modifiedAt = $modifiedAtDate->format('Y-m-d H:i:s');

        $types = "sissssssi";
        $stmt->bind_param(
            $types,
            $address->street,
            $address->number,
            $address->complement,
            $address->neighborhood,
            $address->city,
            $address->state,
            $address->cep,
            $modifiedAt,
            $addressId
        );

        $success = $stmt->execute();
        
        if (!$success) {
            throw new Exception("Erro ao executar a inserção: " . $stmt->error);
        }

        $stmt->close();
    }

    public function delete(int $idCustomer): bool{
        $query = "UPDATE addresses 
                    SET 
                        active = false,
                        deleted_at = ?
                    WHERE id_customer = ?;";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            return false;
        }

        $deletedAtDateTime = new DateTimeImmutable('now');
        $deletedAt = $deletedAtDateTime->format('Y-m-d H:i:s');

        $stmt->bind_param(
            'si',
            $deletedAt,
            $idCustomer
        );

        $success = $stmt->execute();
        
        if (!$success) {
            return false;
        }

        $stmt->close();

        return true;
    }
}