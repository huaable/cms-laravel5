<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //友情链接
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group')->default('');
            $table->string('thumb')->default('');
            $table->string('title')->default('');
            $table->string('url')->default('');
            $table->string('description')->default('');
            $table->integer('weight')->default(0);
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
        Schema::dropIfExists('links');
    }
}
