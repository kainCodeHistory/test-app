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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('isUser')->default(FALSE);
            $table->boolean('isActive')->default(FALSE);
            
            $table->rememberToken();
            $table->timestamps();

            //custom
            $table->tinyInteger('type')->default(3); //0 = root,  1 = manager,  2 = teacher,  3 = normal user
            $table->integer('group')->nullable();
            $table->string('remarks')->nullable();
            $table->string('enable_url')->nullable(); // account register check url
            $table->timestampTz('expiry_date')->nullable(); // check url expire
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
