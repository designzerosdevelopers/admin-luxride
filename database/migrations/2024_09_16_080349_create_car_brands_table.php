<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('car_brands', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_brands');
    }
}
