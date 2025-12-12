<?php

namespace App\Services;

use App\Repositories\TextbookRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TextbookService
{
    public function __construct(
        private TextbookRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data)
    {
        if (isset($data['file'])) {
            $data['file'] = $data['file']->store('textbooks', 'public');
        }

        $data['user_id'] = Auth::user()->id;

        return $this->repository->create($data);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(int $id, array $data)
    {
        $textbook = $this->repository->find($id);

        if (isset($data['file'])) {
            if ($textbook->image) {
                Storage::disk('public')->delete($textbook->image);
            }

            $data['file'] = $data['file']->store('textbooks', 'public');
        }

        $data['user_id'] = Auth::user()->id;

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function getAndIncrementDownloaded(int $id)
    {
        $textbook = $this->repository->find($id);
        $textbook->increment('downloaded');

        return $textbook;
    }
}
