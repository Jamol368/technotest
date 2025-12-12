<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('question_type_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->integer('correct_count')->nullable()->default(0);
            $table->decimal('score')->nullable()->default(0);
            $table->json('questions')->nullable();
            $table->json('answers')->nullable();
            $table->json('true_answers')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_attempts');
    }
};
