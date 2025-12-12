<?php

namespace App\Repositories;

use App\Filters\TopicFilter;
use App\Models\Topic;
use Illuminate\Pagination\LengthAwarePaginator;

class TopicRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return (new TopicFilter($data))->apply(Topic::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return Topic::findOrFail($id);
    }

    public function create(array $data)
    {
        return Topic::create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }

    public function getList(int $subject_id)
    {
        return Topic::query()->where('subject_id', $subject_id)->get();
    }
}
