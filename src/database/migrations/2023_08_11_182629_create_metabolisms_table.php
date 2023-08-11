<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetabolismsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('metabolisms', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained();
            $table->integer('height');
            $table->integer('weight');
            $table->string('gender');
            $table->integer('age');
            $table->float('active_level');
            $table->float('metabolism');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('metabolisms');
    }
};
