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
        Schema::create('bookings', function (Blueprint $table) {
    $table->id();

    // Only one user foreign key
    $table->foreignId('user_id')->constrained()->onDelete('cascade');

    $table->foreignId('movie_id')->constrained()->onDelete('cascade');

    $table->string('show_time');
    $table->string('seat_class');
    $table->integer('seats');
    $table->date('booking_date');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
