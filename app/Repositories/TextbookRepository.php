<?php

namespace App\Repositories;

use App\Models\Textbook;
use Illuminate\Pagination\LengthAwarePaginator;

class TextbookRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return Textbook::query()
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return Textbook::findOrFail($id);
    }

    public function create(array $data)
    {
        return Textbook::create($data);
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
