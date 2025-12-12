<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function __construct(
        private readonly UserRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
