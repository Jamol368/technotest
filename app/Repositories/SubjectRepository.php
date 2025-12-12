<?php

namespace App\Repositories;

use App\Filters\SubjectFilter;
use App\Models\Subject;
use Illuminate\Pagination\LengthAwarePaginator;

class SubjectRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return (new SubjectFilter($data))->apply(Subject::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return Subject::findOrFail($id);
    }

    public function create(array $data)
    {
        return Subject::create($data);
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
