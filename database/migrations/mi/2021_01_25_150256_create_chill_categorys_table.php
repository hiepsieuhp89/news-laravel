<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChillCategorysTable extends Migration
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
            $table->integer('categorys_id')->unsigned();
            $table->foreign('categorys_id')->references('id')->on('categorys');
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
