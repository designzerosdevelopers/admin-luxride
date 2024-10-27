<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('imgSrc');
            $table->string('title');
            $table->text('description');
            $table->integer('passenger');
            $table->integer('luggage');
            $table->decimal('price', 8, 2);
            $table->integer('carType');
            $table->integer('brand');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

