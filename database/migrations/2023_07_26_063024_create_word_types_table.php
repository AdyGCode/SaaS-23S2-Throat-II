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
        Schema::create('word_types', function (Blueprint $table) {
            $table->id(); // id unsigned big integer, primary key, autoincrement
            $table->string('code', 2)->unique(); // eg BA, IN, AC etc
            $table->string('name',32)->unique();
            $table->timestamps(); // created_at updated_at datetime
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_types');
    }
};
