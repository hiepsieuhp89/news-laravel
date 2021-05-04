<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chill_category')->unsigned();
            $table->foreign('chill_category')->references('id')->on('chill_categorys');

            $table->bigInteger('category')->unsigned();
            $table->foreign('category')->references('id')->on('categorys');

            $table->bigInteger('author')->unsigned();
            $table->foreign('author')->references('id')->on('authors');

            $table->bigInteger('source')->unsigned();
            $table->foreign('source')->references('id')->on('sources');


            $table->string('title');
            $table->text('image');
            $table->text('images')->nullable();
            $table->text('first_look');
            $table->text('description');
            $table->string('url')->nullable();
            $table->string('slug')->nullable();
            $table->integer('hot')->nullable();
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
        Schema::dropIfExists('news');
    }
}
