<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');                     // Example: "30 Years Agriculture Experience"
            $table->text('description')->nullable();     // Main about description
            $table->string('image')->nullable();         // URL to about image
            $table->text('values')->nullable();          // Comma-separated list or JSON
            $table->timestamps();
            $table->softDeletes();                       // Enables soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
