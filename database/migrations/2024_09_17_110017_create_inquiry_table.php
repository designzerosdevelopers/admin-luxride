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
        Schema::create('inquiry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id'); 
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('time')->nullable();
            $table->string('date')->nullable();
            $table->integer('phone')->nullable();
            $table->text('location1Coords')->nullable();
            $table->text('location2Coords')->nullable();
            $table->text('location1')->nullable();
            $table->text('location2')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry');
    }
};
