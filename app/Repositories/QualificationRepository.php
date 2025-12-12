<?php

namespace App\Repositories;

use App\Filters\QualificationFilter;
use App\Models\Qualification;
use Illuminate\Pagination\LengthAwarePaginator;

class QualificationRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return (new QualificationFilter($data))->apply(Qualification::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return Qualification::findOrFail($id);
    }

    public function create(array $data)
    {
        return Qualification::create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }
}
