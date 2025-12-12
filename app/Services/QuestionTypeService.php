<?php

namespace App\Services;

use App\Repositories\QuestionTypeRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuestionTypeService
{
    public function __construct(
        private readonly QuestionTypeRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('question_types', 'public');
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
        $question_type = $this->repository->find($id);

        if (isset($data['image'])) {
            if ($question_type->image) {
                Storage::disk('public')->delete($question_type->image);
            }

            $data['image'] = $data['image']->store('question_types', 'public');
        }

        $data['slug'] = Str::slug($data['name']);

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
