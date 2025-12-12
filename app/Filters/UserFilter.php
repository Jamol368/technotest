<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter
{
    public function __construct(
        protected array $data
    ){}

    public function apply(Builder $query): Builder
    {
        return $query
            ->when(isset($this->data['name']), fn($q) => $q->where('name', 'ilike', "%{$this->data['name']}%"))
            ->when(isset($this->data['phone']), fn($q) => $q->where('phone', 'ilike', "%{$this->data['phone']}%"))
            ->when(isset($this->data['subject']), fn($q) => $q->whereHas('subject', function ($s) {
                $s->where('name', 'ilike', "%{$this->data['subject']}%");
            }))
            ->when(isset($this->data['qualification']), fn($q) => $q->whereHas('qualification', function ($s) {
                $s->where('name', 'ilike', "%{$this->data['qualification']}%");
            }))
            ->when(isset($this->data['created_at_from']), fn($q) => $q->whereDate('created_at', '>=', $this->data['created_at_from']))
            ->when(isset($this->data['created_at_to']), fn($q) => $q->whereDate('created_at', '<=', $this->data['created_at_to']));
    }
}
