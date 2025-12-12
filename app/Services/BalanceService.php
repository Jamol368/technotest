<?php

namespace App\Services;

use App\Exceptions\NotEnoughQuestionsException;
use App\Models\User;

class BalanceService
{
    public function deduct(int $amount): void
    {
        $user = User::where('id', auth()->id())->lockForUpdate()->firstOrFail();

        if ($user->balance < $amount) {
            throw new NotEnoughQuestionsException($amount, $user->balance);
        }

        $user->decrement('balance', $amount);
    }
}
