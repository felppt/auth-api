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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 128);
            $table->string('description', 1056)->nullable();
            $table->enum('status', ['new', 'in_progress', 'completed'])->default('new');
            $table->boolean('is_urgent')->default(false);
            $table->datetime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
