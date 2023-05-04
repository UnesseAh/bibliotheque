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
        Schema::create('copies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->string('barcode');
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('shelve_id');
            $table->unsignedBigInteger('floor_id');

            $table->foreign('book_id')->references('id')->on('books')->cascadeOnDelete();
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
        Schema::dropIfExists('copies');
    }
};
