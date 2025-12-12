<?php

namespace App\Repositories;

use App\Models\Announcement;
use Illuminate\Pagination\LengthAwarePaginator;

class AnnouncementRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return Announcement::query()
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return Announcement::findOrFail($id);
    }

    public function create(array $data)
    {
        return Announcement::create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }

    public function incrementReadCount(Announcement $announcement): void
    {
        $announcement->increment('read_count');
    }
}
