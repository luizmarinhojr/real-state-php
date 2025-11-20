<?php

namespace App\Repository;

use App\Model\UserModel;
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

    public function insert(UserModel $userModel): ?int 
    {
        $query = 'INSERT INTO users (email, password_hash, created_at) VALUES (?, ?, ?);';
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            return null;
        }
        $types = "sss";
        $stmt->bind_param(
            $types, 
            $userModel->email, 
            $userModel->passwordHash, 
            $userModel->createdAt
        );
        $success = $stmt->execute();
        if (!$success) {
            return null;
        }
        $insertedId = $this->db->insert_id;
        $stmt->close();
        return $insertedId;
    }
}