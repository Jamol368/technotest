<?php

namespace App\Services;

use App\Repositories\AnnouncementRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementService
{
    public function __construct(
        private AnnouncementRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('announcements', 'public');
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
        $topic = $this->repository->find($id);

        if (isset($data['image'])) {
            if ($topic->image) {
                Storage::disk('public')->delete($topic->image);
            }

            $data['user_id'] = Auth::user()->id;

            $data['image'] = $data['image']->store('announcements', 'public');
        }

        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function getAndIncrementReadCount(int $id)
    {
        $announcement = $this->repository->find($id);
        $this->repository->incrementReadCount($announcement);

        return $announcement;
    }
}
