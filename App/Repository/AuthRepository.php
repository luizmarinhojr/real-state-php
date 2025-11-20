<?php

namespace App\Repository;

use mysqli;

final class AuthRepository 
{
    private readonly mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function getByEmail(string $email): ?array
    {
        $query = 'SELECT id, email, password_hash FROM users WHERE email = ?';
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            $stmt->close();
            return null; 
        }
        return $result->fetch_assoc();
    }

}