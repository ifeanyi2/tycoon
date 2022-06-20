<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('make');
            $table->string('model');
            $table->date('first_registration');
            $table->string('mileage');
            $table->string('fuel');
            $table->string('engine_size');
            $table->string('power');
            $table->string('gearbox');
            $table->string('number_of_seats');
            $table->string('doors');
            $table->string('color');
            $table->text('extra');
            $table->text('description');
            $table->string('image1');
            $table->string('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
