<?php

$user_balance = \App\Models\User::where('id', $transaction->transactionable_id)->first();

$user_balance->balance += $transaction->amount;

$user_balance->update();