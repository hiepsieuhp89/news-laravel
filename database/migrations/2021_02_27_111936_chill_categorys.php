<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChillCategorys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chill_categorys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('categoryId')->unsigned();
            $table->foreign('categoryId')->references('id')->on('categorys');
            $table->string('name');
            $table->string('slug')->nullable();;
            $table->string('dataid')->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('chill_categorys');
    }
}
