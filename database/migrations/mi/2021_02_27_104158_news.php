<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
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
            $table->integer('chill_category')->unsigned();
            $table->foreign('chill_category')->references('chill_categorys');

            $table->integer('author')->unsigned();
            $table->foreign('author')->references('authors');

            $table->integer('source')->unsigned();
            $table->foreign('source')->references('sources');


            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->text('first_look')->nullable();
            $table->text('description')->nullable();
            $table->string('author')->nullable();
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
