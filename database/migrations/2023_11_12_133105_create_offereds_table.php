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
        Schema::create('offereds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('course_id');
            $table->string('course_picture');
            $table->string('course_description');
            $table->datetime('scheduled_at');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->where('user_role', 'instructor');
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offereds');
    }
};
