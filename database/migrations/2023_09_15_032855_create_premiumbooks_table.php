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
        Schema::create('premiumbooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
           
            $table->integer('published_year');
            $table->integer('category_id');
            $table->string('book_image');
            $table->string('pdf')->nullable();
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
        Schema::dropIfExists('premiumbooks');
    }
};
