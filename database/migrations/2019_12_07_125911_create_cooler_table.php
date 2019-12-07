<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoolerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooler', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer');
            $table->boolean('usage'); // 0 -> korpuss, 1 -> CPU
            $table->string('type');
            $table->integer('size');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooler');
    }
}
