<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserAttemptFilter
{
    public function __construct(
        protected array $data
    ){}

    public function apply(Builder $query): Builder
    {
        return $query
            ->when(isset($this->data['user']), fn($q) => $q->whereHas('user', function ($s) {
                $s->where('name', 'ilike', "%{$this->data['user']}%");
            }))
            ->when(isset($this->data['question_type_id']), fn($q) => $q->where('question_type_id', 'ilike', "%{$this->data['question_type_id']}%"))
            ->when(isset($this->data['subject_id']), fn($q) => $q->where('subject_id', 'ilike', "%{$this->data['subject_id']}%"))
            ->when(isset($this->data['topic_id']), fn($q) => $q->where('topic_id', 'ilike', "%{$this->data['topic_id']}%"))
            ->when(isset($this->data['created_at_from']), fn($q) => $q->whereDate('created_at', '>=', $this->data['created_at_from']))
            ->when(isset($this->data['created_at_to']), fn($q) => $q->whereDate('created_at', '<=', $this->data['created_at_to']));
    }
}
