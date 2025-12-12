<?php

namespace App\Services;

use App\Repositories\QualificationRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QualificationService
{
    public function __construct(
        private QualificationRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('qualifications', 'public');
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
        $qualification = $this->repository->find($id);

        if (isset($data['image'])) {
            if ($qualification->image) {
                Storage::disk('public')->delete($qualification->image);
            }

            $data['image'] = $data['image']->store('qualifications', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
