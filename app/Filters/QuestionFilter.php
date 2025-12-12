<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class QuestionFilter
{
    public function __construct(
        protected array $data
    ){}

    public function apply(Builder $query): Builder
    {
        return $query
            ->when(isset($this->data['question_type_id']), fn($q) => $q->where('question_type_id', $this->data['question_type_id']))
            ->when(isset($this->data['subject_id']), fn($q) => $q->where('subject_id', $this->data['subject_id']))
            ->when(isset($this->data['topic_id']), fn($q) => $q->where('topic_id', $this->data['topic_id']))
            ->when(isset($this->data['difficulty']), fn($q) => $q->where('difficulty', $this->data['difficulty']))
            ->when(isset($this->data['created_at_from']), fn($q) => $q->whereDate('created_at', '>=', $this->data['created_at_from']))
            ->when(isset($this->data['created_at_to']), fn($q) => $q->whereDate('created_at', '<=', $this->data['created_at_to']));
    }
}
