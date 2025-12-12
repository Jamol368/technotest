<?php

namespace App\Services;

use App\Repositories\SubjectRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubjectService
{
    public function __construct(
        private readonly SubjectRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('subjects', 'public');
        }

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = isset($data['is_active']);

        return $this->repository->create($data);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(int $id, array $data)
    {
        $subject = $this->repository->find($id);

        if (isset($data['image'])) {
            if ($subject->image) {
                Storage::disk('public')->delete($subject->image);
            }

            $data['image'] = $data['image']->store('subjects', 'public');
        }

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = isset($data['is_active']);

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
