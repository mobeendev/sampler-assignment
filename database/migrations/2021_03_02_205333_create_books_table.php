<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {

            $table->increments('id'); //- id (auto incremented id)

            $table->string('title', 255);  //  - title (string with max length of 255 characters)

            $table->string('ISBN',10)->unique(); // - isbn (10 digits)
            
            $table->string('publisher', 255);   // - name (string with max length of 255 characters)
            
            $table->string('email', 255)->unique();    // - email (string with max length of 255 characters)
       
            $table->date('published_at'); // - published_at (Date in format YYYY-MM-DD)


            $table->integer('status_id')->unsigned(); // book issue status (0,1,2)

            $table->foreign('status_id')->references('id')->on('book_status');

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
        Schema::dropIfExists('books');
    }
}
