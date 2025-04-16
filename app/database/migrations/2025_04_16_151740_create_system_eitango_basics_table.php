<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('system_eitango_basics', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->string('meaning');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_eitango_basics');
    }
};