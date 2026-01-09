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
         Schema::create('trailers', function (Blueprint $table) {
        $table->id();

        // Movie relation
        $table->unsignedBigInteger('movie_id');

        // Trailer description
        $table->text('desc');

        // Trailer video filename
        $table->string('video');

        $table->timestamps();

        // Foreign key
        $table->foreign('movie_id')
              ->references('id')
              ->on('movies')
              ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trailers');
    }
};
