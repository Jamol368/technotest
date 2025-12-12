<?php

namespace App\Repositories;

use App\Filters\UserAttemptFilter;
use App\Models\UserAttempt;
use Illuminate\Pagination\LengthAwarePaginator;

class UserAttemptRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return (new UserAttemptFilter($data))->apply(UserAttempt::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return UserAttempt::findOrFail($id);
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }
}

