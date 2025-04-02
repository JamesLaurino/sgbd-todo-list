<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->boolean("completed");
            $table->timestamps();
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::create('tasks', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
        });
    }
};
