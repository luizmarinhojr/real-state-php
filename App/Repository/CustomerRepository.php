<?php
namespace App\Repository;

use App\Dto\Response\AddressDtoResponse;
use App\Dto\Response\CustomerDtoResponse;
use App\Model\CustomerModel;

use mysqli, Exception, DateTimeImmutable;

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

    public function fetchAll(int $limit, int $offset): ?array {
        $totalRecords = $this->countAll();
        $query = "SELECT c.id, c.first_name, c.last_name, c.cpf, c.birth_date, c.cellphone, c.email, a.neighborhood, a.city 
                FROM customers c 
                LEFT JOIN addresses a ON c.id = a.id_customer
                WHERE c.active = true 
                LIMIT ? OFFSET ?";
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query: " . $this->db->error);
        }

        $success = $stmt->bind_param("ii", $limit, $offset);
        if (!$success) {
            throw new Exception("Erro ao ligar parâmetro: " . $stmt->error);
        }
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $this->db->close();
        if (!empty($result)) {
            $customers = [];
            foreach ($result as $row) {
                $address = new AddressDtoResponse(null, null,null,null,$row['neighborhood'],$row['city']);
                $customer = new CustomerDtoResponse($row['id'], $row['first_name'], $row['last_name'], $row['cpf'], $row['birth_date'], 
                        $row['email'], $row['cellphone'], $address);
                $customers[] = $customer;
            }
            
            return [
                'customers' => $customers,
                'total_records' => $totalRecords
            ];
        }
        return null;
    }

    public function fetch(int $id): ?object {
        $query = "SELECT c.id, c.first_name, c.last_name, c.cpf, c.birth_date, c.cellphone, c.email, c.created_at AS c_created_at, c.modified_at AS c_modified_at, c.deleted_at AS c_deleted_at,
                a.id AS id_address, a.street, a.number, a.complement, a.neighborhood, a.city, a.state, a.cep, a.created_at AS a_created_at, a.modified_at AS a_modified_at, a.deleted_at AS a_deleted_at
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
        $address = null;
        if ($row['street'] != null) {
            $address = new AddressDtoResponse($row['id_address'], $row['street'],$row['number'],
            $row['complement'],$row['neighborhood'],$row['city'], $row['cep'], 
                $row['state'], null, $row['a_created_at'], $row['a_modified_at'], $row['a_deleted_at']);
        }
        $customer = new CustomerDtoResponse($row['id'], $row['first_name'], $row['last_name'], $row['cpf'], $row['birth_date'], 
                $row['email'], $row['cellphone'], $address, $row['c_created_at'], $row['c_modified_at'], $row['c_deleted_at']);
        $stmt->close();
        return $customer;
    }

    public function update(CustomerModel $customer): void {
        $query = "UPDATE customers 
                    SET 
                        first_name = ?, last_name = ?, cpf = ?, birth_date = ?, 
                        cellphone = ?,  email = ?, modified_at = ?
                    WHERE id = ?;";

        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception("Falha na preparação da query de inserção: " . $this->db->error);
        }

        $modifiedAtDate = new DateTimeImmutable('now');
        $modifiedAt = $modifiedAtDate->format('Y-m-d H:i:s');

        $types = "sssssssi";
        $stmt->bind_param(
            $types,
            $customer->firstName,
            $customer->lastName,
            $customer->cpf,
            $customer->birthDate,
            $customer->cellphone,
            $customer->email,
            $modifiedAt,
            $customer->id
        );

        $success = $stmt->execute();
        
        if (!$success) {
            throw new Exception("Erro ao executar a inserção: " . $stmt->error);
        }

        $stmt->close();
    }
    
    public function delete(int $idCustomer): bool{
        $query = "UPDATE customers 
                    SET 
                        active = false,
                        deleted_at = ?
                    WHERE id = ?;";

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

    public function countAll(): int {
        $query = "SELECT COUNT(id) 
                    FROM customers
                    WHERE active = true;";
        $result = $this->db->query($query)->fetch_row();
        return (int) $result[0];
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