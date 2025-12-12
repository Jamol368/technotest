<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class SubjectFilter
{
    public function __construct(
        protected array $data
    ){}

    public function apply(Builder $query): Builder
    {
        return $query
            ->when(isset($this->data['name']), fn($q) => $q->where('name', 'ilike', "%{$this->data['name']}%"))
            ->when(isset($this->data['created_at_from']), fn($q) => $q->whereDate('created_at', '>=', $this->data['created_at_from']))
            ->when(isset($this->data['created_at_to']), fn($q) => $q->whereDate('created_at', '<=', $this->data['created_at_to']));
    }
}
