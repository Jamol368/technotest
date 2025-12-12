<?php

namespace App\Repositories;

use App\Filters\UserFilter;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function findByPhone(string $phone): ?User
    {
        return User::where('phone', $phone)->first();
    }

    public function all(array $data): LengthAwarePaginator
    {
        return (new UserFilter($data))->apply(User::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }
}

