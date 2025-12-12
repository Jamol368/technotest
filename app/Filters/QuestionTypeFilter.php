<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class QuestionTypeFilter
{
    public function __construct(
        protected array $data
    ){}

    public function apply(Builder $query): Builder
    {
        return $query
            ->when(isset($this->data['name']), fn($q) => $q->where('name', 'ilike', "%{$this->data['name']}%"))
            ->when(isset($this->data['questions']), fn($q) => $q->where('questions', $this->data['questions']))
            ->when(isset($this->data['minutes']), fn($q) => $q->where('minutes', $this->data['minutes']))
            ->when(isset($this->data['point']), fn($q) => $q->where('point', $this->data['point']))
            ->when(isset($this->data['price']), fn($q) => $q->where('price', $this->data['price']))
            ->when(isset($this->data['created_at_from']), fn($q) => $q->whereDate('created_at', '>=', $this->data['created_at_from']))
            ->when(isset($this->data['created_at_to']), fn($q) => $q->whereDate('created_at', '<=', $this->data['created_at_to']));
    }
}
