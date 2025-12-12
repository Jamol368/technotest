<?php

namespace App\Repositories;

use App\Filters\QuestionTypeFilter;
use App\Models\QuestionType;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionTypeRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return (new QuestionTypeFilter($data))->apply(QuestionType::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return QuestionType::findOrFail($id);
    }

    public function create(array $data)
    {
        return QuestionType::create($data);
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
