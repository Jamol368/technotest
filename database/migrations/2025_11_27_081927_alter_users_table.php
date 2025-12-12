<?php

use App\Enums\UserRole;
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
        Schema::table('users', static function (Blueprint $table) {
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('qualification_id')->constrained();
            $table->enum('role', array_column(UserRole::cases(), 'value'))->default(UserRole::USER);
            $table->string('hash');
            $table->integer('balance')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropColumn('subject_id');
            $table->dropColumn('qualification_id');
            $table->dropColumn('role');
            $table->dropColumn('hash');
        });
    }
};
