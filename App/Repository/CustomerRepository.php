<?php
namespace App\Repository;

use App\Model\AddressModel;
use App\Model\CustomerModel;

use mysqli;
use Exception;

class CustomerRepository implements IRepository {
    private readonly mysqli $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function fetchAll():?array {
        $query = "SELECT c.id, c.name, c.birth_date, c.cellphone, c.email, a.neighborhood, a.city 
                FROM customers c 
                LEFT JOIN addresses a ON c.id = a.id_customer;";
        $result = $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
        $this->db->close();
        if (!empty($result)) {
            $customers = [];
            foreach ($result as $row) {
                $address = new AddressModel(null, null, null, null, $row['neighborhood'], $row['city'], null);
                $customer = new CustomerModel($row['id'], $row['name'], $row['birth_date'], 
                        $row['email'], $row['cellphone'], $address);
                $customers[] = $customer;
            }
            return $customers;
        }
        return null;
    }

    public function fetch(int $id): ?object {
        $query = "SELECT c.id, c.name, c.birth_date, c.cellphone, c.email, a.neighborhood, a.city 
                FROM customers c 
                LEFT JOIN addresses a ON c.id = a.id_customer
                WHERE c.id = ?;";
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
        $address = new AddressModel(null, null, null, null, $row['neighborhood'], $row['city'], null);
        $customer = new CustomerModel($row['id'], $row['name'], $row['birth_date'], $row['email'], 
                    $row['cellphone'], $address);
        $stmt->close();
        return $customer;
    }

    public function update(object $entity): bool {
        return false;
    }
    
    public function delete(int $id): bool{
        return false;
    }
}