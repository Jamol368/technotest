<?php

namespace App\Services;

use App\Repositories\TopicRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TopicService
{
    public function __construct(
        private TopicRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('topics', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        return $this->repository->create($data);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(int $id, array $data)
    {
        $topic = $this->repository->find($id);

        if (isset($data['image'])) {
            if ($topic->image) {
                Storage::disk('public')->delete($topic->image);
            }

            $data['image'] = $data['image']->store('topics', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function getList(int $subject_id)
    {
        return $this->repository->getList($subject_id);
    }
}
