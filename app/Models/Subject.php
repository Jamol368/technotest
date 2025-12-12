<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'color',
        'description',
        'is_active',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function userAttempts(): HasMany
    {
        return $this->hasMany(UserAttempt::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
