<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarExtrasTable extends Migration
{
    public function up()
    {
        Schema::create('car_extras', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_extras');
    }
}
