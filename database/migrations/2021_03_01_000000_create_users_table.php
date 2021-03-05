<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');    // - id (auto incremented id)
            $table->string('name',255);   // - name (string with max length of 255 characters)
            $table->string('email',255)->unique();    // - email (string with max length of 255 characters)
            $table->string('password');     // - password (min 8 characters, min 1 capital letter, 1 number)
            $table->date('dob')->nullable(true);   // - date_of_birth (Date in format YYYY-MM-DD)
            $table->longText('address')->nullable(true);  // - address of the user
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
