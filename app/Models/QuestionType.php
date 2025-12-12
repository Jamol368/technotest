<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionType extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'questions',
        'minutes',
        'point',
        'price',
        'order',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function userAttempts(): HasMany
    {
        return $this->hasMany(UserAttempt::class);
    }
}
