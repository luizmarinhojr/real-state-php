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

    public function getByEmail(string $email) 
    {

    }

}