<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned(); //0=共用
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('category')->unsigned();
            $table->string('category_name');
            $table->string('name');
            $table->float('weight');
            $table->string('unit');
            $table->float('sugar_gram');
            $table->float('kcal');
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
        Schema::dropIfExists('foods');
    }
};
