<?php
// require_once ROOT_PATH . 'config/database.php';
// require_once ROOT_PATH . 'app/model/CustomerModel.php';
require_once '../../config/database.php';

interface Crud {
    public function fetchAll(string $query): array;
    public function fetch(string $query, int $id): ?object;
    public function update(string $query, object $entity): bool;
    public function delete(string $query, int $id): bool;
}

class Repository implements Crud {
    private readonly mysqli $db;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function fetchAll(string $query): array {
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetch(string $query, int $id): ?object {

    }

    public function update(string $query, object $entity): bool {

    }
    
    public function delete(string $query, int $id): bool{

    }
}

$repo = new Repository(Database::connect());
$result = $repo->fetchAll("SELECT * FROM customers;");

if (!empty($result)) {
    echo "<h2>Resultados da Consulta:</h2>";
    echo "<ul>";
    
    // Itera sobre CADA LINHA (que é um array associativo)
    foreach ($result as $row) {
        // Acessa as colunas específicas do array $row
        echo "<li>ID: " . $row['id'] . ", Nome: " . $row['name'] . ", Email: " . $row['email'] . "</li>";
    }
    
    echo "</ul>";
} else {
    echo "Nenhum resultado encontrado.";
}