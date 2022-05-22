<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name',255);
            // $table->unsignedBigInteger('genre_id');
            // $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->string('author',255);
            $table->longText('synopsis');
            $table->integer('price');
            $table->string('cover', 255);
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
