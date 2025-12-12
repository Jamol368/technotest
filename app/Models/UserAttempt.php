<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAttempt extends Model
{
    protected $fillable = [
        'user_id',
        'question_type_id',
        'subject_id',
        'topic_id',
        'questions',
        'answers',
        'true_answers',
        'correct_count',
        'score',
        'finished_at',
    ];

    protected $casts = [
        'questions' => 'array',
        'answers' => 'array',
        'true_answers' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function questionType(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
