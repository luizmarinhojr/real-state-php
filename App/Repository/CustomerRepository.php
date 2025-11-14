<?php
namespace App\Repository;

use App\Dto\Response\AddressDtoResponse;
use App\Dto\Response\CustomerDtoResponse;
use App\Model\CustomerModel;

use mysqli, Exception;

class CustomerRepository {
    private readonly mysqli $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function insert(CustomerModel $customer): int {
        $query = "INSERT INTO customers (first_name, last_name, cpf, birth_date, cellphone, email, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?);";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query de inserção: " . $this->db->error);
        }

        $types = "sssssss";
        $stmt->bind_param(
            $types,
            $customer->firstName,
            $customer->lastName,
            $customer->cpf,
            $customer->birthDate,
            $customer->cellphone,
            $customer->email,
            $customer->createdAt
        );

        $success = $stmt->execute();
        
        if (!$success) {
            throw new Exception("Erro ao executar a inserção: " . $stmt->error);
        }

        $insertedId = $this->db->insert_id;
        $stmt->close();

        return $insertedId;
    }

    public function fetchAll():?array {
        $query = "SELECT c.id, c.first_name, c.last_name, c.cpf, c.birth_date, c.cellphone, c.email, a.neighborhood, a.city 
                FROM customers c 
                LEFT JOIN addresses a ON c.id = a.id_customer
                WHERE c.active = true;";
        $result = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
        $this->db->close();
        if (!empty($result)) {
            $customers = [];
            foreach ($result as $row) {
                $address = new AddressDtoResponse(null, null,null,null,$row['neighborhood'],$row['city']);
                $customer = new CustomerDtoResponse($row['id'], $row['first_name'], $row['last_name'], $row['cpf'], $row['birth_date'], 
                        $row['email'], $row['cellphone'], $address);
                $customers[] = $customer;
            }
            return $customers;
        }
        return null;
    }

    public function fetch(int $id): ?object {
        $query = "SELECT c.id, c.first_name, c.last_name, c.cpf, c.birth_date, c.cellphone, c.email, c.created_at AS c_created_at, c.modified_at AS c_modified_at, c.deleted_at AS c_deleted_at,
                a.street, a.number, a.complement, a.neighborhood, a.city, a.state, a.cep, a.created_at AS a_created_at, a.modified_at AS a_modified_at, a.deleted_at AS a_deleted_at
                FROM customers c
                LEFT JOIN addresses a ON c.id = a.id_customer
                WHERE c.id = ? AND c.active = true;";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query: " . $this->db->error);
        }
        $success = $stmt->bind_param("i", $id);
        if (!$success) {
            throw new Exception("Erro ao ligar parâmetro: " . $stmt->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $stmt->close();
            return null; 
        }
        $row = $result->fetch_assoc();
        $address = new AddressDtoResponse(null, $row['street'],$row['number'],
            $row['complement'],$row['neighborhood'],$row['city'], $row['cep'], 
                $row['state'], null, $row['a_created_at'], $row['a_modified_at'], $row['a_deleted_at']);

        $customer = new CustomerDtoResponse($row['id'], $row['first_name'], $row['last_name'], $row['cpf'], $row['birth_date'], 
                $row['email'], $row['cellphone'], $address, $row['c_created_at'], $row['c_modified_at'], $row['c_deleted_at']);
        $stmt->close();
        return $customer;
    }

    public function update(object $entity): bool {
        return false;
    }
    
    public function delete(int $id): bool{
        return false;
    }

    public function existsById() {
        
    }

    final public function beginTransaction(): bool {
        return $this->db->begin_transaction();
    }

    final public function commit(): bool {
        return $this->db->commit();
    }

    final public function rollback(): bool {
        return $this->db->rollback();
    }
}