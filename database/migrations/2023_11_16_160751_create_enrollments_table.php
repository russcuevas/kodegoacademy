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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('enrollment_number')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('offered_id');
            $table->string('status')->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->where('user_role', 'user');
            $table->foreign('offered_id')->references('id')->on('offereds');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
