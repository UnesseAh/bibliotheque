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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->dateTime('publication_date');
            $table->string('summary');

            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('shelve_id');
            $table->unsignedBigInteger('floor_id');

            $table->foreign('author_id')->references('id')->on('authors')->cascadeOnDelete();
            $table->foreign('genre_id')->references('id')->on('genres')->cascadeOnDelete();
            $table->foreign('block_id')->references('id')->on('blocks')->cascadeOnDelete();
            $table->foreign('shelve_id')->references('id')->on('shelves')->cascadeOnDelete();
            $table->foreign('floor_id')->references('id')->on('floors')->cascadeOnDelete();
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
};
