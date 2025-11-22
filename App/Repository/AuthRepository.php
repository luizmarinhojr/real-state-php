<?php

namespace App\Repository;

use App\Model\UserModel;
use mysqli, Exception;

final class AuthRepository 
{
    private readonly mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function getByEmail(string $email): ?array
    {
        $query = 'SELECT id, first_name, email, password_hash FROM users WHERE email = ?;';
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
        $query = 'INSERT INTO users (first_name, last_name, email, password_hash, created_at) VALUES (?, ?, ?, ?, ?);';
        $stmt = $this->db->prepare($query);
        if (!$stmt) {
            throw new Exception('Erro interno na criação do Usuário');
        }
        $types = "sssss";
        $stmt->bind_param(
            $types, 
            $userModel->firstName,
            $userModel->lastName,
            $userModel->email, 
            $userModel->passwordHash, 
            $userModel->createdAt
        );
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception('Erro interno na criação do Usuário');
        }
        $insertedId = $this->db->insert_id;
        $stmt->close();
        return $insertedId;
    }
}