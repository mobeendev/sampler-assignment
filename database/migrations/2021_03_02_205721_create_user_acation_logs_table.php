<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAcationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_action_logs', function (Blueprint $table) {
          
            $table->increments('id');


            $table->integer('book_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->smallInteger('action');  

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('book_id')->references('id')->on('books');
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

            $table->timestamp('date_issued')->default(DB::raw('CURRENT_TIMESTAMP(0)'));

            // $table->date('date_issued')->default(DB::raw('CURRENT_TIMESTAMP'));  // - data_issued (Date in format YYYY-MM-DD)

            $table->date('date_due_for_return')->nullable(true); ; // - data_due_for_return (Date in format YYYY-MM-DD)

            $table->date('date_returned')->nullable(true); ;  // - data_returned (Date in format YYYY-MM-DD)

            $table->smallInteger('fine_amount')->nullable(true); ;  // - fine_amount 

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
        Schema::dropIfExists('user_acation_logs');
    }
}
