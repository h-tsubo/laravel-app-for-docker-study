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
        Schema::create('wordbook_test_histories', function (Blueprint $table) {
            $table->id();
            $table->string('book');
            $table->unsignedInteger('start_id');
            $table->unsignedInteger('end_id');
            $table->unsignedInteger('count');
            $table->json('test_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wordbook_test_histories');
    }
};
