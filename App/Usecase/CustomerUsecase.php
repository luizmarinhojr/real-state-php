<?php

namespace App\Usecase;

use App\Repository\Repository;

final class CustomerUsecase {
    private readonly Repository $repo;

    public function __construct(Repository $repo) {
        $this->repo = $repo;
    }
}