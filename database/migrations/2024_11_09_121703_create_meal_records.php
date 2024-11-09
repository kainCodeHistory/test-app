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
        Schema::create('meal_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
            $table->datetime('datetime')->useCurrent(); 
            $table->integer('category');
            $table->string('name');
            $table->string('unit');
//            $table->float('sugar_gram');
            $table->float('weight');
            $table->float('gram');
            $table->float('num');
            $table->float('calories');
            $table->integer('food_id')->unsigned();
            
            
            $table->float('percent')->unsigned();
            
            $table->integer('age')->unsigned();
            $table->float('height')->unsigned();
            $table->float('p_weight')->unsigned();
            $table->integer('activity_amount')->unsigned();
            $table->float('rc')->unsigned(); //Recommended calories
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
        Schema::dropIfExists('meal_records');
    }
};
