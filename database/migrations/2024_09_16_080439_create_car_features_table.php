<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('car_features', function (Blueprint $table) {
            $table->id();
            $table->string('feature')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_features');
    }
}
