<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('computer_type');
            $table->decimal('price', 8, 2);
            $table->integer('price_category');
            $table->string('case');
            $table->string('mobo');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('psu');
            $table->string('ram');
            $table->string('storage');
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
        Schema::dropIfExists('pc');
    }
}
